@extends('layouts.app')
@section('content')
<!-- === REPLACE STYLE START === -->
<style>
:root{
  --sr-radius:14px;
  --sr-accent:#c0262e; /* red accent similar to your topbar */
  --sr-ink:#0b1220;
  --banner-heading: "Make your customer conversations count";
  --banner-sub: "Omni-channel messaging — SMS, Voice, RCS, WhatsApp & more";
}

/* ---------- Banner / video improvements ---------- */
.mainVideoContainer {
  position: relative;
  padding: 36px 0 56px; /* more vertical space so banner breathes */
  background: linear-gradient(180deg, #fafafa 0%, #f4f6f8 60%);
  overflow: hidden;
}

/* Decorative blurred shapes behind video to add visual weight */
.mainVideoContainer::before,
.mainVideoContainer::after{
  content: "";
  position: absolute;
  z-index: 0;
  filter: blur(80px) saturate(1.05);
  opacity: 0.28;
  pointer-events: none;
  transform: translate3d(0,0,0);
}
.mainVideoContainer::before{
  width: 520px; height: 420px;
  right: -120px; top: -60px;
  background: radial-gradient(circle at 30% 30%, #ffd7d7, transparent 35%);
}
.mainVideoContainer::after{
  width: 680px; height: 460px;
  left: -180px; bottom: -40px;
  background: radial-gradient(circle at 70% 70%, #e6f2ff, transparent 30%);
}

/* Video wrapper updated so it feels like a proper hero/banner */
.video-section { display:flex; justify-content:center; align-items:center; }
.video-container {
    position: relative;
    z-index: 2;
    min-width: 80%;
    width: 85%;
    max-width: 1180px;
    height: auto;
    border-radius: 50px;
    overflow: hidden;
    transform-origin: center center;
    transition: transform 360ms cubic-bezier(.2,.9,.2,1), box-shadow 300ms ease;
    background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(0,0,0,0.02));
    /* box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset; */
    /* box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px !important; */
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    /* background-color: #848688; */
}

/* video should cover, but we keep natural proportions */
.video-element {
    padding: 40px;
    width: 100%;
    border-radius: 60px;
    height: auto;
    display: block;
    object-fit: contain;
    transform-origin: center center;
    transition: transform 420ms cubic-bezier(.2,.9,.2,1);
    will-change: transform;
}

/* subtle dark vignette over bottom to increase contrast for any overlay text */
.mainVideoContainer .video-container::after {
  content: "";
  position: absolute;
  inset: 0;
  pointer-events: none;
  background: linear-gradient(180deg, rgba(0,0,0,0) 45%, rgba(6,8,10,0.48) 100%);
  mix-blend-mode: multiply;
  z-index: 3;
}

/* Decorative glass card overlay centered on the banner (CSS-generated content so no HTML change) */
.mainVideoContainer::marker { /* fallback to avoid odd rendering in some browsers */ }
.mainVideoContainer .sr-banner-badge { /* created purely via CSS below as pseudo-element */ }

/* Centered textual CTA created with a pseudo element for quick editable text:
   You can change the text by editing the --banner-heading and --banner-sub variables above. */
.mainVideoContainer .video-section::before {
    content: var(--banner-heading);
    position: absolute;
    z-index: 4;
    left: 50%;
    top: 15%;
    transform: translateX(-50%);
    font-weight: 700;
    font-size: clamp(20px, 3.4vw, 36px);
    color: #ffffff;
    text-align: center;
    letter-spacing: -0.2px;
    padding: 10px 18px;
    border-radius: 8px;
    /* background: #ffffff; */
    box-shadow: 0 8px 30px rgba(2,6,23,0.4);
    backdrop-filter: blur(6px) saturate(1.02);
    max-width: 88%;
    line-height: 1.05;
    background-color: #264a9f;
}
.mainVideoContainer .video-section::after {
  content: var(--banner-sub);
  position: absolute;
  z-index: 4;
  left: 50%;
  top: calc(14% + 56px);
  transform: translateX(-50%);
  font-weight: 500;
  font-size: clamp(13px, 1.5vw, 16px);
  color: rgba(255,255,255,0.92);
  text-align: center;
  padding: 6px 12px;
  border-radius: 8px;
  background: rgba(0,0,0,0.18);
  backdrop-filter: blur(4px);
  max-width: min(780px, 86%);
}

/* make sure pseudo-elements collapse on tiny screens */
@media (max-width: 768px){
  .mainVideoContainer .video-section::before { top:35%; width: 100%; font-size: clamp(18px, 6vw, 24px); padding:8px 12px; font-size: 16px; }
  .mainVideoContainer .video-section::after { top: calc(31% + 44px); font-size: 9px; padding:0px 10px; width: 75%; }
  .mainVideoContainer { padding: 18px 0 36px; }
  .video-container { width: 96%; max-width: 1000px; }
}

/* small-screen fallback: remove heavy blur & shapes */
@media (max-width: 420px) {
  .mainVideoContainer::before, .mainVideoContainer::after { display:none; }
  .video-container { box-shadow: 0 8px 24px rgba(2,6,23,0.12); border-radius:10px; }
}

/* Preserve preference reduced motion */
@media (prefers-reduced-motion: reduce){
  .video-container, .video-element { transition: none !important; animation: none !important; transform: none !important; }
  .mainVideoContainer .video-section::before,
  .mainVideoContainer .video-section::after { transition: none !important; }
}

/* Keep rest of sr-portfolio styles you had (to avoid breaking anything) */
/* If you have previously defined .sr-portfolio-* styles, keep them below (we assume they exist). */
</style>
<!-- === REPLACE STYLE END === -->

{{-- https://craftohtml.themezaa.com/demo-scattered-portfolio-contact.html --}}
   <!-- start section -->

    {{-- <section
        class="full-screen magic-cursor round-cursor position-relative top-space-margin lg-h-auto p-0 overflow-hidden">

        <div id="particles-style-01" class="position-absolute h-100 top-0 left-0 w-100" data-particle="true"
            data-particle-options='{"particles":{"number":{"value":5,"density":{"enable":true,"value_area":800}},"color":{"value":"#000000"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":1,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":4,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":false,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true}'>
        </div>

        <div class="container h-100">

            <div class="row h-100 align-items-center text-sm-start text-center position-relative">

                <div class="col-12 md-mb-70px sm-mb-50px xs-mb-20px">

                    <div class="fw-800 text-black fs-220 ls-minus-8px xs-ls-minus-5px text-uppercase overflow-hidden">

                        <div data-bottom-top="transform: translate3d(-80px, 0px, 0px);"
                            data-top-bottom="transform: translate3d(80px, 0px, 0px);">Digital</div>

                        <div class="ms-8 xs-ms-0 fancy-text-style-4"
                            data-bottom-top="transform: translate3d(80px, 0px, 0px);"
                            data-top-bottom="transform: translate3d(-80px, 0px, 0px);"> <span
                                data-fancy-text='{ "effect": "rubber-band", "direction": "left", "string": ["agency", "studio"], "speed": 100, "duration": 3000 }'></span>
                        </div>

                    </div>

                </div>

                <div class="col-12 mb-auto">

                    <div class="row align-items-end"
                        data-anime='{ "el": "childs", "translateX": [-15, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>

                        <div class="col-xl-4 col-lg-5 offset-xl-1 md-mb-15px">

                            <div class="fs-19 fw-600 text-black">We believe in the power of brand.</div>

                            <span class="d-block">Specialize in bringing digital identities.</span>

                            <span class="d-block opacity-6">Build brands for the digital.</span>

                        </div>

                        <div class="col-lg-7">

                            <div class="fs-80 sm-fs-50 text-black fw-200">- <span
                                    class="fs-170 lg-fs-140 md-fs-120 sm-fs-110 ls-minus-6px font-style-italic alt-font fw-500">SRS</span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section> --}}

<section class="mainVideoContainer">
    <div class="video-section">
  <div class="video-container">
    <video autoplay muted loop playsinline class="video-element">
      <source src="{{asset('video/homeVideoLatest.mp4')}}" type="video/mp4">
    </video>
  </div>
</div>
</section>


    <!-- end section -->

    <!-- start section -->

 <!-- Redesigned portfolio section with unique classes (sr- prefix) -->
<section class="sr-portfolio-section pb-0">

  <div class="container">
    <div class="row gx-4 gy-4 sr-portfolio-row">

           <!-- RCS -->
      <article class="col-xl-5 col-lg-7 sr-portfolio-col" id="voice-sms-article">
        <a href="demo-scattered-portfolio-single-project-creative.html"
           class="sr-portfolio-item"
           aria-labelledby="sr-p2-title"
           role="group">
          <img class="sr-portfolio-img" src="images/3.jpg" alt="RCS">
          <div class="sr-portfolio-overlay" aria-hidden="true">
            <div class="sr-overlay-content">
              <h3 id="sr-p2-title" class="sr-overlay-title">RCS</h3>
              <p class="sr-overlay-text">
                Personalised voice broadcast and IVR-based communications for high-impact campaigns.
              </p>
              <span class="sr-overlay-cta">Learn more →</span>
            </div>
          </div>
        </a>
      </article>

      <!-- Voice SMS -->
      <article class="col-xl-3 col-lg-7 sr-portfolio-col" id="voice-sms-article">
        <a href="demo-scattered-portfolio-single-project-creative.html"
           class="sr-portfolio-item"
           aria-labelledby="sr-p2-title"
           role="group">
          <img class="sr-portfolio-img" src="images/website-img/voice-sms.jpg" alt="Voice SMS">
          <div class="sr-portfolio-overlay" aria-hidden="true">
            <div class="sr-overlay-content">
              <h3 id="sr-p2-title" class="sr-overlay-title">Voice SMS</h3>
              <p class="sr-overlay-text">
                Personalised voice broadcast and IVR-based communications for high-impact campaigns.
              </p>
              <span class="sr-overlay-cta">Learn more →</span>
            </div>
          </div>
        </a>
      </article>

       <!-- Bulk SMS -->
      <article class="col-xl-4 col-lg-5 sr-portfolio-col" id="bulk-sms-article">
        <a href="demo-scattered-portfolio-single-project-creative.html"
           class="sr-portfolio-item"
           aria-labelledby="sr-p1-title"
           role="group">
          <img class="sr-portfolio-img" src="images/website-img/bulk-sms.jpg" alt="Bulk SMS service">
          <div class="sr-portfolio-overlay" aria-hidden="true">
            <div class="sr-overlay-content">
              <h3 id="sr-p1-title" class="sr-overlay-title">Bulk SMS</h3>
              <p class="sr-overlay-text">
                Fast, reliable bulk messaging for marketing, alerts and transactional notifications.
              </p>
              <span class="sr-overlay-cta">Learn more →</span>
            </div>
          </div>
        </a>
      </article>


      <!-- Whataapp API (full width) -->
      <article class="col-6 sr-portfolio-col" id="missed-call-article">
        <a href="demo-scattered-portfolio-single-project-creative.html"
           class="sr-portfolio-item"
           aria-labelledby="sr-p3-title"
           role="group">
          <img class="sr-portfolio-img" src="images/5.jpg" alt="Whataapp API Service">
          <div class="sr-portfolio-overlay" aria-hidden="true">
            <div class="sr-overlay-content">
              <h3 id="sr-p3-title" class="sr-overlay-title">Whataapp API</h3>
              <p class="sr-overlay-text">
                Simple missed-call based user engagement and lead capture solutions.
              </p>
              <span class="sr-overlay-cta">Learn more →</span>
            </div>
          </div>
        </a>
      </article>
      <!-- Missed Call (full width) -->
      <article class="col-6 sr-portfolio-col" id="missed-call-article">
        <a href="demo-scattered-portfolio-single-project-creative.html"
           class="sr-portfolio-item"
           aria-labelledby="sr-p3-title"
           role="group">
          <img class="sr-portfolio-img" src="images/website-img/missed-call.png" alt="Missed Call Service">
          <div class="sr-portfolio-overlay" aria-hidden="true">
            <div class="sr-overlay-content">
              <h3 id="sr-p3-title" class="sr-overlay-title">Missed Call</h3>
              <p class="sr-overlay-text">
                Simple missed-call based user engagement and lead capture solutions.
              </p>
              <span class="sr-overlay-cta">Learn more →</span>
            </div>
          </div>
        </a>
      </article>

      <!-- OTP SMS -->
      <article class="col-xl-4 col-lg-7 sr-portfolio-col" id="digital-marketing-article">
        <a href="demo-scattered-portfolio-single-project-creative.html"
           class="sr-portfolio-item"
           aria-labelledby="sr-p4-title"
           role="group">
          <img class="sr-portfolio-img" src="images/2.jpg" alt="OTP SMS">
          <div class="sr-portfolio-overlay" aria-hidden="true">
            <div class="sr-overlay-content">
              <h3 id="sr-p4-title" class="sr-overlay-title">OTP SMS</h3>
              <p class="sr-overlay-text">
                End-to-end digital campaigns: SEO, social ads, content strategy and analytics to grow conversions.
              </p>
              <span class="sr-overlay-cta">View services →</span>
            </div>
          </div>
        </a>
      </article>
     
      <!-- Digital Marketing -->
      <article class="col-xl-3 col-lg-7 sr-portfolio-col" id="digital-marketing-article">
        <a href="demo-scattered-portfolio-single-project-creative.html"
           class="sr-portfolio-item"
           aria-labelledby="sr-p4-title"
           role="group">
          <img class="sr-portfolio-img" src="images/website-img/digital-marketing.jpg" alt="Digital Marketing">
          <div class="sr-portfolio-overlay" aria-hidden="true">
            <div class="sr-overlay-content">
              <h3 id="sr-p4-title" class="sr-overlay-title">Digital Marketing</h3>
              <p class="sr-overlay-text">
                End-to-end digital campaigns: SEO, social ads, content strategy and analytics to grow conversions.
              </p>
              <span class="sr-overlay-cta">View services →</span>
            </div>
          </div>
        </a>
      </article>

      <!-- Web Development -->
      <article class="col-xl-5 col-lg-5 sr-portfolio-col" id="web-development-article">
        <a href="demo-scattered-portfolio-single-project-creative.html"
           class="sr-portfolio-item"
           aria-labelledby="sr-p5-title"
           role="group">
          <img class="sr-portfolio-img" src="images/website-img/web-development.jpg" alt="Web Development">
          <div class="sr-portfolio-overlay" aria-hidden="true">
            <div class="sr-overlay-content">
              <h3 id="sr-p5-title" class="sr-overlay-title">Web Development</h3>
              <p class="sr-overlay-text">
                Modern responsive websites, eCommerce, and web apps built with performance and accessibility in mind.
              </p>
              <span class="sr-overlay-cta">See projects →</span>
            </div>
          </div>
        </a>
      </article>

      <!-- (Add more items by copying one article block and changing ids/images/text) -->

    </div>
  </div>
</section>

<!-- Scoped CSS for the sr- prefixed classes -->
<style>
/* Layout helpers */
.sr-portfolio-section .sr-portfolio-row { align-items: stretch; }

/* Root item */
.sr-portfolio-item {
  display: block;
  text-decoration: none;
  color: inherit;
  position: relative;
  overflow: hidden;
  border-radius: 12px;
}

/* Image */
.sr-portfolio-img {
  display: block;
  width: 100%;
  height: 320px;              /* adjust per design */
  object-fit: cover;
  transition: transform 400ms cubic-bezier(.2,.9,.2,1), filter 400ms;
  will-change: transform, filter;
}

/* Overlay */
.sr-portfolio-overlay {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  padding: 24px;
  background: linear-gradient(180deg, rgba(0,0,0,0.0) 30%, rgba(10,12,16,0.62) 100%);
  transform: translateY(18%);
  opacity: 0;
  transition: opacity 300ms ease, transform 400ms cubic-bezier(.2,.9,.2,1);
  pointer-events: none;
}

/* Content card inside overlay */
.sr-overlay-content {
  width: 100%;
  max-width: 720px;
  color: #fff;
  backdrop-filter: blur(6px) saturate(1.03);
  padding: 18px;
  border-radius: 10px;
  background: linear-gradient(135deg, rgba(255,255,255,0.04), rgba(255,255,255,0.02));
  box-shadow: 0 8px 30px rgba(0,0,0,0.35);
  transform: translateY(10px);
  transition: transform 320ms ease;
}

/* Typography / small details */
.sr-overlay-title { margin: 0 0 6px 0; font-size: 20px; font-weight: 700; }
.sr-overlay-text { margin: 0 0 12px 0; font-size: 14px; line-height: 1.45; color: rgba(255,255,255,0.95); }
.sr-overlay-cta { font-weight: 600; font-size: 13px; opacity: 0.95; }

/* Hover & focus */
.sr-portfolio-item:focus .sr-portfolio-img,
.sr-portfolio-item:hover .sr-portfolio-img {
  transform: scale(1.06);
  filter: saturate(1.05) contrast(1.03);
}

.sr-portfolio-item:focus .sr-portfolio-overlay,
.sr-portfolio-item:hover .sr-portfolio-overlay {
  opacity: 1;
  transform: translateY(0%);
  pointer-events: auto;
}

.sr-portfolio-item:focus .sr-overlay-content,
.sr-portfolio-item:hover .sr-overlay-content {
  transform: translateY(0px);
}

/* Responsive */
@media (max-width: 992px) {
  .sr-portfolio-img { height: 260px; }
  .sr-overlay-content { padding: 14px; }
}
@media (max-width: 576px) {
  .sr-portfolio-img { height: 200px; }
  .sr-overlay-text { display: none; } /* keep compact on small screens */
}

/* Visible focus outline (accessibility) */
.sr-portfolio-item:focus { outline: 3px solid rgba(99, 102, 241, 0.12); outline-offset: 4px; border-radius: 12px; }
</style>

<!-- Touch JS: tap-to-toggle overlay (only on touch devices) -->
<script>
(function () {
  if (!('ontouchstart' in window)) return;

  document.querySelectorAll('.sr-portfolio-item').forEach(function (item) {
    item.addEventListener('click', function (e) {
      if (item.classList.contains('sr-tapped')) {
        // second tap: allow link navigation
        return true;
      }
      // first tap: show overlay, prevent navigation
      e.preventDefault();

      // close other tapped items
      document.querySelectorAll('.sr-portfolio-item.sr-tapped').forEach(function (other) {
        if (other !== item) {
          other.classList.remove('sr-tapped');
          var ov = other.querySelector('.sr-portfolio-overlay');
          if (ov) { ov.style.opacity = ''; ov.style.transform = ''; }
          var im = other.querySelector('.sr-portfolio-img'); if (im) im.style.transform = '';
        }
      });

      item.classList.add('sr-tapped');
      var overlay = item.querySelector('.sr-portfolio-overlay');
      if (overlay) { overlay.style.opacity = '1'; overlay.style.transform = 'translateY(0%)'; }
      var img = item.querySelector('.sr-portfolio-img'); if (img) img.style.transform = 'scale(1.06)';
    });
  });

  // close tapped overlays when tapping outside
  document.addEventListener('click', function (e) {
    if (!e.target.closest('.sr-portfolio-item')) {
      document.querySelectorAll('.sr-portfolio-item.sr-tapped').forEach(function (it) {
        it.classList.remove('sr-tapped');
        var overlay = it.querySelector('.sr-portfolio-overlay');
        if (overlay) { overlay.style.opacity = ''; overlay.style.transform = ''; }
        var img = it.querySelector('.sr-portfolio-img'); if (img) img.style.transform = '';
      });
    }
  });
})();
</script>

    <!-- end section -->

    <!-- start section -->

    <section class="pb-0">

        <div class="container">

            <div class="row mb-4 sm-mb-2">

                <div class="col-12"
                    data-anime='{ "el": "childs", "translateY": [-30, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>

                    <div
                        class="fs-110 xl-fs-80 md-fs-60 xs-fs-45 text-black fw-700 ls-minus-4px md-ls-minus-2px mb-50px">
                        We are result driven, customer oriented <span
                            class="text-decoration-line-bottom-thick alt-font font-style-italic">digital media
                            agency</span> with years of combined experience.</div>

                </div>

            </div>

            <div class="row justify-content-end">

                <div class="col-xxl-5 col-xl-6">

                    <div class="mb-60px md-mb-30px last-paragraph-no-margin">

                        <span class="d-inline-block fs-15 text-uppercase fw-700 text-black mb-5px"
                            data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutExpo" }'>We
                            drive positive change.</span>

                        <p class="w-70 lg-w-85 md-w-100"
                            data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutExpo" }'>
                            We are excited for our work and how it positively impacts clients. With over 12 years of
                            experience we have been constantly providing excellent web solutions services.</p>

                    </div>

                    <div class="last-paragraph-no-margin">

                        <span class="d-inline-block fs-15 text-uppercase fw-700 text-black mb-5px"
                            data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutExpo" }'>We
                            are rational together.</span>

                        <p class="w-70 lg-w-85 md-w-100"
                            data-anime='{ "el": "lines", "translateY": [30, 0], "opacity": [0,1], "delay": 0, "staggervalue": 250, "easing": "easeOutExpo" }'>
                            We are excited for our work and how it positively impacts clients. With over 12 years of
                            experience we have been constantly providing excellent web solutions services.</p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- end section -->

    <!-- start section -->

    <section class="pb-0">

        <div class="container">

            <div class="row mb-7 sm-mb-50px">

                <div class="col-12">

                    <span class="text-black fw-700 text-uppercase mb-10px d-block fs-15">Design services</span>

                    <div class="position-relative">

                        <h5 class="text-black fw-700 mb-0 me-25px absolute-middle-right ls-minus-2px">01</h5>

                        <div class="separator-line-1px w-100 d-block bg-black"></div>

                    </div>

                </div>

            </div>

            <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 mb-7 justify-content-center"
                data-anime='{ "el": "childs", "translateY": [-15, 0], "perspective": [1200,1200], "scale": [1.1, 1], "rotateX": [50, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>

                <div class="col icon-with-text-style-07 md-mb-30px">

                    <div
                        class="hover-box light-hover feature-box bg-black h-100 overflow-hidden p-13 xxl-p-10 xl-p-8 text-start">

                        <a href="#"
                            class="ms-0 text-white text-uppercase fw-600 mb-50 lg-mb-30 fs-15 d-inline-block">Web
                            design</a>

                        <p class="d-block mb-0 w-90 md-w-100 mt-22">We are excited for our work and how it positively
                            impacts clients. With over 12 years of experience.</p>

                        <div class="box-overlay bg-base-color z-index-minus-2"></div>

                    </div>

                </div>

                <div class="col icon-with-text-style-07 md-mb-30px">

                    <div
                        class="hover-box light-hover feature-box bg-black h-100 overflow-hidden p-13 xxl-p-10 xl-p-8 text-start">

                        <a href="#"
                            class="ms-0 text-white text-uppercase fw-600 mb-50 lg-mb-30 fs-15 d-inline-block">Web
                            development</a>

                        <p class="d-block mb-0 w-90 md-w-100 mt-22">We strive to develop real-world web solutions that
                            are ideal for small to large scale projects.</p>

                        <div class="box-overlay bg-base-color z-index-minus-2"></div>

                    </div>

                </div>

                <div class="col icon-with-text-style-07">

                    <div
                        class="hover-box light-hover feature-box bg-black h-100 overflow-hidden p-13 xxl-p-10 xl-p-8 text-start">

                        <a href="#"
                            class="ms-0 text-white text-uppercase fw-600 mb-50 lg-mb-30 fs-15 d-inline-block">eCommerce
                            solutions</a>

                        <p class="d-block mb-0 w-90 md-w-100 mt-22">We craft complete shopping experience with robust
                            eCommerce solutions that drive more.</p>

                        <div class="box-overlay bg-base-color z-index-minus-2"></div>

                    </div>

                </div>

            </div>

            <div class="row mb-7 sm-mb-50px">

                <div class="col-12">

                    <span class="text-black fw-700 text-uppercase mb-10px d-block fs-15">Honorable awards</span>

                    <div class="position-relative">

                        <h5 class="text-black fw-700 mb-0 me-25px absolute-middle-right ls-minus-2px">02</h5>

                        <div class="separator-line-1px w-100 d-block bg-black"></div>

                    </div>

                </div>

            </div>

            <div class="row mb-7 md-mb-70px sm-mb-50px">

                <div class="col-xl-4 col-lg-5 md-mb-7 last-paragraph-no-margin"
                    data-anime='{ "el": "childs", "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>

                    <p>We are excited for our work and how it positively impacts clients. With over 12 years of
                        experience we have been constantly providing excellent web solutions services.</p>

                </div>

                <div class="col-xl-7 offset-xl-1 col-lg-7 text-start"
                    data-anime='{ "el": "childs", "translateY": [15, 0], "translateX": [15, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 200, "easing": "easeOutQuad" }'>

                    <div class="row border-top border-color-dark-gray g-0">

                        <div class="col-1 text-center align-self-center">

                            <span class="text-dark-gray fs-14 fw-600">9X</span>

                        </div>

                        <div class="col-9 last-paragraph-no-margin ps-30px pe-30px pt-25px pb-25px">

                            <p>Site of the year - <span class="fw-600 text-dark-gray">Awwwards</span></p>

                        </div>

                        <div class="col-2 align-self-center text-center">

                            <span class="text-dark-gray fs-14 fw-600">2021</span>

                        </div>

                    </div>

                    <div class="row border-top border-color-dark-gray g-0">

                        <div class="col-1 text-center align-self-center">

                            <span class="text-dark-gray fs-14 fw-600">2X</span>

                        </div>

                        <div class="col-9 last-paragraph-no-margin ps-30px pe-30px pt-25px pb-25px">

                            <p>Site of the year - <span class="fw-600 text-dark-gray">CSS Design Awards</span></p>

                        </div>

                        <div class="col-2 align-self-center text-center">

                            <span class="text-dark-gray fs-14 fw-600">2020</span>

                        </div>

                    </div>

                    <div class="row border-top border-color-dark-gray g-0">

                        <div class="col-1 text-center align-self-center">

                            <span class="text-dark-gray fs-14 fw-600">4X</span>

                        </div>

                        <div class="col-9 last-paragraph-no-margin ps-30px pe-30px pt-25px pb-25px">

                            <p>Site of the month - <span class="fw-600 text-dark-gray">Awwwards</span></p>

                        </div>

                        <div class="col-2 align-self-center text-center">

                            <span class="text-dark-gray fs-14 fw-600">2019</span>

                        </div>

                    </div>

                    <div class="row border-top border-bottom border-color-dark-gray g-0">

                        <div class="col-1 text-center align-self-center">

                            <span class="text-dark-gray fs-14 fw-600">3X</span>

                        </div>

                        <div class="col-9 last-paragraph-no-margin ps-30px pe-30px pt-25px pb-25px">

                            <p>Site of the year - <span class="fw-600 text-dark-gray">The portfolio</span></p>

                        </div>

                        <div class="col-2 align-self-center text-center">

                            <span class="text-dark-gray fs-14 fw-600">2018</span>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 align-items-center text-center clients-style-06"
                data-anime='{ "el": "childs", "translateY": [-15, 0], "scale": [1.1, 1], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>

                <div class="col client-box text-center md-mb-30px">

                    <a href="#"><img src="images/awwards.svg" alt=""></a>

                </div>

                <div class="col client-box text-center md-mb-30px">

                    <a href="#"><img src="images/colorlib.svg" alt=""></a>

                </div>

                <div class="col client-box text-center sm-mb-30px">

                    <a href="#"><img src="images/envato.svg" alt=""></a>

                </div>

                <div class="col client-box text-center">

                    <a href="#"><img src="images/fwa.svg" alt=""></a>

                </div>

            </div>

        </div>

    </section>

    <!-- end section -->
    <script>
        window.addEventListener("scroll", () => {
          const scrollY = window.scrollY;
          const videoContainer = document.querySelector(".video-container");

          // When user scrolls, increase width gradually up to 100%
          let newWidth = 50 + scrollY / 10; // adjust speed here
          if (newWidth > 100) newWidth = 100;

          videoContainer.style.width = newWidth + "%";
        });
      </script>
      <!-- === REPLACE SCRIPT START === -->
<script>
(function(){
  // Smooth anchor scrolling for in-page links (keeps previous behavior)
  document.addEventListener('click', function(e){
    const a = e.target.closest('a[href^="#"]');
    if (!a) return;
    const hash = a.getAttribute('href');
    if (!hash || hash === '#') return;
    const target = document.querySelector(hash);
    if (!target) return;
    e.preventDefault();
    const y = target.getBoundingClientRect().top + window.scrollY;
    window.scrollTo({ top: y - 90, behavior: 'smooth' });
  });

  // Smooth and performant video scale on scroll using requestAnimationFrame
  const videoContainer = document.querySelector('.video-container');
  const videoEl = document.querySelector('.video-element');
  if (videoContainer && videoEl) {
    let latestScroll = 0;
    let ticking = false;
    function updateTransform(scrollY) {
      // start at slightly zoomed (0.98) and scale up to 1.02 depending on scroll
      const start = 0.98;
      const end = 1.02;
      const factor = Math.min(1, Math.max(0, scrollY / 800));
      const scale = start + (end - start) * factor;
      // apply subtle X + Y scaling for cinematic feel
      videoContainer.style.transform = 'scale(' + scale + ')';
      videoEl.style.transform = 'scale(' + (1 + (scale - 1) * 0.28) + ')';
    }
    function onScroll() {
      latestScroll = window.scrollY || window.pageYOffset;
      if (!ticking) {
        window.requestAnimationFrame(function(){
          updateTransform(latestScroll);
          ticking = false;
        });
        ticking = true;
      }
    }
    // init and add listener
    updateTransform(window.scrollY || window.pageYOffset);
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  // Keep existing touch/keyboard "tap-to-toggle" behavior for portfolio items if present
  // (we don't reimplement it here — leave your prior script intact if you have one).
})();
</script>
<!-- === REPLACE SCRIPT END === -->

@endsection
