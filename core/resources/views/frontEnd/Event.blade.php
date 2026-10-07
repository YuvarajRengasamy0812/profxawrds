@extends('frontEnd.layouts.profx')

@section('content')

<!-- Hero Section -->
<div class="hero-section">
    <div class="trophies-container">
        <div class="award-text">
            <h1>Recent Event Sponsors</h1>
        </div>
    </div>
</div>
<div class="sponsor-tier">
    <div class="sponsor-tier container">
        <p class="tier-title">Our Recent Event Sponsors</p>

        <style>.event-sponsor-grid{display:flex;flex-wrap:wrap;justify-content:center;align-items:center;gap:30px 40px;}</style>

        @php
            $partners = \App\Models\Sponsor::where('type', 'event')->where('status', 1)
                ->orderBy('row_no')->orderBy('id')->get();
        @endphp

        <div class="sponsor-grid event-sponsor-grid">
            @foreach ($partners as $partner)
                <div class="ga-image-wrappertest">
                    <img class="d-flex" src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}" loading="lazy">
                    <div class="ga-hover-layertest">
                        <h3 style="font-weight:600">{{ $partner->name }}</h3>
                        @if($partner->link)
                            <a href="{{ $partner->link }}" class="ga-view-btn" target="_blank" rel="noopener">View Website</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
