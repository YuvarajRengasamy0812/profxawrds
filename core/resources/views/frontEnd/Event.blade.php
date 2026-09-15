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

    @php
        $partners = [
            ['name' => 'Briding Fx', 'url' => 'https://www.bridgingfx.net/', 'img' => 'bridging-white.png'],
            ['name' => 'GGCC', 'url' => 'https://www.ggccfx.com/', 'img' => 'ggcc-white.png'],
            ['name' => 'Profit Fx', 'url' => 'https://www.profitfxmarkets.com/', 'img' => 'profit-white.png'],
            ['name' => 'ZARA FX', 'url' => 'https://www.zara-fx.com/', 'img' => 'zara-fx-logo.jpeg'],
            ['name' => 'JKV', 'url' => 'https://jkvglobal.com/', 'img' => 'jkv.png'],
          
         
        ];
    @endphp

    <div class="sponsor-grid">
        @foreach ($partners as $partner)
            <div class="ga-image-wrappertest">
                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/Event/' . $partner['img']) }}" loading="lazy">
                <div class="ga-hover-layertest">
                    <h3 style="font-weight:600">{{ $partner['name'] }}</h3>
                    <a href="{{ $partner['url'] }}" class="ga-view-btn" target="_blank">View Website</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
    </div>
@endsection


