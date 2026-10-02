"""Generate the flat cartoon illustrations for the homepage Channels cards
(all except Election campaign, which keeps its own artwork).

Writes public/images/channels/<slug>.svg (800x500, the cards' 16:10 frame).
Run:  python scripts/channel-illustrations.py
Palette matches the site tokens: navy #0b1220, brand #264a9f, bright #195dff,
accent #35d3e1, plus warm character colours.
"""
import os

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
OUT = os.path.join(ROOT, "public", "images", "channels")
os.makedirs(OUT, exist_ok=True)

NAVY, BRAND, BRIGHT, ACCENT = "#0b1220", "#264a9f", "#195dff", "#35d3e1"
SUN, CORAL, MINT, WA = "#ffc857", "#ff7a59", "#7ee0b5", "#25d366"
SKIN, SKIN2, HAIR = "#f2c4a4", "#c98d6a", "#1f2937"
FONT = "font-family=\"Inter, 'Segoe UI', Arial, sans-serif\""


def frame(body, bg=("#eef4ff", "#e3fafc"), blob="#d9e6ff"):
    return f"""<svg xmlns="http://www.w3.org/2000/svg" width="800" height="500" viewBox="0 0 800 500">
<defs>
  <linearGradient id="bg" x1="0" y1="0" x2="1" y2="1">
    <stop offset="0" stop-color="{bg[0]}"/><stop offset="1" stop-color="{bg[1]}"/>
  </linearGradient>
</defs>
<rect width="800" height="500" fill="url(#bg)"/>
<path d="M110 410C40 300 110 150 260 120C400 92 470 40 610 92C745 142 770 300 700 395C630 488 190 512 110 410Z" fill="{blob}"/>
<g fill="{BRIGHT}" opacity=".18">
  <circle cx="70" cy="70" r="5"/><circle cx="95" cy="70" r="5"/><circle cx="120" cy="70" r="5"/>
  <circle cx="70" cy="95" r="5"/><circle cx="95" cy="95" r="5"/><circle cx="120" cy="95" r="5"/>
  <circle cx="680" cy="420" r="5"/><circle cx="705" cy="420" r="5"/><circle cx="730" cy="420" r="5"/>
  <circle cx="680" cy="445" r="5"/><circle cx="705" cy="445" r="5"/><circle cx="730" cy="445" r="5"/>
</g>
<ellipse cx="400" cy="452" rx="300" ry="18" fill="{NAVY}" opacity=".07"/>
{body}
</svg>
"""


def person(x, y, shirt, pants=NAVY, skin=SKIN, hair=HAIR, scale=1.0, arms="", flip=False, hair_long=False):
    """Standing cartoon person, feet centred on (x, y). `arms` is extra SVG
    drawn in the person's local coordinates (shoulders at y=-145)."""
    sx = -scale if flip else scale
    long_hair = (f'<path d="M-30 -198Q-36 -150 -24 -140L-14 -170Z" fill="{hair}"/>'
                 f'<path d="M30 -198Q36 -150 24 -140L14 -170Z" fill="{hair}"/>') if hair_long else ""
    return f"""<g transform="translate({x} {y}) scale({sx} {scale})">
  <rect x="-22" y="-84" width="18" height="84" rx="8" fill="{pants}"/>
  <rect x="4" y="-84" width="18" height="84" rx="8" fill="{pants}"/>
  <ellipse cx="-15" cy="0" rx="17" ry="7" fill="{NAVY}"/>
  <ellipse cx="15" cy="0" rx="17" ry="7" fill="{NAVY}"/>
  <path d="M-40 -78Q-44 -152 0 -162Q44 -152 40 -78Z" fill="{shirt}"/>
  <rect x="-8" y="-176" width="16" height="18" rx="4" fill="{skin}"/>
  {long_hair}
  <circle cx="0" cy="-196" r="27" fill="{skin}"/>
  <path d="M-28 -198Q-30 -232 0 -230Q30 -232 28 -200Q12 -218 -28 -198Z" fill="{hair}"/>
  <circle cx="-9" cy="-194" r="2.8" fill="{NAVY}"/>
  <circle cx="9" cy="-194" r="2.8" fill="{NAVY}"/>
  <circle cx="-16" cy="-185" r="4.5" fill="{CORAL}" opacity=".35"/>
  <circle cx="16" cy="-185" r="4.5" fill="{CORAL}" opacity=".35"/>
  <path d="M-8 -183Q0 -176 8 -183" fill="none" stroke="{NAVY}" stroke-width="2.4" stroke-linecap="round"/>
  {arms}
</g>"""


