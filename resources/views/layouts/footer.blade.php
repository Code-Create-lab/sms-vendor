
<footer class="position-relative footer_section">

    <div id="particles-style-02" class="position-absolute h-100 top-0 left-0 w-100 z-index-minus-2"
        data-particle="true"
        data-particle-options='{"particles":{"number":{"value":5,"density":{"enable":true,"value_area":800}},"color":{"value":"#000000"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":1,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":4,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":false,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true}'>
    </div>

    <div class="container">

        <div class="row mb-4">
            <div class="col-12 text-center">
                <div class="fs-90 md-fs-70 xs-fs-50 fw-700 textMains lh-100 md-lh-80 xs-lh-60 ls-minus-4px"
                    data-anime='{"translateY": [20, 0], "opacity": [0,1], "duration": 800, "delay": 200, "easing": "easeOutQuad" }' style="color: white">
                    Ad Magister
                </div>
                <p class="fs-20 fw-500 textMains mt-3" style="color: white">
                    Authentic sweets from Gaya, Bihar – Made with tradition & love.
                </p>
            </div>
        </div>

        <div class="row">
            <!-- Address -->
            <div class="col-12 col-xl-3 col-sm-6 xs-mb-10px text-center text-sm-start overflow-hidden">
                <h5 class="fw-700 textMains mb-3" >Our Address</h5>
                {{-- <p class="fs-16 mb-1">Ad Magister Pvt. Ltd.</p> --}}
                <p class="fs-16 mb-1 textMains">Office No.305, 3rd floor, Vashisht Commercial Complex, Opp.Pillar No.52, MG Road,Sikandarpur, <br> Gurugram (122002)</p>
            </div>

            <!-- Contact -->
            <div class="col-12 col-xl-3 col-sm-6 xs-mb-10px text-center text-sm-start">
                <h5 class="fw-700 textMains mb-3">Contact Us</h5>
                <p class="fs-16 mb-1 textMains">📞 +91 98765 43210</p>
                <p class="fs-16 mb-1 textMains">✉️ info@admagister.com</p>
            </div>

            <!-- Quick Links -->
            <div class="col-12 col-xl-3 col-sm-6 xs-mb-10px text-center text-sm-start">
                <h5 class="fw-700 textMains mb-3">Quick Links</h5>
               <ul class="quickLinks">
                <li>
                    <a href="#">Terms and Conditions</a>
                </li>
                <li>
                    <a href="#">Sitemap</a>
                </li>
                <li>
                    <a href="#">Privacy</a>
                </li>
                <li>
                    <a href="#">DLT</a>
                </li>
                <li>
                    <a href="#">Legal-Notices</a>
                </li>
                <li>
                    <a href="#">FAQs</a>
                </li>
               </ul>
            </div>

            <!-- Social -->
            <div class="col-12 col-xl-3 text-center text-sm-end">
                <h5 class="fw-700 textMains mb-3">Follow Us</h5>
                <div class="d-flex gap-4 socialMediaIcon justify-content-end">
                    <a class="smIcons facebook " href="https://www.facebook.com/" target="_blank">Fb.</a>
                    <a class="smIcons twitter" href="https://www.twitter.com" target="_blank">Tw.</a>
                    <a class="smIcons linkedin" href="http://www.linkedin.com" target="_blank">In.</a>
                    <a class="smIcons instagram" href="http://www.instagram.com" target="_blank">Ig.</a>
                </div>
            </div>
        </div>

        <hr class="mt-5 mb-3 border-dark opacity-25">

        <div class="text-center fs-14 textMains">
            &copy; {{ date('Y') }} Ad Magister. All Rights Reserved.
        </div>

    </div>
    <div class="cookie-popup" id="cookiePopup">
        <div class="cookie-content">
            <p>
                By clicking ‘Accept’, you agree to the storing of cookies on your device to enhance site navigation, analyze site usage, and assist in our marketing efforts. View our Privacy Policy for more information.
            </p>

            <div class="cookie-buttons d-flex justify-content-between">
                <button id="declineCookie" class="cookie-decline">Deny</button>
                <button id="acceptCookie" class="cookie-accept">Accept</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let cookieBox = document.getElementById("cookiePopup");

            if (!localStorage.getItem("cookieConsent")) {
                cookieBox.classList.add("show");
            }

            document.getElementById("acceptCookie").addEventListener("click", function () {
                localStorage.setItem("cookieConsent", "accepted");
                cookieBox.classList.remove("show");
            });

            document.getElementById("declineCookie").addEventListener("click", function () {
                localStorage.setItem("cookieConsent", "declined");
                cookieBox.classList.remove("show");
            });
        });
        </script>


</footer>
