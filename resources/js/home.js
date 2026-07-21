/*
|--------------------------------------------------------------------------
| Homepage motion layer
|--------------------------------------------------------------------------
| Motion (motion.dev) is the vanilla-JS sibling of Framer Motion, by the same
| author — same animate / inView / scroll / stagger / spring vocabulary,
| without needing React. This site is Blade + Bootstrap, so we use that.
|
| Rules this file sticks to:
|   - transform + opacity only, never width/height/top/left
|   - entrances 450ms with an ease-out curve, springs for pointer feedback
|   - prefers-reduced-motion short-circuits everything to the final state
*/

import { animate, hover, inView, scroll, stagger } from 'motion';

const root = document.querySelector('[data-da-root]');

if (root) {
    const EASE_OUT = [0.16, 1, 0.3, 1];
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');

    const settle = (elements) => {
        elements.forEach((el) => {
            el.style.opacity = '1';
            el.style.transform = 'none';
        });
    };

    /**
     * inView keeps firing every time an element re-enters the viewport, which
     * would replay entrances on scroll-back. Run the callback once, then detach.
     */
    const once = (target, run, options) => {
        let stop;
        let fired = false;

        stop = inView(
            target,
            () => {
                if (fired) return;
                fired = true;
                run();
                if (stop) stop();
            },
            options
        );
    };

    /* ---------------------------------------------------------------
     | Scroll-triggered reveals
     |
     | Elements are grouped by [data-da-reveal="<group>"] so siblings
     | stagger together instead of each firing on its own.
     --------------------------------------------------------------- */
    const revealAll = Array.from(root.querySelectorAll('[data-da-reveal]'));

    const groups = revealAll.reduce((acc, el) => {
        const key = el.getAttribute('data-da-reveal') || 'default';
        (acc[key] = acc[key] || []).push(el);
        return acc;
    }, {});

    if (reduced.matches) {
        settle(revealAll);
    } else {
        Object.values(groups).forEach((members) => {
            // Watch the first member; the whole group animates as one unit.
            once(
                members[0],
                () => {
                    animate(
                        members,
                        { opacity: [0, 1], transform: ['translateY(18px)', 'translateY(0px)'] },
                        { duration: 0.45, delay: stagger(0.05), ease: EASE_OUT }
                    );
                },
                { amount: 0.15, margin: '0px 0px -8% 0px' }
            );
        });
    }

    /* ---------------------------------------------------------------
     | Hero: animate on load rather than waiting for a scroll
     --------------------------------------------------------------- */
    const heroParts = Array.from(root.querySelectorAll('[data-da-hero]'));

    if (heroParts.length && !reduced.matches) {
        animate(
            heroParts,
            { opacity: [0, 1], transform: ['translateY(22px)', 'translateY(0px)'] },
            { duration: 0.6, delay: stagger(0.07), ease: EASE_OUT }
        );
    } else {
        settle(heroParts);
    }

    /* ---------------------------------------------------------------
     | Hero video: scroll-linked scale
     |
     | Replaces the previous handler, which queried `.video-container`
     | (an element that never existed) and threw on every scroll tick.
     --------------------------------------------------------------- */
    const media = root.querySelector('[data-da-media]');

    if (media && !reduced.matches) {
        try {
            scroll(
                (progress) => {
                    // Guard the callback shape: if a future Motion release hands
                    // back an info object instead of a number, do nothing rather
                    // than write `scale(NaN)`.
                    if (!Number.isFinite(progress)) return;

                    // 0.97 → 1 across the first half of the element's travel
                    const t = Math.min(1, progress / 0.5);
                    media.style.transform = `scale(${(0.97 + 0.03 * t).toFixed(4)})`;
                },
                { target: media, offset: ['start end', 'end start'] }
            );
        } catch {
            media.style.transform = 'none';
        }
    }

    /* ---------------------------------------------------------------
     | Pointer feedback
     |
     | Motion's `hover` ignores the emulated hover that touch devices
     | fire, so cards don't get stuck in a hovered state after a tap.
     --------------------------------------------------------------- */
    const springy = { type: 'spring', stiffness: 380, damping: 30 };

    root.querySelectorAll('[data-da-lift]').forEach((card) => {
        if (reduced.matches) return;

        hover(card, () => {
            animate(card, { transform: 'translateY(-6px)' }, springy);
            return () => animate(card, { transform: 'translateY(0px)' }, springy);
        });
    });

    root.querySelectorAll('.da-btn').forEach((btn) => {
        if (reduced.matches) return;

        btn.addEventListener('pointerdown', () => animate(btn, { transform: 'scale(0.97)' }, springy));
        ['pointerup', 'pointerleave', 'pointercancel'].forEach((evt) =>
            btn.addEventListener(evt, () => animate(btn, { transform: 'scale(1)' }, springy))
        );
    });

    /* ---------------------------------------------------------------
     | Stat counters
     --------------------------------------------------------------- */
    root.querySelectorAll('[data-da-count]').forEach((el) => {
        const target = parseFloat(el.getAttribute('data-da-count'));
        if (Number.isNaN(target)) return;

        const decimals = parseInt(el.getAttribute('data-da-decimals') || '0', 10);
        const prefix = el.getAttribute('data-da-prefix') || '';
        const suffix = el.getAttribute('data-da-suffix') || '';
        const render = (v) => {
            el.textContent = prefix + v.toFixed(decimals) + suffix;
        };

        if (reduced.matches) {
            render(target);
            return;
        }

        render(0);

        once(
            el,
            () => {
                animate(0, target, {
                    duration: 1.1,
                    ease: EASE_OUT,
                    onUpdate: render,
                });
            },
            { amount: 0.6 }
        );
    });

    /* ---------------------------------------------------------------
     | Hero video: load and play only once it is actually on screen
     |
     | The source file is ~86 MB. With `autoplay` the browser starts
     | pulling it during initial page load and competes with everything
     | else for bandwidth. Deferring it costs nothing visually, because
     | the frame already reserves its 16:9 box.
     |
     | NOTE: re-encoding that file is still the real fix — see the
     | handover notes. This only stops it hurting first paint.
     --------------------------------------------------------------- */
    const video = root.querySelector('[data-da-video]');

    if (video) {
        const conn = navigator.connection;
        const frugal =
            reduced.matches ||
            Boolean(conn?.saveData) ||
            ['slow-2g', '2g'].includes(conn?.effectiveType);

        if (!frugal) {
            once(
                video,
                () => {
                    video.preload = 'auto';
                    video.load();
                    // Autoplay can still be refused; a static first frame is fine.
                    video.play().catch(() => {});
                },
                { amount: 0.25 }
            );

            // Pause while off screen, resume on return. readyState guards the
            // very first entry, where `once` above is still fetching the file.
            inView(
                video,
                () => {
                    if (video.readyState > 0) video.play().catch(() => {});
                    return () => video.pause();
                },
                { amount: 0.1 }
            );
        }
    }

    /* ---------------------------------------------------------------
     | Hand control back: tells the watchdog in the <head> that the
     | motion layer booted, so it leaves the reveal styles in place.
     --------------------------------------------------------------- */
    document.documentElement.setAttribute('data-da-ready', '');
}
