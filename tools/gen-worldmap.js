/*
 * Generates the dotted world map used behind the "Trusted by" section.
 *
 * Input : Natural Earth 110m land polygons (public domain), shipped as
 *         TopoJSON by the world-atlas package.
 * Output: a plain SVG of <circle> elements on an equirectangular grid.
 *
 * Run once; the SVG is committed to public/images/. Nothing at runtime
 * depends on this file.
 *
 *   curl -sLO https://unpkg.com/world-atlas@2.0.2/land-110m.json
 *   node tools/gen-worldmap.js land-110m.json public/images/world-dots.svg
 */
const fs = require('fs');

const [, , inPath, outPath] = process.argv;
const topo = JSON.parse(fs.readFileSync(inPath, 'utf8'));

/* ---- TopoJSON -> absolute lon/lat rings --------------------------- */
const { scale, translate } = topo.transform;

const arcs = topo.arcs.map((arc) => {
    let x = 0;
    let y = 0;
    return arc.map(([dx, dy]) => {
        x += dx;
        y += dy;
        return [x * scale[0] + translate[0], y * scale[1] + translate[1]];
    });
});

function ringFor(arcIndexes) {
    const points = [];
    for (const idx of arcIndexes) {
        const reversed = idx < 0;
        const arc = arcs[reversed ? ~idx : idx];
        const seq = reversed ? arc.slice().reverse() : arc;
        // Arcs share endpoints; drop the duplicate when stitching.
        for (let i = points.length ? 1 : 0; i < seq.length; i++) points.push(seq[i]);
    }
    return points;
}

const polygons = [];
for (const geom of topo.objects.land.geometries) {
    const list = geom.type === 'Polygon' ? [geom.arcs] : geom.arcs;
    for (const poly of list) polygons.push(poly.map(ringFor));
}

/* ---- point-in-polygon (even-odd, holes included) ------------------ */
function inRing(ring, x, y) {
    let inside = false;
    for (let i = 0, j = ring.length - 1; i < ring.length; j = i++) {
        const [xi, yi] = ring[i];
        const [xj, yj] = ring[j];
        if ((yi > y) !== (yj > y) && x < ((xj - xi) * (y - yi)) / (yj - yi) + xi) {
            inside = !inside;
        }
    }
    return inside;
}

function isLand(lon, lat) {
    for (const rings of polygons) {
        if (!inRing(rings[0], lon, lat)) continue;
        let hole = false;
        for (let r = 1; r < rings.length; r++) {
            if (inRing(rings[r], lon, lat)) { hole = true; break; }
        }
        if (!hole) return true;
    }
    return false;
}

/* ---- rasterise ---------------------------------------------------- */
const CELL = 2.5;                       // degrees per dot
const LAT_TOP = 83;                     // Antarctica is cropped: it adds a
const LAT_BOTTOM = -56;                 // heavy bar and no brand meaning.
const COLS = Math.round(360 / CELL);
const ROWS = Math.round((LAT_TOP - LAT_BOTTOM) / CELL);

const STEP = 6;
const R = 1.45;
const W = COLS * STEP;
const H = ROWS * STEP;

const dots = [];
for (let row = 0; row < ROWS; row++) {
    const lat = LAT_TOP - (row + 0.5) * CELL;
    for (let col = 0; col < COLS; col++) {
        const lon = -180 + (col + 0.5) * CELL;
        if (!isLand(lon, lat)) continue;
        dots.push(
            `<circle cx="${(col * STEP + STEP / 2).toFixed(0)}" ` +
            `cy="${(row * STEP + STEP / 2).toFixed(0)}" r="${R}"/>`
        );
    }
}

const svg =
    `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${W} ${H}" ` +
    `width="${W}" height="${H}" fill="#264a9f" role="presentation">` +
    dots.join('') +
    `</svg>\n`;

fs.writeFileSync(outPath, svg);

// Where a pin at lon/lat lands, as a percentage of the SVG box — copied
// into site.css so the Gurugram marker stays glued to the map.
const pct = (lon, lat) => ({
    left: (((lon + 180) / 360) * 100).toFixed(2),
    top: (((LAT_TOP - lat) / (LAT_TOP - LAT_BOTTOM)) * 100).toFixed(2),
});

console.log(`${dots.length} dots, ${W}x${H}, ${(svg.length / 1024).toFixed(1)} kB`);
console.log('Gurugram (77.03E, 28.46N):', pct(77.03, 28.46));
