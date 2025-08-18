
    <header>

        <!-- start navigation -->

        <nav class="navbar navbar-expand-lg header-light bg-transparent disable-fixed">

            <div class="container-fluid">

                <div class="">

                    <a class="navbar-brand" href="{{route('home')}}">

                      {{-- <h3 class="default-logo">LOGO</h3> --}}
                         {{-- <img src="{{asset('images/logo.png')}}"
                            data-at2x="images/demo-scattered-portfolio-logo-black@2x.png" alt="" class="default-logo"> --}}

                        {{-- <img src="images/demo-scattered-portfolio-logo-black.png"
                            data-at2x="images/demo-scattered-portfolio-logo-black@2x.png" alt="" class="alt-logo">

                        <img src="images/demo-scattered-portfolio-logo-black.png"
                            data-at2x="images/demo-scattered-portfolio-logo-black@2x.png" alt="" class="mobile-logo">  --}}

                    </a>

                </div>

                <div class="col-auto menu-order position-static">

                    <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">

                        <span class="navbar-toggler-line"></span>

                        <span class="navbar-toggler-line"></span>

                        <span class="navbar-toggler-line"></span>

                        <span class="navbar-toggler-line"></span>

                    </button>

                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">

                        <ul class="navbar-nav">

                            <li class="nav-item"><a href="{{route('home')}}" class="nav-link">Home</a></li>

                            <li class="nav-item"><a href="{{route('about')}}"
                                    class="nav-link">About</a></li>

                            <li class="nav-item"><a href="{{route('channel')}}"
                                    class="nav-link">Channel</a></li>

                            <li class="nav-item"><a href="{{route('industry-solution')}}" class="nav-link">Industries Solution</a>
                            </li>



                            <li class="nav-item"><a href="{{route('election-campaign')}}" class="nav-link ">Election-Campaign</a>
                            </li>



                            <li class="nav-item"><a href="{{route('election-campaign')}}" class="nav-link ">DLT Registration</a>
                            </li>

                            <li class="nav-item"><a href="{{route('contact')}}"
                                    class="nav-link">Contact</a></li>

                                    <li class="nav-item"><a href="demo-scattered-portfolio-contact.html"

                                    class="nav-link">Payment</a></li>

                        </ul>

                    </div>

                </div>


                <!-- 🔹 Toggle Button -->
<!-- 🔹 Toggle Button -->
<div class="menu-toggle" id="menuToggle">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
  </div>

  <!-- 🔹 Fullscreen Menu -->
  <div class="fullscreen-menu" id="fullscreenMenu">
    <div class="menu-content">
      <!-- Left column -->
      <div class="menu-left">
        <img src="../images/Real_Estate_nav.webp" alt="Menu Image">
      </div>
      <!-- Right column -->
      <div class="menu-right">
        <div class="rughtMainMenu" style="max-width: 50%; margin: 0 auto; width: 100%;">
          <div class="d-flex justify-content-between mb-5">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <p>UGF- 6, Antariksh Bhawan, KG Marg, New Delhi-110001</p>
          <p>info@spj-group.com | +91 - 9055290552</p>
          <div class="d-flex gap-4">
            <a class="facebook" href="https://www.facebook.com/" target="_blank">Fb.</a>
            <a class="twitter" href="https://www.twitter.com" target="_blank">Tw.</a>
            <a class="linkedin" href="http://www.linkedin.com" target="_blank">In.</a>
            <a class="instagram" href="http://www.instagram.com" target="_blank">Ig.</a>
          </div>
        </div>
      </div>
    </div>
  </div>

            </div>

        </nav>

        <!-- end navigation -->
        <script>
            const menuToggle = document.getElementById("menuToggle");
            const fullscreenMenu = document.getElementById("fullscreenMenu");

            menuToggle.addEventListener("click", () => {
              fullscreenMenu.classList.toggle("show");
              document.body.classList.toggle("no-scroll");

              // 🔹 toggle the animated hamburger -> cross
              menuToggle.classList.toggle("active");
            });
          </script>

    </header>
