@extends('frontEnd.layouts.profx')

@section('content')
<div class="gallery-page">
    <!-- Hero Section -->
    <div class="hero-sections">
        <div class="trophies-container">
            <div class="award-text">
                <span class="gallery-hero-kicker">PROFX Awards {{ Helper::awardYear() }}</span>
                <h1 class="mt-5">Gallery</h1>
                <p>Explore moments from PROFX Awards, industry networking, recognition, and celebration.</p>
                <div class="gallery-hero-meta">
                    <span>{{ Helper::awardEventDateTime() }}</span>
                    <span>Dubai, UAE</span>
                </div>
            </div>
            <div class="gallery-hero-visual">
                <img src="{{ asset(Helper::awardLogoAsset()) }}" alt="PROFX Awards {{ Helper::awardYear() }}">
            </div>
        </div>
    </div>

    @php
        // Fetch all gallery topics
        $HomePartnersLimit = null; // set to null or a high number if 0 causes issues
        $HomePartners = Helper::Topics(
            Helper::GeneralWebmasterSettings('home_content3_section_id'),
            0,
            $HomePartnersLimit,
            1,
        );

        // Collect unique titles by slug (avoid duplicate-slug tabs)
        $titles = [];
        $titles_by_slug = [];
        foreach ($HomePartners as $item) {
            $title_var = 'title_' . @Helper::currentLanguage()->code;
            $title_var2 = 'title_' . config('smartend.default_language');
            $title = trim($item->$title_var ?: $item->$title_var2 ?: 'Untitled');

            // create slug; if empty fallback to 'untitled'
            $slug = Str::slug($title);
            if (empty($slug)) {
                $slug = 'untitled';
            }

            if (!isset($titles_by_slug[$slug])) {
                $titles_by_slug[$slug] = $title; // store original title for label
            }
        }
    @endphp


    @if (count($HomePartners) > 0)
        <!-- Tabs -->
        <div class="tab-navigation">
            <div class="tab-buttons text-center mb-4">
                <button class="tab-btn active" data-title="all">All</button>

                @foreach ($titles_by_slug as $slug => $label)
                    <button class="tab-btn" data-title="{{ $slug }}">{{ $label }}</button>
                @endforeach
            </div>
        </div>


        <!-- Gallery -->
        <style>
            .gallery-item {
                visibility: visible;
                opacity: 1;
                transition: opacity 0.3s ease;
            }

            .gallery-item.hidden {
                visibility: hidden;
                opacity: 0;
                pointer-events: none;
            }

            /* Overlay buttons container */
    .gallery-btn {
      background-color: transparent;
      border: none;
      color: white;
      padding: 0px 10px;
      font-size: 0.9rem;    
      cursor: pointer;
    }
     .gallery-btns {
      background-color: transparent;
      border: none;
      color: #BD8A3C;
      padding: 0px 10px;
      font-size: 0.9rem;    
      cursor: pointer;
    }
        </style>
        <section id="partners" class="gallery gallery-section py-5">
            <div class="container">
                <div class="gallery-grid"
                    style="display: grid; gap: 20px;">

                    @foreach ($HomePartners as $HomePartner)
                        @php
                            $title_var = 'title_' . @Helper::currentLanguage()->code;
                            $title_var2 = 'title_' . config('smartend.default_language');
                            $title = trim($HomePartner->$title_var ?: $HomePartner->$title_var2 ?: 'Untitled');

                            $photo = $HomePartner->photo_file
                                ? URL::to('uploads/topics/' . $HomePartner->photo_file)
                                : asset('frontEnd/assets/images/no-image.png');

                            $dataTitle = Str::slug($title);
                            if (empty($dataTitle)) {
                                $dataTitle = 'untitled';
                            }
                        @endphp

                        <div class="gallery-item" data-title="{{ $dataTitle }}">
                            <img src="{{ $photo }}" alt="{{ $title }}" loading="lazy" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImage(this.src)">
                            <h3 class="text-center mt-2">{{ $title }}</h3>
                        </div>
                    @endforeach

                </div>
            </div>
              <!-- Modal -->
  <!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-fullscreen-md-down p-2">
    <div class="modal-content bg-transparent  border-0">
      <!-- Buttons above the image -->
      <div class="d-flex justify-content-end p-2 gap-2">
        <button type="button" onclick="toggleFullScreen()" class="gallery-btn" title="Full Screen">&#x26F6;</button>
         <button type="button" onclick="toggleZoom()" class="gallery-btn " id="zoomBtn" title="Zoom">
<i class="bi bi-zoom-in "></i>  </button>

  <button class="gallery-btn " 
        type="button" 
        id="shareMenuButton" 
        data-bs-toggle="dropdown" 
        aria-expanded="false">
  <i class="bi bi-share"></i>
</button>

 <div class="dropdown">
 

  <!-- The dropdown menu must be OUTSIDE the button -->
  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="shareMenuButton">
    <li>
      <a class="dropdown-item" href="#" onclick="shareTo('facebook')">
        <i class="bi bi-facebook me-2 gallery-btns"></i> Facebook
      </a>
    </li>
    <li>
      <a class="dropdown-item" href="#" onclick="shareTo('twitter')">
        <i class="bi bi-twitter-x me-2 gallery-btns"></i> Twitter
      </a>
    </li>
    <li>
      <a class="dropdown-item" href="#" onclick="shareTo('pinterest')">
        <i class="bi bi-pinterest me-2 gallery-btns"></i> Pinterest
      </a>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
      <a class="dropdown-item" href="#" onclick="downloadImage()">
        <i class="bi bi-download me-2 gallery-btns"></i> Download Image
      </a>
    </li>
  </ul>