def arm(shirt, x1, y1, x2, y2, x3, y3, skin=SKIN):
    """Two-segment arm (shoulder -> elbow -> hand) with a round hand."""
    return (f'<path d="M{x1} {y1}L{x2} {y2}L{x3} {y3}" fill="none" stroke="{shirt}" '
            f'stroke-width="15" stroke-linecap="round" stroke-linejoin="round"/>'
            f'<circle cx="{x3}" cy="{y3}" r="8.5" fill="{skin}"/>')


def phone(x, y, w, h, screen, body=NAVY, r=None):
    r = r if r is not None else w * 0.16
    return f"""<g transform="translate({x} {y})">
  <rect width="{w}" height="{h}" rx="{r}" fill="{body}"/>
  <rect x="{w*0.07}" y="{h*0.06}" width="{w*0.86}" height="{h*0.88}" rx="{r*0.6}" fill="#fff"/>
  <rect x="{w*0.38}" y="{h*0.025}" width="{w*0.24}" height="{h*0.018}" rx="{h*0.009}" fill="#334155"/>
  {screen}
</g>"""


def check(cx, cy, r=12, fill=WA):
    return (f'<circle cx="{cx}" cy="{cy}" r="{r}" fill="{fill}"/>'
            f'<path d="M{cx-r*0.45} {cy}l{r*0.32} {r*0.32} {r*0.6} -{r*0.62}" fill="none" '
            f'stroke="#fff" stroke-width="{r*0.26}" stroke-linecap="round" stroke-linejoin="round"/>')


def lines(x, y, widths, color="#cbd5e1", h=7, gap=13):
    return "".join(f'<rect x="{x}" y="{y+i*gap}" width="{w}" height="{h}" rx="{h/2}" fill="{color}"/>'
                   for i, w in enumerate(widths))


def sparkle(x, y, s=1, fill=SUN):
    return (f'<path transform="translate({x} {y}) scale({s})" d="M0 -14L4 -4L14 0L4 4L0 14L-4 4L-14 0L-4 -4Z" '
            f'fill="{fill}"/>')


# ---------------------------------------------------------------- Bulk SMS
def bulk_sms():
    screen = f"""
  <rect x="11" y="18" width="128" height="34" rx="8" fill="{BRAND}"/>
  <circle cx="30" cy="35" r="9" fill="#fff" opacity=".9"/>
  <rect x="45" y="30" width="60" height="9" rx="4.5" fill="#fff" opacity=".9"/>
  <rect x="18" y="66" width="98" height="40" rx="12" fill="#eef2f7"/>
  {lines(28, 76, [70, 48])}
  <rect x="30" y="118" width="104" height="52" rx="12" fill="{BRIGHT}"/>
  <text x="82" y="140" text-anchor="middle" {FONT} font-size="12" font-weight="600" fill="#cfe0ff">Your OTP is</text>
  <text x="82" y="160" text-anchor="middle" {FONT} font-size="17" font-weight="800" fill="#fff" letter-spacing="2">482 913</text>
  <rect x="18" y="182" width="86" height="30" rx="12" fill="#eef2f7"/>
  {lines(28, 193, [60])}
  {check(124, 230, 10)}
  <text x="108" y="234" text-anchor="end" {FONT} font-size="10" font-weight="600" fill="#64748b">Delivered</text>"""
    small = lambda x, y, d: phone(x, y, 62, 104, f"""
  <rect x="9" y="14" width="40" height="18" rx="7" fill="{BRIGHT}"/>
  {lines(14, 20, [22], '#fff', 5)}
  {check(41, 74, 9)}""") + f'<g transform="translate({x+31} {y-14})">{""}</g>'
    sends = "".join(
        f'<path d="M{x1} {y1}Q{qx} {qy} {x2} {y2}" fill="none" stroke="{BRIGHT}" stroke-width="3" '
        f'stroke-dasharray="2 9" stroke-linecap="round" opacity=".55"/>'
        for x1, y1, qx, qy, x2, y2 in [
            (480, 150, 545, 100, 600, 112), (480, 210, 560, 210, 626, 232),
            (480, 270, 540, 330, 596, 352)])
    megaphone = f"""<g transform="translate(250 205) rotate(-18)">
  <path d="M0 -12L52 -40L52 40L0 12Z" fill="{SUN}"/>
  <rect x="-16" y="-14" width="20" height="28" rx="6" fill="{CORAL}"/>
  <rect x="50" y="-42" width="10" height="84" rx="5" fill="#f2a93b"/>
  <path d="M74 -30q16 30 0 60M90 -46q26 46 0 92" fill="none" stroke="{SUN}" stroke-width="5" stroke-linecap="round"/>
</g>"""
    body = (sends
            + phone(330, 70, 150, 290, screen)
            + small(600, 70, 0) + small(628, 190, 0) + small(598, 312, 0)
            + person(170, 440, BRIGHT, arms=arm(BRIGHT, -34, -145, -48, -110, -26, -86)
                     + arm(BRIGHT, 34, -145, 58, -180, 68, -230))
            + megaphone
            + sparkle(110, 150, 1.1) + sparkle(560, 50, .8, ACCENT))
    return frame(body)


