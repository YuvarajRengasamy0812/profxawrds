@extends('frontEnd.layouts.profx')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="trophies-container">
        <div class="award-text">
            <h1>Gallery</h1>
        </div>
    </div>
</div>

@php
    // Fetch all gallery topics
    $HomePartnersLimit = 0; 
    $HomePartners = Helper::Topics(Helper::GeneralWebmasterSettings("home_content3_section_id"), 0, $HomePartnersLimit, 1);

    // Collect unique title names (for tabs)
    $titles = [];
    foreach ($HomePartners as $item) {
        $title_var = "title_" . @Helper::currentLanguage()->code;
        $title_var2 = "title_" . config('smartend.default_language');
        $title = trim($item->$title_var ?: $item->$title_var2 ?: 'Untitled');
        if (!in_array($title, $titles)) {
            $titles[] = $title;
        }
    }
@endphp

@if(count($HomePartners) > 0)
<!-- Tabs -->
<div class="tab-navigation">
    <div class="tab-buttons text-center mb-4">
        <button class="tab-btn active" data-title="all">All</button>
        @foreach($titles as $title)
            <button class="tab-btn" data-title="{{ Str::slug($title) }}">{{ $title }}</button>
        @endforeach
    </div>
</div>

<!-- Gallery -->
<section id="partners" class="gallery py-5" style="background-color: #fff;">
    <div class="container">
        <div class="gallery-grid"
             style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
             
            @foreach($HomePartners as $HomePartner)
                @php
                    $title_var = "title_" . @Helper::currentLanguage()->code;
                    $title_var2 = "title_" . config('smartend.default_language');
                    $title = trim($HomePartner->$title_var ?: $HomePartner->$title_var2 ?: 'Untitled');

                    $photo = $HomePartner->photo_file 
                        ? URL::to('uploads/topics/'.$HomePartner->photo_file) 
                        : asset('frontEnd/assets/images/no-image.png');

                    $dataTitle = Str::slug($title);
                @endphp

                <div class="gallery-item" data-title="{{ $dataTitle }}"
                     style="position: relative; overflow: hidden; border-radius: 12px;">
                    <img src="{{ $photo }}" alt="{{ $title }}" loading="lazy"
                         style="width: 100%; height: 250px; object-fit: cover; border-radius: 12px;">
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update active button
            tabButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const selectedTitle = btn.dataset.title;

            // Filter gallery items
            galleryItems.forEach(item => {
                const itemTitle = item.dataset.title;

                if (selectedTitle === 'all' || itemTitle === selectedTitle) {
                    item.classList.remove('hide');
                } else {
                    item.classList.add('hide');
                }
            });
        });
    });
});
</script>
@endpush

@push('styles')
<style>
/* Tabs */
.tab-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
}
.tab-btn {
    background-color: #eee;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    cursor: pointer;
    transition: 0.3s;
    font-weight: 600;
}
.tab-btn:hover {
    background-color: #ddd;
}
.tab-btn.active {
    background-color: #007bff;
    color: #fff;
}

/* Gallery */
.gallery-item {
    opacity: 1;
    transition: opacity 0.4s ease-in-out, transform 0.3s ease-in-out;
}
.gallery-item.hide {
    opacity: 0;
    transform: scale(0.95);
    pointer-events: none;
}

/* Image hover effect */
.gallery-item img {
    transition: transform 0.4s ease-in-out;
}
.gallery-item:hover img {
    transform: scale(1.05);
}
</style>
@endpush


