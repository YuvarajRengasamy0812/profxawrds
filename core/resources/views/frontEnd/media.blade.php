@extends('frontEnd.layouts.profx')

@section('content')

<!-- Hero Section -->
<div class="hero-section">
    <div class="trophies-container">
        <div class="award-text">
            <h1>Media Sponsors</h1>
        </div>
    </div>
</div>

<div class="sponsor-tier container">
    <p class="tier-title">Our Recent Media Sponsors</p>

    @php
        $partners = [
            ['name' => 'AFF Tweaks', 'url' => 'https://aff.ninja/', 'img' => 'aff-tweaks.png'],
            ['name' => 'Arabic Trader', 'url' => 'https://www.arabictrader.com/ar/home', 'img' => 'arabic-trader.png'],
            ['name' => 'Blogging Eclipse', 'url' => 'https://affmaven.com/', 'img' => 'be.png'],
            ['name' => 'Daily FX', 'url' => 'https://www.ig.com/uk?source=dailyfx/', 'img' => 'dailyfx-2.png'],
            ['name' => 'Financial Markets', 'url' => 'https://www.financialmarkets.media/', 'img' => 'financial-markets-media.png'],
            ['name' => 'Fintech News', 'url' => 'https://fintechnews.ae/', 'img' => 'fintech-news.png'],
             ['name' => 'CryptoKen Media', 'url' => 'https://cryptoken.media/', 'img' => 'media.png'],
            ['name' => 'Forex Live', 'url' => 'https://investinglive.com/', 'img' => 'forex-live-1.png'],
            ['name' => 'FX Empire', 'url' => 'https://www.fxempire.com/', 'img' => 'fx-empire.png'],
             ['name' => 'CoinsTelegram', 'url' => 'https://coinstelegram.com/', 'img' => 'coinstelegram1.png'],
            ['name' => 'FXMag', 'url' => 'https://www.fxmag.com/', 'img' => 'fxmag-1.png'],
            ['name' => 'Khaleej Times', 'url' => 'https://www.khaleejtimes.com/', 'img' => 'khaleej-times.png'],
            ['name' => 'MSN', 'url' => 'https://www.msn.com/en-ae', 'img' => 'msn.png'],
            ['name' => 'Radio Mirchi', 'url' => 'https://www.mirchi.ae/', 'img' => 'radio-mirchi.png'],
            ['name' => 'TradeUp', 'url' => 'https://www.tradeup.com/', 'img' => 'traderup.png'],
            ['name' => 'Gabbar', 'url' => 'https://www.coingabbar.com/', 'img' => 'gabber.png'],
            ['name' => 'Arabic Broker', 'url' => 'https://www.arabicbroker.com/', 'img' => 'arabic.png'],
            ['name' => 'CryptoKen Media', 'url' => 'https://cryptoken.media/', 'img' => 'block.png'],
            ['name' => 'CoinsCapture', 'url' => 'https://coinscapture.com/', 'img' => 'coins.png'],
            ['name' => 'Gabbar', 'url' => 'https://www.industryevents.com/', 'img' => 'industry.png'],
            ['name' => 'Trading Beasts', 'url' => 'https://tradingbeasts.com/', 'img' => 'trading-beast.png'],
            ['name' => 'U Today', 'url' => 'https://u.today/', 'img' => 'u-today-logo.png'],
            ['name' => 'U Today', 'url' => 'https://capitalinsighthub.com/profx-awards-dubai-2025-premier-forex-and-fintech-recognition-night/', 'img' => 'capital-insight.png'],
            ];
    @endphp

   <div class="sponsor-grid">
    @foreach ($partners as $partner)
        <div class="ga-image-wrappertest">
            <a href="{{ $partner['url'] }}" target="_blank">
                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/partners/' . $partner['img']) }}" loading="lazy" alt="{{ $partner['name'] }}">
            </a>
        </div>
    @endforeach
</div>

</div>

@endsection

@push('styles')
<style>
.sponsor-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 images per row */
    gap: 20px;
    margin: 30px 0;
    justify-items: center;
}

.ga-image-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    width: 100%;
    max-width: 180px;
}

.ga-image-wrapper img {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease;
}

.ga-image-wrapper:hover img {
    transform: scale(1.05);
}

.ga-hover-layer {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    text-align: center;
}

.ga-image-wrapper:hover .ga-hover-layer {
    opacity: 1;
}

.ga-view-btn {
    background: #fff;
    color: #000;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    margin-top: 10px;
    font-weight: 600;
}

.ga-view-btn:hover {
    background: #f0f0f0;
}
</style>
@endpush