# ---------------------------------------------------------------- RCS
def rcs():
    screen = f"""
  <rect x="11" y="18" width="128" height="34" rx="8" fill="#fff" stroke="#e2e8f0"/>
  <circle cx="30" cy="35" r="10" fill="{BRAND}"/>
  <text x="30" y="39" text-anchor="middle" {FONT} font-size="11" font-weight="800" fill="#fff">A</text>
  <rect x="46" y="29" width="54" height="8" rx="4" fill="{NAVY}"/>
  {check(110, 33, 6.5, BRIGHT)}
  <rect x="16" y="62" width="118" height="168" rx="14" fill="#fff" stroke="#e2e8f0" stroke-width="2"/>
  <rect x="16" y="62" width="118" height="78" rx="14" fill="{ACCENT}"/>
  <rect x="16" y="120" width="118" height="20" fill="{ACCENT}"/>
  <circle cx="52" cy="98" r="18" fill="#fff" opacity=".85"/>
  <path d="M74 132l22 -34 26 34Z" fill="#fff" opacity=".7"/>
  {lines(26, 152, [84, 60], '#94a3b8')}
  <rect x="26" y="182" width="98" height="18" rx="9" fill="{BRIGHT}"/>
  <text x="75" y="195" text-anchor="middle" {FONT} font-size="10" font-weight="700" fill="#fff">Book now</text>
  <rect x="26" y="206" width="98" height="18" rx="9" fill="#fff" stroke="{BRIGHT}" stroke-width="1.6"/>
  <text x="75" y="219" text-anchor="middle" {FONT} font-size="10" font-weight="700" fill="{BRIGHT}">View offers</text>
  <rect x="18" y="240" width="52" height="18" rx="9" fill="#eef4ff"/>
  <rect x="76" y="240" width="56" height="18" rx="9" fill="#eef4ff"/>"""
    side_card = lambda x, y, rot, col: f"""<g transform="translate({x} {y}) rotate({rot})">
  <rect width="110" height="140" rx="14" fill="#fff" stroke="#e2e8f0" stroke-width="2"/>
  <rect width="110" height="62" rx="14" fill="{col}"/><rect y="48" width="110" height="14" fill="{col}"/>
  {lines(12, 76, [76, 52], '#94a3b8')}
  <rect x="12" y="108" width="86" height="18" rx="9" fill="{BRIGHT}" opacity=".9"/>
</g>"""
    badge = f"""<g transform="translate(520 92)">
  <rect width="150" height="44" rx="22" fill="#fff" stroke="#dbe4f5" stroke-width="2"/>
  {check(24, 22, 12, BRIGHT)}
  <text x="44" y="27" {FONT} font-size="14" font-weight="700" fill="{NAVY}">Verified sender</text>
</g>"""
    body = (side_card(190, 150, -10, SUN) + side_card(505, 170, 9, CORAL)
            + phone(325, 60, 150, 300, screen)
            + badge
            + person(640, 440, ACCENT, pants=BRAND, hair_long=True, hair="#6b3f2a",
                     arms=arm(ACCENT, -34, -145, -58, -170, -84, -196) + arm(ACCENT, 34, -145, 44, -108, 30, -86))
            + sparkle(150, 110, 1.2) + sparkle(300, 52, .8, BRIGHT) + sparkle(740, 220, .9, ACCENT))
    return frame(body, bg=("#f1f0ff", "#e6f7ff"), blob="#e2dcff")


