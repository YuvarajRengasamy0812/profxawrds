<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFX Awards 2025 - Global Financial & Online Trading Awards</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
        <link rel="stylesheet" href="resources/css/styles.css">
             <link rel="stylesheet" type="text/css" href="{{ asset('assets/keditor/profx/css/styles.css') }}"/>
                          <link rel="stylesheet" type="text/css" href="{{ asset('assets/keditor/profx/css/style.css') }}"/>
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/keditor/css/tested.css') }}"/>


<link rel="stylesheet" type="text/css" href="{{ asset('assets/keditor/profx/js/script.js') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/keditor/profx/css/bootstrap.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/keditor/profx/css/animate.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/keditor/profx/css/fontawesome-all.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/keditor/profx/css/mCustomScrollbar.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/keditor/profx/css/odometer.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/keditor/profx/css/slick.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/keditor/profx/css/default.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/keditor/profx/css/styles.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/keditor/profx/css/responsive.css') }}"/>
          
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

      
  
</head>
<body>
<div id="loader">
  <div class="loader"></div>
  <div class="progress-container mt-3">
    <div class="progress-bar" id="progressBar"></div>
  </div>
  <div class="loading-text" id="loadingText">Loading...</div>
</div>
@include('frontEnd.layouts.headerprofx')

@include('frontEnd.layouts.sidebarprofx')



   <!-- ======= Main contents ======= -->
<main id="main" class="{{ (Helper::GeneralSiteSettings("style_header"))?"fixed-top-margin":"" }}">
    @yield('content')
</main>
<!-- ======= Footer ======= -->
 
@include('frontEnd.layouts.Footerprofx')





    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
document.addEventListener("DOMContentLoaded", function() {
    const loader = document.getElementById('loader');
    const progressBar = document.getElementById('progressBar');
    const loadingText = document.getElementById('loadingText');
    const content = document.getElementById('content');

    let progress = 0;
    const interval = setInterval(() => {
        progress += 2;
        progressBar.style.width = progress + '%';
        loadingText.textContent = 'Loading... ' + progress + '%';

        if (progress >= 100) {
            clearInterval(interval);

            // small delay for smoothness
            setTimeout(() => {
                loader.style.opacity = '0';
                loader.style.transition = 'opacity 0.5s ease';
                
                setTimeout(() => {
                    loader.style.display = 'none';
                    content.style.display = 'block';
                }, 500);
            }, 200);
        }
    }, 50);
});
</script>
    
    <!-- Custom Scripts -->
    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Close mobile menu when clicking a link
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 992) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                        toggle: false
                    });
                    bsCollapse.hide();
                }
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.main-header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Ensure video plays on all devices
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.querySelector('.video-background');
            video.play().catch(error => {
                console.log('Video autoplay was prevented:', error);
            });
        });
    </script>

    
    <!-- Custom Scripts -->
    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Close mobile menu when clicking a link
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 992) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                        toggle: false
                    });
                    bsCollapse.hide();
                }
            });
        });

        // Show/hide scroll to top button
        const scrollTopBtn = document.querySelector('.scroll-top');
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollTopBtn.style.opacity = '1';
            } else {
                scrollTopBtn.style.opacity = '0.7';
            }
        });
    </script>

    <script>
const track = document.querySelector('.impact-track');
const prevBtn = document.querySelector('.carousel-btn.prev');
const nextBtn = document.querySelector('.carousel-btn.next');
const dots = document.querySelectorAll('.dot');

let index = 0;
const totalSlides = 2; // 8 cards / 4 visible per slide

function updateCarousel() {
    track.style.transform = `translateX(-${index * 100}%)`;
    dots.forEach((dot, i) => dot.classList.toggle('active', i === index));
}

nextBtn.addEventListener('click', () => {
    index = (index + 1) % totalSlides;
    updateCarousel();
});

prevBtn.addEventListener('click', () => {
    index = (index - 1 + totalSlides) % totalSlides;
    updateCarousel();
});

dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
        index = i;
        updateCarousel();
    });
});
</script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration: 1000, // animation duration (ms)
            once: true,     // whether animation should happen only once
        });
    </script>
       <script src="{{ asset('assets/keditor/profx/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/keditor/profx/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/keditor/profx/js/jquery.odometer.min.js') }}"></script>
        <script src="{{ asset('assets/keditor/profx/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/keditor/profx/js/jquery.knob.min.js') }}"></script>
        <script src="{{ asset('assets/keditor/profx/js/jquery-countdowngampang.min.js') }}"></script>
        <script src="{{ asset('assets/keditor/profx/js/jquery.ba-throttle-debounce.min.js') }}"></script>
        <script src="{{ asset('assets/keditor/profx/js/jquery.mCustomScrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/keditor/profx/js/jarallax.min.js') }}"></script>
        <script src="{{ asset('assets/keditor/profx/js/jquery.appear.js') }}"></script>
        <script src="{{ asset('assets/keditor/profx/js/jquery.easing.js') }} "></script>
        <script src="{{ asset('assets/keditor/profx/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/keditor/profx/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/keditor/profx/js/main.js') }}"></script>
</body>
</html>