</div>

        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-0">
        <img id="modalImage" src="" class="img-fluid w-100">
      </div>
    </div>
  </div>
</div>

        </section>
       




          <script>
  let zoomedIn = false;

  function showImage(src) {
    const img = document.getElementById('modalImage');
    img.src = src;
    img.style.transform = 'scale(1)';
    zoomedIn = false;
    // document.getElementById('zoomBtn').innerText = '🔍'; // reset icon
  }

  function toggleFullScreen() {
    const modal = document.getElementById('imageModal');
    if (!document.fullscreenElement) {
      modal.requestFullscreen().catch(err => alert(`Error enabling fullscreen: ${err.message}`));
    } else {
      document.exitFullscreen();
    }
  }

  function toggleZoom() {
    const img = document.getElementById('modalImage');
    const zoomBtn = document.getElementById('zoomBtn');
    if (!zoomedIn) {
      img.style.transform = 'scale(1.8)';
      zoomedIn = true;
    //   zoomBtn.innerText = '🔎'; // change icon to zoom-out style
    } else {
      img.style.transform = 'scale(1)';
      zoomedIn = false;
      zoomBtn.innerText = '🔍';
    }
  }

  function downloadImage() {
    const imgSrc = document.getElementById('modalImage').src;
    const a = document.createElement('a');
    a.href = imgSrc;
    a.download = 'image.jpg';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
  }

  function shareTo(platform) {
    const imgSrc = document.getElementById('modalImage').src;
    let shareUrl = '';
    const encodedURL = encodeURIComponent(imgSrc);

    switch (platform) {
      case 'facebook':
        shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodedURL}`;
        break;
      case 'twitter':
        shareUrl = `https://twitter.com/intent/tweet?url=${encodedURL}&text=Check%20this%20out!`;
        break;
      case 'pinterest':
        shareUrl = `https://pinterest.com/pin/create/button/?url=${encodedURL}&media=${encodedURL}`;
        break;
    }
    window.open(shareUrl, '_blank');
  }
</script>


        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const tabs = Array.from(document.querySelectorAll('.tab-btn'));
                const items = Array.from(document.querySelectorAll('.gallery-item'));

                function normalize(str) {
                    if (!str && str !== '') return '';
                    return String(str).toLowerCase().trim();
                }

                function showItems(selectedRaw) {
                    const selected = normalize(selectedRaw);

                    items.forEach(item => {
                        const itemTitleAttr = item.getAttribute('data-title');
                        const itemTitle = normalize(itemTitleAttr);

                        // if item's data-title missing, fallback to h3 text
                        const fallbackTitle = normalize(item.querySelector('h3')?.textContent || '');

                        const matches = (selected === 'all') ||
                            itemTitle === selected ||
                            (itemTitle && itemTitle.includes(selected)) ||
                            fallbackTitle === selected ||
                            (fallbackTitle && fallbackTitle.includes(selected));

                        if (matches) {
                            item.classList.remove('hide');
                        } else {
                            item.classList.add('hide');
                        }
                    });
                }

                tabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        // Remove active class from all tabs
                        tabs.forEach(t => t.classList.remove('active'));
                        tab.classList.add('active');

                        // prefer data-title attribute on tab; fallback to button text
                        const selectedTitle = tab.getAttribute('data-title') || tab.textContent ||
                            'all';
                        showItems(selectedTitle);
                    });
                });

                // Show all items by default
                showItems('all');

                // DEBUG: uncomment to inspect titles and slugs
                // console.log('tabs:', tabs.map(t => t.getAttribute('data-title') || t.textContent));
                // console.log('items:', items.map(i => i.getAttribute('data-title') || i.querySelector('h3')?.textContent));
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const tabs = document.querySelectorAll('.tab-btn');
                const items = document.querySelectorAll('.gallery-item');

                function showItems(selected) {
                    items.forEach(item => {
                        const match = selected === 'all' || item.dataset.title === selected;
                        item.style.display = match ? 'block' : 'none';
                    });
                }

                tabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        tabs.forEach(t => t.classList.remove('active'));
                        tab.classList.add('active');
                        const selected = tab.dataset.title;
                        showItems(selected);
                    });
                });

                // show all by default
                showItems('all');
            });
        </script>
    @endif
</div>
@endsection

@push('scripts')
@endpush


@push('styles')
    <style>
        .tab-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .tab-btn {
            background: #eee;
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .tab-btn.active {
            background: #007bff;
            color: #fff;
        }

        .tab-btn:hover {
            background: #ddd;
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .gallery-item img:hover {
            transform: scale(1.03);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .gallery-item h3 {
            font-size: 1rem;
            margin-top: 10px;
            font-weight: 600;
        }

        .gallery-item.hide {
            display: none !important;
        }

        .gallery-item {
            transition: all 0.3s ease;
        }
    </style>
@endpush
