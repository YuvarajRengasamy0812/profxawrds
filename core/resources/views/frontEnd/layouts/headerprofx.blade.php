    <!-- Top Bar -->
 
 <style>
        @media (max-width: 991.98px) {
            .navbar .dropdown-menu {
                display: none;
                position: static;
                float: none;
            }

            .navbar .dropdown-menu.show {
                display: block;
            }

            .navbar .dropdown-menu .dropdown-item {
                transition: background 0.3s ease;
            }

            .navbar .dropdown-menu .dropdown-item:hover {
                background: linear-gradient(to right, #BD8A3C, #DDC686) !important;
            }
        }
    </style>
    <div class="top-bar" id="top">
        @php
            $awardEventDateTime = Helper::awardEventDateTime();
        @endphp
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-12 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="venue-info">
                        <strong>Venue:</strong> Le Meridian, Airport Road, Dubai UAE
                        <span class="venue-date"><strong>Date & Time:</strong> {{ $awardEventDateTime }}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 text-center text-lg-end">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/profxmedia" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/profxmedia.official?igsh=MTgzbmx0bDh5dnl5eA%3D%3D" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UCH48JVPRS6QMuuATpSelwXA" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                        <a href="https://api.whatsapp.com/send/?phone=%2B971588845033&text&type=phone_number&app_absent=0" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg main-header"  style="position: sticky; top: 0; z-index:41;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="logo-section">
                    <img src="{{ asset(Helper::awardLogoAsset()) }}" alt="PROFX Awards {{ Helper::awardYear() }} Logo">
                </div>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#about">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#agendarecap">EVENT HIGHLIGHTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/gallery') }}">GALLERY</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            SPONSORS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/event') }}">Event Sponsors</a></li>
                            <li><a class="dropdown-item" href="{{ url('/media') }}">Media Sponsors</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            CATEGORIES
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/financial') }}">Forex & Brokerage Excellence Awards</a></li>
                            <li><a class="dropdown-item" href="{{ url('/Categories') }}">Prop Firm Awards</a></li>
                            <li><a class="dropdown-item" href="{{ url('/categoriesaward') }}">Technology CRM & Infrastructure</a></li>
                            <li><a class="dropdown-item" href="{{ url('/educationalAcademy') }}">Fintech & Payment Awards</a></li>
                            <li><a class="dropdown-item" href="{{ url('/fintech') }}">Marketing & Media Awards</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/influencer') }}">Special Excellence Awards</a></li>
                            <li><a class="dropdown-item" href="{{ url('/educationalAcademy') }}">Education Community & Leadership</a></li>

                            <li><a class="dropdown-item" href="{{ url('/influencer') }}">Influencer Excellence Awards</a></li>

                        </ul>
                    </li>
 <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                          PREVIOUS AWARDS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/award') }}">PREVIOUS AWARDS 2024</a></li>
                            <li><a class="dropdown-item" href="{{ url('/previewsevent') }}">PREVIOUS SPONSORS 2024</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="cta-buttons d-flex gap-2">
                    <a href="{{ url('/nomination') }}" class="btn-nominate">NOMINATE</a>
                </div>
            </div>
        </div>
    </nav>

<script>
        document.addEventListener("DOMContentLoaded", function() {
            const navbarCollapse = document.getElementById("navbarNav");

            // Prevent collapsing when clicking a dropdown on mobile
            navbarCollapse.addEventListener("hide.bs.collapse", function(e) {
                const openDropdown = navbarCollapse.querySelector(".dropdown-menu.show");
                if (openDropdown) e.preventDefault();
            });
        });
    </script>
