@extends('frontEnd.layouts.profx')

@section('content')
@php
    $awardEventDateTime = Helper::awardEventDateTime();
@endphp
<div class="gallery-page">
    <!-- Hero Section -->
    <div class="hero-sections">
        <div class="trophies-container">
            <div class="award-text">
                <span class="gallery-hero-kicker">PROFX Awards {{ Helper::awardYear() }}</span>
                <h1 class="mt-5">Gallery</h1>
                <p>Explore moments from PROFX Awards, industry networking, recognition, and celebration.</p>
                <div class="gallery-hero-meta">
                    <span>{{ $awardEventDateTime }}</span>
                    <span>Dubai, UAE</span>
                </div>
            </div>
            <div class="gallery-hero-visual">
                <img src="{{ asset(Helper::awardLogoAsset()) }}" alt="PROFX Awards {{ Helper::awardYear() }}">
            </div>
        </div>
    </div>

    @php
        $gallerySectionId = 23;
        $title_var = 'title_' . (@Helper::currentLanguage()->code ?: config('smartend.default_language'));
        $title_var2 = 'title_' . config('smartend.default_language');

        $GalleryCategories = \App\Models\Section::where('webmaster_id', $gallerySectionId)
            ->where('status', 1)
            ->orderby('father_id', 'asc')
            ->orderby('row_no', 'asc')
            ->get();

        $HomePartners = \App\Models\Topic::where('webmaster_id', $gallerySectionId)
            ->where('status', 1)
            ->where(function ($query) {
                $query->whereNull('expire_date')
                    ->orWhere('expire_date', '>=', date('Y-m-d'));
            })
            ->with(['categories', 'photos'])
            ->orderby('date', config('smartend.frontend_topics_order'))
            ->orderby('id', config('smartend.frontend_topics_order'))
            ->get();

        $categoryIds = $GalleryCategories->pluck('id')->map(function ($id) {
            return (int) $id;
        })->all();

        $getLocalizedTitle = function ($item) use ($title_var, $title_var2) {
            return trim($item->$title_var ?: $item->$title_var2 ?: 'Untitled');
        };
    @endphp


    @if (count($HomePartners) > 0)
        <!-- Tabs -->
        <div class="tab-navigation">
            <div class="tab-buttons text-center mb-4">
                <button class="tab-btn active" data-category="all">All</button>

                @foreach ($GalleryCategories as $GalleryCategory)
                    <button class="tab-btn" data-category="cat-{{ $GalleryCategory->id }}">
                        {{ $getLocalizedTitle($GalleryCategory) }}
                    </button>
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

            .gallery-page #partners .gallery-grid {
                display: grid !important;
                grid-template-columns: repeat(auto-fill, minmax(260px, 340px)) !important;
                justify-content: center !important;
                align-items: start !important;
                gap: 24px !important;
            }

            .gallery-page #partners .gallery-item {
                width: 100% !important;
                max-width: 340px !important;
                transition: all 0.3s ease;
            }

            .gallery-page #partners .gallery-item img {
                width: 100% !important;
                height: 220px !important;
                object-fit: contain !important;
                background: #050c14;
                border-radius: 0 !important;
                transition: transform 0.3s ease;
            }

            .gallery-page #partners .gallery-item img:hover {
                transform: scale(1.03);
            }

            .gallery-page #partners .gallery-item.hide {
                display: none !important;
            }
        </style>
        <section id="partners" class="gallery gallery-section py-5">
            <div class="container">
                <div class="gallery-grid"
                    style="display: grid; gap: 20px;">

                    @foreach ($HomePartners as $HomePartner)
                        @php
                            $title = $getLocalizedTitle($HomePartner);

                            $topicCategoryIds = $HomePartner->categories->pluck('section_id')->map(function ($id) {
                                return (int) $id;
                            })->all();

                            if ((int) $HomePartner->section_id > 0) {
                                $topicCategoryIds[] = (int) $HomePartner->section_id;
                            }

                            $topicCategoryIds = array_values(array_unique(array_intersect($topicCategoryIds, $categoryIds)));
                            $dataCategories = implode(' ', array_map(function ($id) {
                                return 'cat-' . $id;
                            }, $topicCategoryIds));

                            $displayImages = $HomePartner->photos->filter(function ($photo) {
                                return $photo->file != '';
                            })->map(function ($photo) use ($title) {
                                return [
                                    'url' => URL::to('uploads/topics/' . $photo->file),
                                    'title' => trim($photo->title ?: $title),
                                ];
                            });

                            if ($displayImages->isEmpty()) {
                                $displayImages = collect([
                                    [
                                        'url' => $HomePartner->photo_file
                                            ? URL::to('uploads/topics/' . $HomePartner->photo_file)
                                            : asset('frontEnd/assets/images/no-image.png'),
                                        'title' => $title,
                                    ],
                                ]);
                            }
                        @endphp

                        @foreach ($displayImages as $displayImage)
                            <div class="gallery-item" data-categories="{{ $dataCategories }}">
                                <img src="{{ $displayImage['url'] }}" alt="{{ $displayImage['title'] }}" loading="lazy" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImage(this.src)">
                            </div>
                        @endforeach
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

                function showItems(selected) {
                    items.forEach(item => {
                        const categories = (item.dataset.categories || '').split(' ').filter(Boolean);
                        const match = selected === 'all' || categories.includes(selected);
                        item.classList.toggle('hide', !match);
                    });
                }

                tabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        tabs.forEach(t => t.classList.remove('active'));
                        tab.classList.add('active');
                        const selected = tab.dataset.category || 'all';
                        showItems(selected);
                    });
                });

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

        .gallery-page #partners .gallery-item img {
            width: 100% !important;
            height: 220px !important;
            object-fit: contain !important;
            background: #050c14;
            border-radius: 0 !important;
            transition: transform 0.3s ease;
        }

        .gallery-page #partners .gallery-item img:hover {
            transform: scale(1.03);
        }

        .gallery-page #partners .gallery-grid {
            display: grid !important;
            grid-template-columns: repeat(auto-fill, minmax(260px, 340px)) !important;
            justify-content: center !important;
            align-items: start !important;
            gap: 24px !important;
        }

        .gallery-page #partners .gallery-item.hide {
            display: none !important;
        }

        .gallery-page #partners .gallery-item {
            width: 100% !important;
            max-width: 340px !important;
            transition: all 0.3s ease;
        }
    </style>
@endpush