# ---------------------------------------------------------------- Voice & IVR
def voice():
    keys = ""
    for i in range(9):
        cx, cy = 42 + (i % 3) * 33, 128 + (i // 3) * 33
        hl = i == 0
        keys += (f'<circle cx="{cx}" cy="{cy}" r="13" fill="{BRIGHT if hl else "#eef2f7"}"/>'
                 f'<text x="{cx}" y="{cy+5}" text-anchor="middle" {FONT} font-size="13" font-weight="700" '
                 f'fill="{"#fff" if hl else NAVY}">{i+1}</text>')
    screen = f"""
  <text x="75" y="44" text-anchor="middle" {FONT} font-size="12" font-weight="600" fill="#64748b">Calling…</text>
  <text x="75" y="66" text-anchor="middle" {FONT} font-size="12.5" font-weight="800" fill="{NAVY}">Press 1 to confirm</text>
  <rect x="34" y="78" width="82" height="22" rx="11" fill="#eef4ff"/>
  <path d="M46 89h6M56 84v10M62 81v16M68 85v8M74 82v14M80 86v6M86 83v12M92 85v8M98 87v4M104 84v10" stroke="{BRIGHT}" stroke-width="2.6" stroke-linecap="round"/>
  {keys}
  <circle cx="75" cy="252" r="17" fill="{WA}"/>
  <path d="M68 249c3 6 7 10 13 12l3-3c1-1 2-1 3 0l3 2c1 1 1 2 0 3l-2 2c-9 1-22-12-21-21l2-2c1-1 2-1 3 0l2 3c1 1 1 2 0 3Z" fill="#fff"/>"""
    waves = "".join(f'<path d="M{490+i*22} {150-i*14}q{18+i*8} {60+i*14} 0 {120+i*28}" fill="none" '
                    f'stroke="{ACCENT}" stroke-width="5" stroke-linecap="round" opacity="{.9-i*.22}"/>'
                    for i in range(3))
    headset = f"""<path d="M-30 -204Q-30 -244 0 -244Q30 -244 30 -204" fill="none" stroke="{NAVY}" stroke-width="7" stroke-linecap="round"/>
  <rect x="-38" y="-212" width="14" height="26" rx="6" fill="{BRIGHT}"/>
  <rect x="24" y="-212" width="14" height="26" rx="6" fill="{BRIGHT}"/>
  <path d="M-31 -186Q-30 -168 -12 -168" fill="none" stroke="{NAVY}" stroke-width="4" stroke-linecap="round"/>
  <circle cx="-10" cy="-168" r="5" fill="{NAVY}"/>"""
    missed = f"""<g transform="translate(560 330)">
  <rect width="170" height="56" rx="16" fill="#fff" stroke="#e2e8f0" stroke-width="2"/>
  <circle cx="30" cy="28" r="16" fill="#ffe4dc"/>
  <path d="M22 22l16 12M38 22v12h-12" fill="none" stroke="{CORAL}" stroke-width="3.4" stroke-linecap="round" stroke-linejoin="round"/>
  <text x="56" y="25" {FONT} font-size="13" font-weight="700" fill="{NAVY}">Missed call</text>
  <text x="56" y="42" {FONT} font-size="11" font-weight="600" fill="#64748b">Lead captured</text>
</g>"""
    agent = person(190, 440, SUN, pants=BRAND, skin=SKIN2, hair="#2b1d16",
                   arms=arm(SUN, -34, -145, -50, -112, -30, -96, SKIN2) + arm(SUN, 34, -145, 52, -120, 40, -100, SKIN2) + headset)
    desk = f'<rect x="90" y="340" width="210" height="16" rx="8" fill="{BRAND}"/><rect x="110" y="356" width="12" height="84" fill="{BRAND}"/><rect x="268" y="356" width="12" height="84" fill="{BRAND}"/>'
    laptop = f'<path d="M150 340l14 -54h96l-14 54Z" fill="#cbd5e1"/><circle cx="205" cy="312" r="7" fill="#fff"/>'
    body = (waves + agent + desk + laptop + phone(330, 70, 150, 300, screen) + missed
            + sparkle(640, 110, 1.1, SUN) + sparkle(110, 120, .8, ACCENT))
    return frame(body, bg=("#fff7ec", "#eef6ff"), blob="#ffe7c7")


# ---------------------------------------------------------------- WhatsApp
def whatsapp():
    ticks = lambda x, y: (f'<path d="M{x} {y}l3 3 6 -6M{x+5} {y+3}l1 0 6 -6" fill="none" stroke="#34b7f1" '
                          f'stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>')
    screen = f"""
  <rect x="11" y="18" width="128" height="40" rx="8" fill="#075e54"/>
  <circle cx="31" cy="38" r="11" fill="#fff"/>
  <text x="31" y="42" text-anchor="middle" {FONT} font-size="11" font-weight="800" fill="#075e54">A</text>
  <rect x="48" y="30" width="56" height="8" rx="4" fill="#fff"/>
  <rect x="48" y="42" width="34" height="6" rx="3" fill="#9fd9cf"/>
  <rect x="11" y="58" width="128" height="214" fill="#efe7dc"/>
  <rect x="18" y="68" width="96" height="44" rx="10" fill="#fff"/>
  {lines(26, 78, [74, 52], '#94a3b8')}
  <rect x="18" y="120" width="104" height="96" rx="10" fill="#fff"/>
  <rect x="24" y="126" width="92" height="44" rx="7" fill="{SUN}"/>
  <path d="M60 158l10 -16 12 16Z" fill="#fff" opacity=".8"/>
  <text x="26" y="186" {FONT} font-size="11" font-weight="700" fill="{NAVY}">Sneakers</text>
  <text x="26" y="202" {FONT} font-size="11" font-weight="800" fill="#075e54">₹1,499</text>
  <rect x="44" y="224" width="90" height="36" rx="10" fill="#dcf8c6"/>
  {lines(52, 233, [56], '#7aa66a')}
  {ticks(108, 247)}"""
    bubbles = f"""<g transform="translate(520 104)">
  <rect width="180" height="58" rx="18" fill="#fff" stroke="#d6eadf" stroke-width="2"/>
  <path d="M24 58l-6 16 20 -16Z" fill="#fff"/>
  <text x="18" y="25" {FONT} font-size="13" font-weight="700" fill="{NAVY}">Order confirmed ✓</text>
  <text x="18" y="44" {FONT} font-size="11" font-weight="600" fill="#64748b">Arriving Friday</text>
</g>
<g transform="translate(540 300)">
  <rect width="150" height="50" rx="18" fill="#dcf8c6"/>
  <text x="18" y="31" {FONT} font-size="13" font-weight="700" fill="#1f5135">Track my order</text>
  {ticks(124, 30)}
</g>"""
    logo = f'<g transform="translate(250 92)"><circle r="34" fill="{WA}"/><path d="M0 -20a20 20 0 0 0 -17 30l-3 11 11 -3A20 20 0 1 0 0 -20z" fill="#fff"/><path d="M-6 -8c1 6 6 11 12 13l3 -3c1 -1 2 -1 3 0l2 2c0 2 -2 4 -4 4c-9 0 -20 -10 -20 -19c0 -2 2 -4 4 -4l2 2c1 1 1 2 0 3Z" fill="{WA}"/></g>'
    shopper = person(170, 440, WA, pants=NAVY, skin=SKIN, hair="#3b2a20", hair_long=True,
                     arms=arm(WA, -34, -145, -48, -110, -30, -90) + arm(WA, 34, -145, 58, -128, 76, -150)
                     + f'<rect x="66" y="-196" width="40" height="70" rx="8" fill="{NAVY}" transform="rotate(14 86 -160)"/>'
                     + f'<rect x="71" y="-190" width="30" height="56" rx="5" fill="#dcf8c6" transform="rotate(14 86 -160)"/>')
    body = (shopper + logo + phone(330, 60, 150, 300, screen) + bubbles
            + sparkle(700, 230, 1, SUN) + sparkle(120, 110, .8, WA))
    return frame(body, bg=("#effcf3", "#eaf6ff"), blob="#d3f5e0")


# ---------------------------------------------------------------- Digital marketing
def marketing():
    bars = "".join(f'<rect x="{252+i*44}" y="{300-h}" width="28" height="{h}" rx="6" fill="{c}"/>'
                   for i, (h, c) in enumerate([(40, "#c7d7ff"), (64, "#9db8ff"), (54, "#9db8ff"),
                                                (94, BRIGHT), (116, BRAND)]))
    laptop = f"""<g>
  <rect x="220" y="110" width="290" height="210" rx="16" fill="{NAVY}"/>
  <rect x="234" y="124" width="262" height="182" rx="8" fill="#fff"/>
  <rect x="246" y="136" width="90" height="10" rx="5" fill="{NAVY}" opacity=".85"/>
  <rect x="246" y="152" width="56" height="7" rx="3.5" fill="#94a3b8"/>
  <rect x="404" y="134" width="80" height="26" rx="13" fill="#e7f9ee"/>
  <text x="444" y="152" text-anchor="middle" {FONT} font-size="12" font-weight="800" fill="#15803d">▲ 38%</text>
  {bars}
  <path d="M262 252L306 230L350 238L394 196L438 170" fill="none" stroke="{CORAL}" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
  <circle cx="438" cy="170" r="6" fill="{CORAL}"/>
  <path d="M190 320h350l-24 24H214Z" fill="#cbd5e1"/>
</g>"""
    target = f"""<g transform="translate(690 128) scale(.82)">
  <circle r="58" fill="#fff"/><circle r="58" fill="none" stroke="{CORAL}" stroke-width="10"/>
  <circle r="36" fill="none" stroke="{CORAL}" stroke-width="10"/><circle r="14" fill="{CORAL}"/>
  <path d="M8 -8L64 -64" stroke="{NAVY}" stroke-width="6" stroke-linecap="round"/>
  <path d="M60 -78l18 -2 -2 18 -14 -2Z" fill="{SUN}"/>
</g>"""
    like = f'<g transform="translate(150 140)"><circle r="34" fill="{BRIGHT}"/><path d="M-12 14v-20h7l9 -14c4 0 6 3 5 7l-2 7h10c4 0 6 3 5 6l-4 12c-1 2 -3 3 -5 3Z M-20 -6h6v20h-6Z" fill="#fff"/></g>'
    heart = f'<g transform="translate(690 300)"><circle r="26" fill="#fff"/><path d="M0 10l-12 -12a7 7 0 0 1 12 -9a7 7 0 0 1 12 9Z" fill="{CORAL}"/></g>'
    marketer = person(590, 440, CORAL, pants=NAVY, hair="#4a2b1d",
                      arms=arm(CORAL, -34, -145, -60, -134, -84, -150) + arm(CORAL, 34, -145, 44, -110, 30, -88))
    body = (laptop + target + like + heart + marketer
            + sparkle(110, 300, 1, SUN) + sparkle(540, 70, .8, ACCENT))
    return frame(body, bg=("#fff3f0", "#eef4ff"), blob="#ffe0d7")


for slug, fn in {"bulk-sms": bulk_sms, "rcs": rcs, "voice-ivr": voice, "whatsapp": whatsapp,
                 "digital-marketing": marketing}.items():
    path = os.path.join(OUT, f"{slug}.svg")
    with open(path, "w", encoding="utf-8") as f:
        f.write(fn())
    print(slug, os.path.getsize(path), "bytes")
