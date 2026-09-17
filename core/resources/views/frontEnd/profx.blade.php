@extends('frontEnd.layouts.profx')
<!--Carousel styles-->
<style>
    .awards-wrapper {
        max-width: 1400px;
        margin: 0 auto;
    }

    .awards-section-label {
        text-align: center;
        color: #64748b;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 2px;
        margin-bottom: 16px;
        text-transform: uppercase;
    }

    .awards-section-heading {
        text-align: center;
        font-size: 42px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 60px;
        line-height: 1.2;
    }

    .awards-section-heading span {
        background: linear-gradient(135deg, #BD8A3C 0%, #DDC686 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .modern-carousel-container {
        position: relative;
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 40px;
    }

    .modern-carousel-viewport {
        padding: 0 10px;
        flex: 1;
        overflow: hidden;
        border-radius: 16px;
    }

    .modern-carousel-track {
        padding: 13px 0;
        display: flex;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        gap: 24px;
    }

    .modern-impact-item {
        flex: 0 0 auto;
        background: #040E18;
        border-radius: 16px;
        padding: 32px 24px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        border: 2px solid transparent;
    }

    .modern-impact-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        border-color: #BD8A3C;
    }

    .modern-impact-icon-wrapper {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.07);
        border: 4px solid rgba(255, 255, 255, 0.06);
        border-radius: 50%;
        margin-bottom: 30px;
        transition: 0.3s ease-in-out;
        font-size: 30px;
        color: #fff;
    }

    .modern-impact-item:hover .modern-impact-icon-wrapper {
        transform: scale(1.1) rotate(5deg);
        /* background: linear-gradient(135deg, #BD8A3C 0%, #DDC686 100%); */
    }

    .modern-impact-icon {
        width: 50px;
        height: 50px;
        object-fit: contain;
    }

    .modern-impact-heading {
        font-size: 20px;
        font-weight: 700;
        color: #fff;
        margin-bottom: 12px;
        line-height: 1.4;
    }

    .modern-impact-text {
        font-size: 15px;
        color: #64748b;
        line-height: 1.6;
        margin: 0;
    }

    .modern-carousel-arrow {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: linear-gradient(135deg, #BD8A3C 0%, #DDC686 100%);
        border: 2px solid #DDC686;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #fff;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        flex-shrink: 0;
        z-index: 10;
    }

    .modern-carousel-arrow:hover {
        background: linear-gradient(135deg, #BD8A3C 0%, #DDC686 100%);
        border-color: #BD8A3C;
        color: white;
        transform: scale(1.1);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .modern-carousel-arrow:active {
        transform: scale(0.95);
    }

    .modern-carousel-indicators {
        display: flex;
        justify-content: center;
        gap: 12px;
        align-items: center;
    }

    .modern-indicator-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #cbd5e1;
        border: none;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0;
    }

    .modern-indicator-dot:hover {
        background: #DDC686;
        transform: scale(1.2);
    }

    .modern-indicator-dot.active {
        width: 32px;
        border-radius: 5px;
        background: linear-gradient(135deg, #BD8A3C 0%, #DDC686 100%);
    }


    @media (min-width: 1024px) {
        .modern-impact-item {
            width: calc((100% - 48px) / 3);
        }
    }

    @media (min-width: 640px) and (max-width: 1023px) {
        .modern-impact-item {
            width: calc((100% - 24px) / 2);
        }

        .awards-section-heading {
            font-size: 36px;
            margin-bottom: 48px;
        }

        .modern-carousel-arrow {
            width: 48px;
            height: 48px;
        }

        .modern-impact-item {
            padding: 28px 20px;
        }

        .modern-impact-heading {
            font-size: 18px;
        }

        .modern-impact-text {
            font-size: 14px;
        }
    }

    @media (max-width: 639px) {
        .modern-impact-item {
            width: 100%;
        }

        .awards-section-label {
            font-size: 12px;
            margin-bottom: 12px;
        }

        .awards-section-heading {
            font-size: 28px;
            margin-bottom: 36px;
        }

        .modern-carousel-container {
            gap: 12px;
        }

        .modern-carousel-arrow {
            width: 40px;
            height: 40px;
        }

        .modern-carousel-track {
            gap: 16px;
        }

        .modern-impact-item {
            padding: 24px 20px;
        }

        .modern-impact-icon-wrapper {
            width: 64px;
            height: 64px;
            margin-bottom: 20px;
        }

        .modern-impact-icon {
            width: 40px;
            height: 40px;
        }

        .modern-impact-heading {
            font-size: 17px;
            margin-bottom: 10px;
        }

        .modern-impact-text {
            font-size: 14px;
            line-height: 1.5;
        }

        .modern-carousel-indicators {
            gap: 8px;
        }

        .modern-indicator-dot {
            width: 8px;
            height: 8px;
        }

        .modern-indicator-dot.active {
            width: 24px;
        }
    }

    @media (max-width: 375px) {
        .awards-section-heading {
            font-size: 24px;
        }

        .modern-carousel-arrow {
            width: 36px;
            height: 36px;
        }

        .modern-impact-item {
            padding: 20px 16px;
        }

        .modern-impact-heading {
            font-size: 16px;
        }

        .modern-impact-text {
            font-size: 13px;
        }
    }
    
    
<!-- Media Partners right to left -->
    
 html, body {
    overflow-x: hidden!important;
}

.lr-partners-carousel,
.rl-partners-carousel {
    width: 100%;
    overflow-x: hidden!important;
    position: relative;
}

.rl-partners-carousel {
    width: 100%;
    overflow: hidden;
    position: relative;
}

.rl-partners-track {
    display: flex;
    align-items: center;
    gap: 50px;
    width: max-content;

    animation: rl-marquee 10s linear infinite;
}

.rl-partners-carousel:hover .rl-partners-track {
    animation-play-state: paused;
}

.rl-partner-logo {
    flex-shrink: 0;
}

.rl-partner-logo img {
    height: 70px;
    width: auto;
    display: block;
}

/* ✅ RIGHT → LEFT */
@keyframes rl-marquee {
    from {
        transform: translateX(-50%);
    }
    to {
        transform: translateX(0);
    }
}

<!--  Media Partners left to right -->
.lr-partners-carousel {
    width: 100%;
    overflow-x: hidden!important;
    position: relative;
}

.lr-partners-track {
    display: flex;
    align-items: center;
    gap: 50px;
    width: max-content;

    animation: lr-marquee 20s linear infinite;
}

.lr-partners-carousel:hover .lr-partners-track {
    animation-play-state: paused;
}

.lr-partner-logo {
    flex-shrink: 0;
}

.lr-partner-logo img {
    height: 70px;
    width: auto;
    display: block;
}

/* LEFT → RIGHT */
@keyframes lr-marquee {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-50%);
    }
}

</style>
@section('content')
    <!-- Video Hero Section -->
    <section id="top" class="video-hero" id="home">
        <!-- Background Video -->
        <video autoplay muted loop playsinline class="video-background">
            <source src="{{ asset('assets/keditor/profx/assets/background.mp4') }}" type="video/mp4">
            <!-- Fallback for browsers that don't support video -->
            Your browser does not support the video tag.
        </video>

        <!-- Dark Overlay -->
        <div class="video-overlay"></div>

        <!-- Hero Content -->
        <div class="hero-content">
            <h1 class="hero-title">PROFX Awards {{ Helper::awardYear() }}</h1>
            <p class="" style="font-size:25px; color: #fff;">Nominations are now open for PROFX Awards {{ Helper::awardYear() }}.</p>
            <div class="hero-buttons">
                <a href="{{ url('/nomination') }}" class="btn-hero-sponsor">Nominate Now
                  </a>
                <!--<a href="https://secure.profxawards.com/login" class="btn-hero-login">LOGIN</a>-->
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <span></span>
        </div>
    </section>

    <section class="brochure-section" id="about">
        <div class="container">
            <div class="brochure-content" data-aos="fade-down-right">
                <div class="brochure-image">
                    <div>
                        <img src="{{ asset(Helper::awardLogoAsset()) }}" alt="PROFX Awards {{ Helper::awardYear() }}">
                        
                    </div>

                </div>
                <div class="brochure-text" data-aos="fade-down-left" data-aos-delay="200">
                    <p style="font-size: 20px; color: #fff;">• Who we are •</p>
                    <h2 class="brochure-title">
                        World of Ethical &<br>
                        Transparent Financial &<br>
                        Online Trading Awards
                    </h2>
                    <ul class="brochure-features">
                        <p>PROFX Awards Dubai recognises trusted brands, technology providers, educators, influencers, and leaders shaping the financial and online trading industry.</p>
                    </ul>
                    <a href="{{ url('/nomination') }}" class="cta-button">Submit Nomination</a>
                </div>
            </div>
        </div>
    </section>

    <section class="sponsors-section">
        <div class="container">
            <p class="section-title"><span class="section-title-span">•</span>PROFX AWARDS SPONSORS <span
                    class="section-title-span">•</span></p>
            <h2 class="section-heading">Meet The Brands Powering <p
                    style="font-weight: 600;font-size: 35px;color: #d4af37;">PROFX Awards {{ Helper::awardYear() }}</p>
            </h2>

            <!--<div class="sponsor-tier container mb-3">-->
            <!--    <p class="tier-title">Title Sponsor</p>-->


            <!--    <div class="sponsor-grid">-->

            <!--        <div class="ga-image-wrappertest">-->
            <!--            <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/zara-fx-logo.jpeg') }}"  loading="lazy">-->
            <!--            <div class="ga-hover-layertest">-->
            <!--                <h3 style="font-weight:600">ZARA FX</h3>-->
            <!--                <a href="https://www.zara-fx.com/" class="ga-view-btn">View Website</a>-->

            <!--            </div>-->



            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <div class="sponsor-tier container mb-3">
                <p class="tier-title">Official Sponsor</p>
                <div class="sponsor-grid mb-5">
                    <div class="ga-image-wrappertest">
                        <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/Domino Markets.png') }}"
                            loading="lazy">
                        <div class="ga-hover-layertest">
                            <h3 style="font-weight:600">Dominion Markets</h3>
                            <a href="https://www.dominionmarkets.com/"target="_blank" class="ga-view-btn">View Website</a>

                        </div>

                    </div>
                </div>

                <div class="sponsor-tier container mb-3">
                    <p class="tier-title">Event Sponsor</p>
                    <div class="sponsor-grid">

                        <div class="ga-image-wrappertest">
                            <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/bridgingfx.png') }}"
                                loading="lazy">
                            <div class="ga-hover-layertest">
                                <h3 style="font-weight:600">Bridging Fx</h3>
                                <a href="https://www.bridgingfx.net/"target="_blank" class="ga-view-btn">View Website</a>

                            </div>



                        </div>
                        <div class="ga-image-wrappertest">
                            <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/finxcart.png') }}"
                                loading="lazy">
                            <div class="ga-hover-layertest">
                                <h3 style="font-weight:600">Finx Crad</h3>
                                <a href="https://finxcart.com/"target="_blank" class="ga-view-btn">View Website</a>

                            </div>
                        </div>

                    </div>





                    <div class="sponsor-tier container mb-3">
                        <p class="tier-title">Co-Sponsors</p>
                        <div class="sponsor-grid">

                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/award/10.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Swiset</h3>
                                    <a href="https://swiset.com/" target="_blank" class="ga-view-btn">View Website</a>
                                </div>
                            </div>


                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/award/13.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Taurex</h3>
                                    <a href="https://www.tradetaurex.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="sponsor-tier container mb-3">
                        <p class="tier-title">Featured Brands</p>
                        <div class="sponsor-grid">
                            <!--<div class="ga-image-wrappertest">-->
                            <!--    <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/award/14.png') }}"-->
                            <!--        loading="lazy">-->
                            <!--    <div class="ga-hover-layertest">-->
                            <!--        <h3 style="font-weight:600">XM</h3>-->
                            <!--        <a href="https://www.xmglobal.com/"target="_blank" class="ga-view-btn">View-->
                            <!--            Website</a>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="ga-image-wrappertest">
                                <img class="d-flex"
                                    src="{{ asset('assets/keditor/profx/assets/sponsors/9-yamarkets.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Yamarkets</h3>
                                    <a href="https://www.yamarkets.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/award/6.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">NXG Markets</h3>
                                    <a href=" https://www.nxgmarkets.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/award/7.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Puprime</h3>
                                    <a href="https://www.puprime.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/award/2.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Avora Markets</h3>
                                    <a href="https://avoramarkets.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>

                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex"
                                    src="{{ asset('assets/keditor/profx/assets/sponsors/hyrotrader.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Hyro Trader</h3>
                                    <a href="https://www.hyrotrader.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>

                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/award/8.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Salma Markets</h3>
                                    <a href="https://www.salmamarkets.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <!--<div class="ga-image-wrappertest">-->
                            <!--    <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/award/5.png') }}"  loading="lazy">-->
                            <!--    <div class="ga-hover-layertest">-->
                            <!--        <h3 style="font-weight:600">Lirunex</h3>-->
                            <!--        <a href="https://lirunex.eu/" target="_blank" class="ga-view-btn">View Website</a>                         -->
                            <!--    </div>-->
                            <!--    </div>-->
                            <div class="ga-image-wrappertest">
                                <img class="d-flex"
                                    src="{{ asset('assets/keditor/profx/assets/sponsors/leveragemarkets.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Leverage Markets</h3>
                                    <a href="https://leveragemarkets.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/pipstones.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Pipstone Capital</h3>
                                    <a href="https://pipstonecapital.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex"
                                    src="{{ asset('assets/keditor/profx/assets/sponsors/forexer.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Forexer</h3>
                                    <a href="https://www.forexer.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex"
                                    src="{{ asset('assets/keditor/profx/assets/partners/tradeultra.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Trade Ultra</h3>
                                    <a href="https://www.tradeultra.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex"
                                    src="{{ asset('assets/keditor/profx/assets/sponsors/libertymarkets.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Liberty Groups</h3>
                                    </h3>
                                    <a href="https://www.libertygroups.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <!--<div class="ga-image-wrappertest">-->
                            <!--    <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/3-cmvcapital.png') }}"  loading="lazy">-->
                            <!--    <div class="ga-hover-layertest">-->
                            <!--        <h3 style="font-weight:600">CMV Capital</h3>-->
                            <!--        <a href="https://www.cmvcapitals.com/" target="_blank" class="ga-view-btn">View Website</a>                         -->
                            <!--    </div> -->

                            <!--</div>-->
                            <!--<div class="ga-image-wrappertest">-->
                            <!--    <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/4-delta-international.png') }}"  loading="lazy">-->
                            <!--    <div class="ga-hover-layertest">-->
                            <!--        <h3 style="font-weight:600">Delta International</h3>-->
                            <!--        <a href="https://deltainstitutions.com/" target="_blank" class="ga-view-btn">View Website</a>                         -->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/award/1.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Arabic Borker</h3>
                                    <a href="https://www.arabicbroker.com/"target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>

                            </div>
                            <!--<div class="ga-image-wrappertest">-->
                            <!--    <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/6-carlton.png') }}"  loading="lazy">-->
                            <!--    <div class="ga-hover-layertest">-->
                            <!--        <h3 style="font-weight:600">Carlton Fx</h3>-->
                            <!--        <a href="https://carltonfx.com/" target="_blank" class="ga-view-btn">View Website</a>                         -->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/award/9.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Supreme Fx</h3>
                                    <a href="https://supremefxtrading.com/"target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/award/3.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Financial Markets</h3>
                                    <a href="https://financialmarketsonline.com/"target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex"
                                    src="{{ asset('assets/keditor/profx/assets/sponsors/15-fx-broker-startup.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">FX Brokers Startup</h3>
                                    <a href="https://fxbrokerstartup.com/"target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex"
                                    src="{{ asset('assets/keditor/profx/assets/sponsors/Domino Markets.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Dominion Markets</h3>
                                    <a href="https://www.dominionmarkets.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex"
                                    src="{{ asset('assets/keditor/profx/assets/sponsors/bridgingfx.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Bridging Fx</h3>
                                    <a href="https://www.bridgingfx.net/"target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex"
                                    src="{{ asset('assets/keditor/profx/assets/sponsors/hybridsolution.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Hybrid Solution</h3>
                                    <a href="https://hybridsolutions.com/"target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/setupfx.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Setup FX</h3>
                                    <a href="https://setupfx.com/" class="ga-view-btn">View Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex"
                                    src="{{ asset('assets/keditor/profx/assets/sponsors/domino Funding.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">Dominion Funding</h3>
                                    <a href="https://dominionfunding.trade/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex"
                                    src="{{ asset('assets/keditor/profx/assets/sponsors/spt_trading.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">STP TRADING</h3>
                                    <a href="https://www.stptrading.io/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/bsx.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">BSX</h3>
                                    <a href="https://www.bsxdao.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <!--<div class="ga-image-wrappertest">-->
                            <!--    <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/clt-acadamy.png') }}"  loading="lazy">-->
                            <!--    <div class="ga-hover-layertest">-->
                            <!--        <h3 style="font-weight:600">CLT ACADAMY</h3>-->
                            <!--        <a href="https://clt-academy.com/" target="_blank" class="ga-view-btn">View Website</a>                         -->
                            <!--    </div>-->
                            <!--</div>-->

                            <div class="ga-image-wrappertest">
                                <img class="d-flex"
                                    src="{{ asset('assets/keditor/profx/assets/sponsors/mymarkets.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">MYMAA Markets</h3>
                                    <a href="https://www.mymaamarkets.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>

                            </div>
                            <!--<div class="ga-image-wrappertest">-->
                            <!--    <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/AltusFX.png') }}"-->
                            <!--        loading="lazy">-->
                            <!--    <div class="ga-hover-layertest">-->
                            <!--        <h3 style="font-weight:600">Altus Fx</h3>-->
                            <!--        <a href="https://altusfx.com/" target="_blank" class="ga-view-btn">View Website</a>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/bakara.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">BAKARA</h3>
                                    <a href="https://bakinv.com/" target="_blank" class="ga-view-btn">View Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/primex.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">PRIME X</h3>
                                    <a href="https://www.primexcapital.com/en" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                            <div class="ga-image-wrappertest">
                                <img class="d-flex" src="{{ asset('assets/keditor/profx/assets/sponsors/xchief.png') }}"
                                    loading="lazy">
                                <div class="ga-hover-layertest">
                                    <h3 style="font-weight:600">XCHIEF</h3>
                                    <a href="https://www.xchief.com/" target="_blank" class="ga-view-btn">View
                                        Website</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

    <section class="partners-section">
        <div class="container">
            <p class="section-title"><span class="section-title-span">•</span> RECENT MEDIA PARTNERS <span
                    class="section-title-span">•</span></p>
            <h2 class="section-heading">
                Our Collaborative Network For <p style="font-weight: 600;font-size: 35px;color: #d4af37;">Amplified Impact
                </p>
            </h2>

            <div class="lr-partners-carousel mb-5">
                <div class="lr-partners-track">
                    <a href="https://aff.ninja/" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/aff-tweaks.png') }}"
                                alt="Media partner">
                        </div>
                    </a>
                    <a href="https://www.arabictrader.com/ar/home" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/arabic-trader.png') }}"
                                alt="Media partner">
                        </div>
                    </a>
                    <a href="https://affmaven.com/" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/be.png') }}" alt="Media partner">
                        </div>
                    </a>
                    <a href="https://www.ig.com/uk?source=dailyfx/" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/dailyfx-2.png') }}"
                                alt="Media partner">
                        </div>
                    </a>
                    <a href="https://www.financialmarkets.media/" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/financial-markets-media.png') }}"
                                alt="Media partner">
                        </div>
                    </a>
                    <a href="https://fintechnews.ae/" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/fintech-news.png') }}"
                                alt="Media partner">
                        </div>
                    </a>
                    <a href="https://investinglive.com/" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/forex-live-1.png') }}"
                                alt="Media partner">
                        </div>
                    </a>
                    <a href="https://www.fxempire.com/" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/fx-empire.png') }}"
                                alt="Media partner">
                        </div>
                    </a>
                    <a href="https://www.fxmag.com/" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/fxmag-1.png') }}"
                                alt="Media partner">
                        </div>
                    </a>
                    <a href="https://www.khaleejtimes.com/" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/khaleej-times.png') }}"
                                alt="Media partner">
                        </div>
                    </a>
                    <a href="https://www.msn.com/en-ae" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/msn.png') }}" alt="Media partner">
                        </div>
                    </a>
                    <a href="https://www.mirchi.ae/" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/radio-mirchi.png') }}"
                                alt="Media partner">
                        </div>
                    </a>
                    <a href="https://www.tradeup.com/" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/traderup.png') }}" alt="Media partner">
                        </div>
                    </a>
                    <a href="https://coinstelegram.com/" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/coinstelegram1.png') }}"
                                alt="Media partner">
                        </div>
                    </a>
                    <a href="https://cryptoken.media/" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/media.png') }}" alt="Media partner">
                        </div>
                    </a>
                    <a href="www.coingabbar.com" target="_blank">
                        <div class="lr-partner-logo">
                            <img src="{{ asset('assets/keditor/profx/assets/partners/gabber.webp') }}"
                                alt="Media partner">
                        </div>
                    </a>
                </div>

            </div>

            <div class="rl-partners-carousel">
            <div class="rl-partners-track">
                <a href="https://aff.ninja/" target="_blank" class="rl-partner-logo">
                    <img src="{{ asset('assets/keditor/profx/assets/awardsmedia/arabicbroker.png') }}" alt="">
                </a>
        
                <a href="https://www.arabictrader.com/ar/home" target="_blank" class="rl-partner-logo">
                    <img src="{{ asset('assets/keditor/profx/assets/awardsmedia/capitalinsighthub.png') }}" alt="">
                </a>
        
                <a href="https://affmaven.com/" target="_blank" class="rl-partner-logo">
                    <img src="{{ asset('assets/keditor/profx/assets/awardsmedia/coingabbar.png') }}" alt="">
                </a>
        
                <a href="https://www.ig.com/uk?source=dailyfx/" target="_blank" class="rl-partner-logo">
                    <img src="{{ asset('assets/keditor/profx/assets/awardsmedia/coinpedia.png') }}" alt="">
                </a>
        
                <a href="https://affmaven.com/" target="_blank" class="rl-partner-logo">
                    <img src="{{ asset('assets/keditor/profx/assets/awardsmedia/cryptobroker.png') }}" alt="">
                </a>
        
                <a href="https://www.ig.com/uk?source=dailyfx/" target="_blank" class="rl-partner-logo">
                    <img src="{{ asset('assets/keditor/profx/assets/awardsmedia/industrialevents.png') }}" alt="">
                </a>
                 <a href="https://affmaven.com/" target="_blank" class="rl-partner-logo">
                    <img src="{{ asset('assets/keditor/profx/assets/partners/bot.png') }}" alt="">
                </a>
        
                <a href="https://www.ig.com/uk?source=dailyfx/" target="_blank" class="rl-partner-logo">
                    <img src="{{ asset('assets/keditor/profx/assets/partners/thecoinrepublic.png') }}" alt="">
                </a>
            </div>
        </div>

        </div>
    </section>



    <section class="impact-section">
        <style>
            .impact-icon {
                width: 80px;
                height: 80px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: rgba(255, 255, 255, 0.07);
                border: 4px solid rgba(255, 255, 255, 0.06);
                border-radius: 50%;
                margin-bottom: 30px;
                transition: .3s ease-in-out;
                font-size: 30px;
                color: #fff;
            }
        </style>
        <div class="container">
            <p class="section-title"><span class="section-title-span">•</span> Recognition <span
                    class="section-title-span">•</span></p>
            <h2 class="section-heading">Impact Of <span style="color: #d4af37;">Awards</span></h2>
            <!--<div class="impact-carousel">-->
            <!--    <button class="carousel-btn prev">&#10094;</button>-->
            <!--    <div class="impact-track">-->
            <!--        <div class="impact-card">-->
            <!--            <div class="impact-icon"><img src="{{ asset('assets/keditor/profx/assets/competitive-Icon.png') }}" alt="Media partner"></div>-->
            <!--            <h3 class="impact-title">Enhanced Visibility</h3>-->
            <!--            <p class="impact-description">-->
            <!--                Winning or being nominated for an award significantly increases a broker's visibility in the market, attracting more clients and partners.-->
            <!--            </p>-->
            <!--        </div>-->
            <!--        <div class="impact-card">-->
            <!--            <div class="impact-icon"><img src="{{ asset('assets/keditor/profx/assets/competitive-Icon.png') }}" alt="Media partner"></div>-->
            <!--            <h3 class="impact-title">Competitive Advantage</h3>-->
            <!--            <p class="impact-description">-->
            <!--                Awards provide a competitive edge by differentiating the broker from competitors and showcasing their unique strengths.-->
            <!--            </p>-->
            <!--        </div>-->
            <!--        <div class="impact-card">-->
            <!--            <div class="impact-icon"><img src="{{ asset('assets/keditor/profx/assets/reputation-icon.png') }}" alt="Media partner"></div>-->
            <!--            <h3 class="impact-title">Networking Opportunities</h3>-->
            <!--            <p class="impact-description">-->
            <!--                Award ceremonies and events offer valuable networking opportunities with industry leaders, potential clients, and media.-->
            <!--            </p>-->
            <!--        </div>-->
            <!--        <div class="impact-card">-->
            <!--            <div class="impact-icon"><img src="{{ asset('assets/keditor/profx/assets/showcase-icon.png') }}" alt="Media partner"></div>-->
            <!--            <h3 class="impact-title">Promoting Your Excellence</h3>-->
            <!--            <p class="impact-description">-->
            <!--                Awards highlight excellence in various aspects of brokerage services, from customer support to technological innovation.-->
            <!--            </p>-->
            <!--        </div>-->
            <!--        <div class="impact-card">-->
            <!--            <div class="impact-icon"><img src="{{ asset('assets/keditor/profx/assets/visibilty.png') }}" alt="Media partner"></div>-->
            <!--            <h3 class="impact-title">Business Growth</h3>-->
            <!--            <p class="impact-description">-->
            <!--                Recognition attracts partnerships, clients, and investors — leading to sustainable business growth.-->
            <!--            </p>-->
            <!--        </div>-->
            <!--        <div class="impact-card">-->
            <!--            <div class="impact-icon"><img src="{{ asset('assets/keditor/profx/assets/networking-icon.png') }}" alt="Media partner"></div>-->
            <!--            <h3 class="impact-title">Industry Credibility</h3>-->
            <!--            <p class="impact-description">-->
            <!--                Awards enhance reputation and trust, positioning brokers as credible leaders in the financial industry.-->
            <!--            </p>-->
            <!--        </div>-->
            <!--        <div class="impact-card">-->
            <!--            <div class="impact-icon"><img src="{{ asset('assets/keditor/profx/assets/showcase-icon1.png') }}" alt="Media partner"></div>-->
            <!--            <h3 class="impact-title">Partnership Expansion</h3>-->
            <!--            <p class="impact-description">-->
            <!--                Recognition opens doors to new collaborations and long-term business relationships.-->
            <!--            </p>-->
            <!--        </div>-->
            <!--        <div class="impact-card">-->
            <!--            <div class="impact-icon"><img src="{{ asset('assets/keditor/profx/assets/visibilty.png') }}" alt="Media partner"></div>-->
            <!--            <h3 class="impact-title">Market Confidence</h3>-->
            <!--            <p class="impact-description">-->
            <!--                Awards inspire confidence among clients and partners, strengthening the brand’s standing in the market.-->
            <!--            </p>-->
            <!--        </div>-->
            <!--    </div>-->

            <!--    <button class="carousel-btn next">&#10095;</button>-->
            <!--</div>-->
            <!-- Navigation Dots -->
            <!--<div class="carousel-dots">-->
            <!--    <span class="dot active"></span>-->
            <!--    <span class="dot"></span>-->
            <!--</div>-->
            <div class="modern-carousel-container container container-sm-fluid">
                <button class="modern-carousel-arrow modern-carousel-arrow-prev" id="prevBtn"
                    aria-label="Previous slide">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <div class="modern-carousel-viewport">
                    <div class="modern-carousel-track" id="carouselTrack">
                        <!-- Cards will be dynamically inserted here -->
                    </div>
                </div>

                <button class="modern-carousel-arrow modern-carousel-arrow-next" id="nextBtn" aria-label="Next slide">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>

            <div class="modern-carousel-indicators" id="carouselDots">
                <!-- Dots will be dynamically inserted here -->
            </div>
        </div>
    </section>


    <div class="area-bg" id="agendarecap"
        style="background-image: url('{{ asset('assets/keditor/profx/assets/roadmap_bg.png') }}'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
        <!-- roadMap-area -->
        <section id="roadmap" class="roadmap-area pt-130 pb-130">
            <div class="container custom-container-two">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-8">
                        <div class="section-title text-center mb-60">
                            <span class="section-title-span">•</span>Our Agenda<span class="section-title-span">•</span>
                            <h2 class="title"> <span style="color: #d4af37;">PROFX Awards</span> Program Agenda </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bt-roadmap_x">
                            <div class="bt-roadmap-wrap">
                                <div class="bt-roadmap-item">
                                    <span class="roadmap-title">6:00 PM</span>
                                    <div class="roadmap-content">
                                        <span class="dot"></span>
                                        <h4 class="title">Opening Cermony</h4>
                                        <span>Anchor Speech ProFx Into & Teaser</span>
                                        <span>Trophy Launch</span>

                                    </div>
                                </div>
                                <div class="bt-roadmap-item">
                                    <span class="roadmap-title">6:15 PM</span>
                                    <div class="roadmap-content">
                                        <span class="dot"></span>
                                        <h4 class="title">Speaker Speech</h4>
                                        <span>Panel Speaker 1</span>
                                        <span>Panel Speaker 2</span>
                                        <span>Panel Speaker 3</span>
                                    </div>
                                </div>
                                <div class="bt-roadmap-item">
                                    <span class="roadmap-title">6:45 PM</span>
                                    <div class="roadmap-content">
                                        <span class="dot"></span>
                                        <h4 class="title">Hi Tea & Entertainment</h4>
                                        <span>Lunch</span>

                                    </div>
                                </div>
                                <div class="bt-roadmap-item">
                                    <span class="roadmap-title">7:00 Pm</span>
                                    <div class="roadmap-content">
                                        <span class="dot"></span>
                                        <h4 class="title">Award Distribution</h4>
                                        <span>30 Awards Distribution</span>

                                    </div>
                                </div>
                                <div class="bt-roadmap-item">
                                    <span class="roadmap-title">8:00 PM</span>
                                    <div class="roadmap-content">
                                        <span class="dot"></span>
                                        <h4 class="title">Entertainment Show</h4>

                                    </div>
                                </div>
                                <div class="bt-roadmap-item">
                                    <span class="roadmap-title">8:15 PM</span>
                                    <div class="roadmap-content">
                                        <span class="dot"></span>
                                        <h4 class="title">Speaker Speech</h4>
                                        <span>Panel Speaker 4</span>
                                        <span>Panel Speaker 5</span>
                                        <span>Panel Speaker 6</span>
                                    </div>
                                </div>
                                <div class="bt-roadmap-item">
                                    <span class="roadmap-title">8:45 PM - 10:00 PM</span>
                                    <div class="roadmap-content">
                                        <span class="dot"></span>
                                        <h4 class="title">Entertainment Show30 Awards Distribution</h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- roadMap-area-end -->
        <!-- document-area -->
        <section class="document-area mb-5 pt-60">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 order-2 order-lg-0" data-aos="fade-down-right">
                        <div class="document-img text-center wow fadeInUp" data-wow-delay=".2s">
                            <img src="{{ asset('assets/keditor/profx/assets/bannerimage.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-7 data-aos="fade-down-left"">
                        <div class="document-content mt-50 wow fadeInRight" data-wow-delay=".2s">
                            <div class="section-title mb-35">
                                <p
                                    style="text-align: left; font-weight: 600;font-size: 20px; color: #fff; text-transform: capitalize;">
                                    <span class="section-title-span">•</span>Discover Excellence<span
                                        class="section-title-span">•</span></p>
                                <h2 class="title" style="text-align: left;">Download The ProFxAwards Dubai <p
                                        style="color: #d4af37;font-weight: 600;font-size: 35px;"> {{ Helper::awardYear() }} Brochure</p>
                                </h2>
                            </div>
                            <ul class="document-list">
                                <li>Get Explosive Insights</li>
                                <li>Discover the Event's Prestige</li>
                                <li>Prepare To Participate</li>
                                <li>Our T&C for Awards</li>
                            </ul>
                            <a href="{{ asset(Helper::awardBrochureAsset()) }}" download
                                class="btn-nominate">Download Doc</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- document-area-end -->
    </div>

    <section class="venue-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Side -->
                <div class="col-md-6 venue-content">
                    <h2 class="venue-title">
                        DISCOVER AWARDS VENUE: WHERE<br>
                        MEMORABLE MOMENTS AWAIT!
                    </h2>

                    <div class="venue-details">
                        <p style="color: #d4af37;"><strong>Venue:</strong> Le Méridien, Airport Road, Dubai UAE</p>
                        <p style="color: #d4af37;"><strong>Date:</strong> {{ Helper::awardEventDate() }}</p>
                        <p style="color: #d4af37;"><strong>Time:</strong> 6:00 pm – 11:00 pm</p>
                    </div>

                    <a href="https://maps.app.goo.gl/t6kG42pzU6Fg43hD7?g_st=ic" target="_blank" class="btn-nominate">
                        View Google Map
                    </a>
                </div>

                <!-- Right Side -->
                <div class="col-md-6 google-map mt-4 mt-md-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d115476.39971248868!2d55.26473806888848!3d25.249132039620267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3e5f5d052da27f4b%3A0x1e08c07158e27b01!2sAirport%20Rd%20-%20Al%20Garhoud%20-%20Dubai!3m2!1d25.2491549!2d55.3471396!5e0!3m2!1sen!2sae!4v1761210269608!5m2!1sen!2sae"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>


    <!-- Carousel Script-->
    <script>
        const impactData = [{
                icon: 'assets/keditor/profx/assets/competitive-Icon.png',
                title: 'Enhanced Visibility',
                description: "Winning or being nominated for an award significantly increases a broker's visibility in the market, attracting more clients and partners."
            },
            {
                icon: 'assets/keditor/profx/assets/competitive-Icon.png',
                title: 'Competitive Advantage',
                description: 'Awards provide a competitive edge by differentiating the broker from competitors and showcasing their unique strengths.'
            },
            {
                icon: 'assets/keditor/profx/assets/reputation-icon.png',
                title: 'Networking Opportunities',
                description: 'Award ceremonies and events offer valuable networking opportunities with industry leaders, potential clients, and media.'
            },
            {
                icon: 'assets/keditor/profx/assets/showcase-icon.png',
                title: 'Promoting Your Excellence',
                description: 'Awards highlight excellence in various aspects of brokerage services, from customer support to technological innovation.'
            },
            {
                icon: 'assets/keditor/profx/assets/visibilty.png',
                title: 'Business Growth',
                description: 'Recognition attracts partnerships, clients, and investors � leading to sustainable business growth.'
            },
            {
                icon: 'assets/keditor/profx/assets/networking-icon.png',
                title: 'Industry Credibility',
                description: 'Awards enhance reputation and trust, positioning brokers as credible leaders in the financial industry.'
            },
            {
                icon: 'assets/keditor/profx/assets/showcase-icon1.png',
                title: 'Partnership Expansion',
                description: 'Recognition opens doors to new collaborations and long-term business relationships.'
            },
            {
                icon: 'assets/keditor/profx/assets/visibilty.png',
                title: 'Market Confidence',
                description: "Awards inspire confidence among clients and partners, strengthening the brand's standing in the market."
            }
        ];

        class InfiniteCarousel {
            constructor() {
                this.track = document.getElementById('carouselTrack');
                this.dotsContainer = document.getElementById('carouselDots');
                this.prevBtn = document.getElementById('prevBtn');
                this.nextBtn = document.getElementById('nextBtn');
                this.carouselContainer = document.querySelector('.modern-carousel-container');

                this.currentIndex = 0;
                this.itemsPerSlide = this.getItemsPerSlide();
                this.isTransitioning = false;
                this.autoPlayInterval = null;
                this.autoPlayDelay = 3000; // 3 seconds
                this.pauseAfterInteraction = 5000; // 5s pause after click/hover
                this.resetTimeout = null;

                this.init();
            }

            getItemsPerSlide() {
                const width = window.innerWidth;
                if (width < 640) return 1;
                if (width < 1024) return 2;
                return 3;
            }

            createCard(item, index) {
                return `
      <div class="modern-impact-item" data-index="${index}">
        <div class="modern-impact-icon-wrapper">
          <img src="${item.icon}" alt="${item.title}" class="modern-impact-icon">
        </div>
        <h3 class="modern-impact-heading">${item.title}</h3>
        <p class="modern-impact-text">${item.description}</p>
      </div>
    `;
            }

            init() {
                this.renderCards();
                this.renderDots();
                this.setupEventListeners();
                this.updateCarousel(false);
                this.startAutoPlay();
            }

            renderCards() {
                const clonedStart = impactData.slice(-this.itemsPerSlide);
                const clonedEnd = impactData.slice(0, this.itemsPerSlide);
                let cardsHTML = '';

                clonedStart.forEach((item, i) => (cardsHTML += this.createCard(item, -this.itemsPerSlide + i)));
                impactData.forEach((item, i) => (cardsHTML += this.createCard(item, i)));
                clonedEnd.forEach((item, i) => (cardsHTML += this.createCard(item, impactData.length + i)));

                this.track.innerHTML = cardsHTML;
                this.currentIndex = 0;
                this.track.style.transition = 'none';
                this.updateCarousel(false);
            }

            renderDots() {
                const totalSlides = Math.ceil(impactData.length / this.itemsPerSlide);
                let dotsHTML = '';
                for (let i = 0; i < totalSlides; i++) {
                    dotsHTML +=
                        `<button class="modern-indicator-dot ${i === 0 ? 'active' : ''}" data-index="${i}"></button>`;
                }
                this.dotsContainer.innerHTML = dotsHTML;
            }

            updateCarousel(animate = true) {
                if (animate) this.track.style.transition = 'transform 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                else this.track.style.transition = 'none';

                const cards = this.track.querySelectorAll('.modern-impact-item');
                if (!cards.length) return;

                const cardWidth = cards[0].offsetWidth;
                const gap = parseInt(getComputedStyle(this.track).gap) || 24;
                const offset = (this.currentIndex + this.itemsPerSlide) * (cardWidth + gap);
                this.track.style.transform = `translateX(-${offset}px)`;

                this.updateDots();
            }

            updateDots() {
                const dots = this.dotsContainer.querySelectorAll('.modern-indicator-dot');
                const totalSlides = Math.ceil(impactData.length / this.itemsPerSlide);
                const actualIndex = ((this.currentIndex % totalSlides) + totalSlides) % totalSlides;
                dots.forEach((dot, i) => dot.classList.toggle('active', i === actualIndex));
            }

            next() {
                if (this.isTransitioning) return;
                this.isTransitioning = true;
                this.currentIndex++;
                this.updateCarousel(true);

                setTimeout(() => {
                    const totalSlides = Math.ceil(impactData.length / this.itemsPerSlide);
                    if (this.currentIndex >= totalSlides) {
                        this.currentIndex = 0;
                        this.updateCarousel(false);
                    }
                    this.isTransitioning = false;
                }, 600);
            }

            prev() {
                if (this.isTransitioning) return;
                this.isTransitioning = true;
                this.currentIndex--;
                this.updateCarousel(true);

                setTimeout(() => {
                    const totalSlides = Math.ceil(impactData.length / this.itemsPerSlide);
                    if (this.currentIndex < 0) {
                        this.currentIndex = totalSlides - 1;
                        this.updateCarousel(false);
                    }
                    this.isTransitioning = false;
                }, 600);
            }

            goToSlide(index) {
                if (this.isTransitioning) return;
                this.isTransitioning = true;
                this.currentIndex = index;
                this.updateCarousel(true);

                setTimeout(() => (this.isTransitioning = false), 600);
                this.resetAutoPlay();
            }

            startAutoPlay() {
                if (!this.autoPlayInterval) {
                    this.autoPlayInterval = setInterval(() => this.next(), this.autoPlayDelay);
                }
            }

            stopAutoPlay() {
                if (this.autoPlayInterval) {
                    clearInterval(this.autoPlayInterval);
                    this.autoPlayInterval = null;
                }
            }

            resetAutoPlay() {
                this.stopAutoPlay();
                if (this.resetTimeout) clearTimeout(this.resetTimeout);
                this.resetTimeout = setTimeout(() => this.startAutoPlay(), this.pauseAfterInteraction);
            }

            setupEventListeners() {
                // Arrows
                this.prevBtn.addEventListener('click', () => {
                    this.prev();
                    this.resetAutoPlay();
                });
                this.nextBtn.addEventListener('click', () => {
                    this.next();
                    this.resetAutoPlay();
                });

                // Dots
                this.dotsContainer.addEventListener('click', (e) => {
                    if (e.target.classList.contains('modern-indicator-dot')) {
                        const index = parseInt(e.target.dataset.index);
                        this.goToSlide(index);
                    }
                });

                // Hover pause on entire carousel container
                this.carouselContainer.addEventListener('mouseenter', () => this.stopAutoPlay());
                this.carouselContainer.addEventListener('mouseleave', () => this.startAutoPlay());

                // Resize
                let resizeTimer;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(() => {
                        const newItems = this.getItemsPerSlide();
                        if (newItems !== this.itemsPerSlide) {
                            this.itemsPerSlide = newItems;
                            this.stopAutoPlay();
                            this.renderCards();
                            this.renderDots();
                            this.startAutoPlay();
                        } else this.updateCarousel(false);
                    }, 250);
                });

                // Page visibility (pause when tab inactive)
                document.addEventListener('visibilitychange', () => {
                    if (document.hidden) this.stopAutoPlay();
                    else this.startAutoPlay();
                });
            }
        }

        document.addEventListener('DOMContentLoaded', () => new InfiniteCarousel());
    </script>
    </div>




    <div class="modal fade z-index-9999" id="sponsorModal" tabindex="-1" aria-labelledby="sponsorModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header">
                    <h5 class="modal-title text-dark fw-semibold" id="sponsorModalLabel">Become a Sponsor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('contactPageSubmited') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control"
                                    placeholder="Enter first name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control"
                                    placeholder="Enter last name" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="tel" name="phone" class="form-control"
                                    placeholder="Enter phone number">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Company Name</label>
                                <input type="text" name="company" class="form-control"
                                    placeholder="Enter company name">
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
            @if (session('success'))
                var sponsorModal = new bootstrap.Modal(document.getElementById('sponsorModal'));
                sponsorModal.show();
            @endif
        });
    </script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const track = document.querySelector(".rl-partners-track");
    if (!track) return;

    // Prevent multiple clones
    if (track.classList.contains("rl-cloned")) return;
    track.classList.add("rl-cloned");

    // Clone contents
    const content = track.innerHTML;
    track.innerHTML += content;
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const track = document.querySelector(".lr-partners-track");
    if (!track) return;

    // Prevent multiple clones
    if (track.classList.contains("lr-cloned")) return;
    track.classList.add("lr-cloned");

    // Clone contents
    const content = track.innerHTML;
    track.innerHTML += content;
});
</script>


@endsection
