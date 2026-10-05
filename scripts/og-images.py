"""Generate the 1200x630 Open Graph share images in public/images/og/.

Run from anywhere:  python scripts/og-images.py   (needs Pillow; uses the
Windows Segoe UI fonts, so point FONTS elsewhere on other systems).
"""
import os
from PIL import Image, ImageChops, ImageDraw, ImageFilter, ImageFont

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
OUT = os.path.join(ROOT, "public", "images", "og")
FONTS = r"C:\Windows\Fonts"
os.makedirs(OUT, exist_ok=True)

W, H = 1200, 630
NAVY, NAVY2 = (11, 18, 32), (20, 41, 92)
ACCENT, BRIGHT = (53, 211, 225), (25, 93, 255)
MUTED = (170, 184, 208)

bold = lambda s: ImageFont.truetype(os.path.join(FONTS, "segoeuib.ttf"), s)
semi = lambda s: ImageFont.truetype(os.path.join(FONTS, "seguisb.ttf"), s)
reg = lambda s: ImageFont.truetype(os.path.join(FONTS, "segoeui.ttf"), s)

PAGES = {
    "home": ("Omni-channel business messaging",
             "Reach every customer on the channel they already use."),
    "channel": ("Channels",
                "Four messaging channels, one integration."),
    "industry-solution": ("Industry solutions",
                          "Messaging built around how your industry works."),
    "election-campaign": ("Election campaigns",
                          "Keep voters informed with compliant campaign messaging."),
    "dlt-registration": ("DLT registration",
                         "TRAI DLT registration, handled end to end."),
    "about": ("About us",
              "We keep business messages arriving, not just sending."),
    "contact": ("Contact",
                "Let's talk about your next campaign."),
}


def background():
    # diagonal navy gradient
    base = Image.new("RGB", (W, H), NAVY)
    # diagonal = average of a horizontal and a vertical ramp (no rotate seams)
    v = Image.linear_gradient("L").resize((W, H))
    h = Image.linear_gradient("L").rotate(90).resize((W, H))
    grad = ImageChops.invert(Image.blend(v, h, 0.5))
    base = Image.composite(Image.new("RGB", (W, H), NAVY2), base, grad)

    # soft glows
    glow = Image.new("RGB", (W, H), (0, 0, 0))
    g = ImageDraw.Draw(glow)
    g.ellipse((780, -260, 1380, 340), fill=(20, 110, 140))
    g.ellipse((-260, 380, 340, 900), fill=(18, 50, 140))
    glow = glow.filter(ImageFilter.GaussianBlur(140))
    base = ImageChops.add(base, glow)

    # hairline dot grid
    d = ImageDraw.Draw(base)
    for x in range(40, W, 40):
        for y in range(40, H, 40):
            d.point((x, y), fill=(40, 56, 88))
    return base


def wrap(draw, text, font, width):
    words, lines, line = text.split(), [], ""
    for w in words:
        trial = (line + " " + w).strip()
        if draw.textlength(trial, font=font) <= width:
            line = trial
        else:
            lines.append(line)
            line = w
    lines.append(line)
    return lines


# The logo mark is a 256px square; scale it down to chip size.
logo = Image.open(os.path.join(ROOT, "public", "images", "logo.png")).convert("RGB")
logo = logo.resize((84, 84), Image.LANCZOS)

for slug, (eyebrow, headline) in PAGES.items():
    im = background()
    d = ImageDraw.Draw(im)
    x = 80

    # logo chip
    chip_w, chip_h = logo.width + 24, logo.height + 24
    chip = Image.new("RGB", (chip_w, chip_h), (255, 255, 255))
    mask = Image.new("L", (chip_w, chip_h), 0)
    ImageDraw.Draw(mask).rounded_rectangle((0, 0, chip_w - 1, chip_h - 1), 16, fill=255)
    chip.paste(logo, (12, 12))
    im.paste(chip, (x, 64), mask)
    d.text((x + chip_w + 22, 64 + chip_h / 2), "Ad Magister", font=bold(34), fill=(255, 255, 255), anchor="lm")

    # eyebrow
    y = 228
    d.line((x, y + 14, x + 40, y + 14), fill=ACCENT, width=3)
    d.text((x + 56, y + 14), eyebrow.upper(), font=semi(24), fill=ACCENT, anchor="lm")

    # headline, shrink until it fits in 3 lines
    size = 68
    while True:
        f = bold(size)
        lines = wrap(d, headline, f, W - 2 * x)
        if len(lines) <= 3 or size <= 44:
            break
        size -= 4
    y = 280
    for ln in lines:
        d.text((x, y), ln, font=f, fill=(255, 255, 255))
        y += int(size * 1.18)

    # footer strip
    d.line((x, H - 96, W - x, H - 96), fill=(44, 60, 94), width=1)
    d.text((x, H - 58), "SMS  ·  RCS  ·  Voice  ·  WhatsApp Business API", font=reg(24), fill=MUTED, anchor="lm")
    pill = "DLT-registered routes"
    pw = d.textlength(pill, font=semi(22)) + 40
    d.rounded_rectangle((W - x - pw, H - 78, W - x, H - 38), 20, fill=BRIGHT)
    d.text((W - x - pw / 2, H - 58), pill, font=semi(22), fill=(255, 255, 255), anchor="mm")

    path = os.path.join(OUT, f"{slug}.jpg")
    im.save(path, "JPEG", quality=88, optimize=True, progressive=True)
    print(slug, os.path.getsize(path) // 1024, "KB")
