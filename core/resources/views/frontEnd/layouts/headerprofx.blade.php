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
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-12 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="venue-info">
                        <strong>Venue:</strong> Le Meridian, Airport Road, Dubai UAE
                        <span class="venue-date"><strong>Date & Time:</strong> 19th December 2025, 6:00PM - 11:00PM</span>
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
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <div class="logo-section">

 <a  href="{{ url('/') }}" >
                    <img src=" {{ asset('assets/keditor/profx/assets/Awards.png') }}" alt="PROPX Awards Logo">
                    </a>                    
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
                    <!--  <li class="nav-item">-->
                    <!--    <a class="nav-link" href="{{ url('/') }}#agenda">AGENDA</a>-->
                    <!--</li>-->
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
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" href="{{ url('/award') }}">AWARDS</a>-->
                    <!--</li>-->
                </ul>

                <!-- CTA Buttons -->
                <div class="cta-buttons d-flex gap-2">
                    <a href="{{ url('/winner') }}" class="btn-nominate">WINNERS</a>
                    <!--<a href="#sponsor" class="btn-sponsor" data-bs-toggle="modal"-->
                    <!--    data-bs-target="#sponsorModal25">SPONSOR 2025</a>-->
                    <!--<a href="https://secure.profxawards.com/login" class="btn-login">LOGIN</a>-->
                </div>
                <!--  <div class="cta-buttons d-flex gap-2">-->
                <!--    <a href="{{ url('/nomination') }}" class="btn-nominate">NOMINATE</a>-->
                <!--    <a href="#sponsor" class="btn-sponsor" data-bs-toggle="modal"-->
                <!--        data-bs-target="#sponsorModal25">SPONSOR</a>-->
                    <!--<a href="https://secure.profxawards.com/login" class="btn-login">LOGIN</a>-->
                <!--</div>-->


            </div>
        </div>
    </nav>

    <!-- Include Bootstrap CSS and JS -->


<!-- Your Existing Top Bar & Navigation -->
<!-- (You can keep your same top bar and nav as it is) -->

<!-- Replace only the SPONSOR button to trigger the Bootstrap modal -->


<!-- Bootstrap Sponsor Modal -->


<div class="modal fade z-index-9999" id="sponsorModal25" tabindex="-1" aria-labelledby="sponsorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header">
        <h5 class="modal-title text-dark fw-semibold" id="sponsorModalLabel">Become a Sponsor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
  <!--       @if(session('success'))-->
  <!--  <div class="alert alert-success alert-dismissible fade show text-center" role="alert">-->
  <!--    {{ session('success') }}-->
  <!--    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
  <!--  </div>-->
  <!--@endif-->
      <form action="{{ route('contactPageSubmited') }}" method="POST">
  @csrf
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">First Name</label>
      <input type="text" name="first_name" class="form-control" placeholder="Enter first name" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Last Name</label>
      <input type="text" name="last_name" class="form-control" placeholder="Enter last name" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Enter email" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Phone</label>
      <input type="tel" name="phone" class="form-control" placeholder="Enter phone number">
    </div>

    <div class="col-md-6">
      <label class="form-label">Company Name</label>
      <input type="text" name="company" class="form-control" placeholder="Enter company name">
    </div>

    <div class="col-md-6">
      <label class="form-label">Country</label>
      <select name="country" class="form-select" required>
        <option value="">Select Country</option>
        <option>United States</option>
        <option>United Kingdom</option>
        <option>India</option>
        <option>United Arab Emirates</option>
        <option>Canada</option>
        <option>Australia</option>
        <option>Germany</option>
        <option>France</option>
        <option>Japan</option>
        <option>China</option>
        <option>Brazil</option>
        <option>South Africa</option>
        <option>Italy</option>
        <option>Spain</option>
        <option>Mexico</option>
        <option>Singapore</option>
      </select>
    </div>
  </div>

  <div class="text-center mt-4">
    <button type="submit" class="btn btn-primary px-5 py-2">Submit</button>
  </div>
</form>

      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Check if session has sponsor_success
    @if(session('sponsor_success'))
        var sponsorSuccess = true;
    @else
        var sponsorSuccess = false;
    @endif

    if(sponsorSuccess){
        var sponsorModalEl = document.getElementById('sponsorModal25');
        if(sponsorModalEl){
            var sponsorModal = new bootstrap.Modal(sponsorModalEl);
            sponsorModal.show();

            // Auto close after 3 seconds
            setTimeout(function() {
                sponsorModal.hide();
            }, 3000);
        }
    }
});
</script>

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
