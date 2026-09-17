@extends('frontEnd.layouts.profx')

@section('content')

<!-- Hero Section -->
<div class="hero-section">
    <div class="trophies-container">
        <div class="award-text">
            <h1>Financial Influencer Awards</h1>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center g-5 mb-5">
        <!-- Left Column -->
        <div class="col-lg-5">
            <div class="accordion" id="accordionLeft">
                <!-- 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOneLeft">
                        <button class="accordion-button btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneLeft" aria-expanded="true" aria-controls="collapseOneLeft">
                            Best Financial Educator Influencer in Asia {{ Helper::awardYear() }}
                        </button>
                    </h2>
                    <div id="collapseOneLeft" class="accordion-collapse collapse show" aria-labelledby="headingOneLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Financial Educator Influencer in Asia {{ Helper::awardYear() }}” award honors an individual who has made a significant impact through their financial education content and influence..</strong>
                        </div>
                        <div class="text-center p-3">
                            <a href="{{ url('/nomination') }}" class="btn btn-primary">NOMINATE</a>
                        </div>
                    </div>
                </div>

                <!-- 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwoLeft">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoLeft" aria-expanded="false" aria-controls="collapseTwoLeft">
                           Most Influential Trading Influencer in Asia {{ Helper::awardYear() }}
                        </button>
                    </h2>
                    <div id="collapseTwoLeft" class="accordion-collapse collapse" aria-labelledby="headingTwoLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Most Influential Trading Influencer in Asia {{ Helper::awardYear() }}” award recognizes an individual who has significantly impacted the trading community through their insights, expertise, and influence..</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/nomination') }}" class="btn btn-primary">NOMINATE</a>
                        </div>
                    </div>
                </div>

                <!-- 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThreeLeft">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeLeft" aria-expanded="false" aria-controls="collapseThreeLeft">
                          Best Financial & Online Trading Content Creator in Asia {{ Helper::awardYear() }}
                        </button>
                    </h2>
                    <div id="collapseThreeLeft" class="accordion-collapse collapse" aria-labelledby="headingThreeLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Financial & Online Trading Content Creator in Asia {{ Helper::awardYear() }}” award honors an individual or organization that excels in producing high-quality, engaging, and informative Financial & Online Trading content.</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/nomination') }}" class="btn btn-primary">NOMINATE</a>
                        </div>
                    </div>
                </div>

                <!-- 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFourLeft">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourLeft" aria-expanded="false" aria-controls="collapseFourLeft">
                         Best Crypto Influencer in Asia {{ Helper::awardYear() }}
                        </button>
                    </h2>
                    <div id="collapseFourLeft" class="accordion-collapse collapse" aria-labelledby="headingFourLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Crypto Influencer in Asia {{ Helper::awardYear() }}” award recognizes an individual who has had a profound impact on the cryptocurrency space through their insights, expertise, and influence..</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/nomination') }}" class="btn btn-primary">NOMINATE</a>
                        </div>
                    </div>
                </div>

                <!-- 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFiveLeft">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiveLeft" aria-expanded="false" aria-controls="collapseFiveLeft">
                           Best Personal Finance Influencer in Asia {{ Helper::awardYear() }}
                        </button>
                    </h2>
                    <div id="collapseFiveLeft" class="accordion-collapse collapse" aria-labelledby="headingFiveLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Personal Finance Influencer in Asia {{ Helper::awardYear() }}” award honors an individual who has made a significant impact on personal finance through their content, advice, and influence..</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/nomination') }}" class="btn btn-primary">NOMINATE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-5">
            <div class="accordion" id="accordionRight">
                <!-- 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOneRight">
                        <button class="accordion-button btn-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneRight" aria-expanded="true" aria-controls="collapseOneRight">
                           Most Trusted Financial Influencer in Asia {{ Helper::awardYear() }}
                        </button>
                    </h2>
                    <div id="collapseOneRight" class="accordion-collapse collapse show" aria-labelledby="headingOneRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Most Trusted Financial Influencer in Asia {{ Helper::awardYear() }}” award recognizes an individual who has earned widespread trust and respect in the financial community through their reliable, accurate, and insightful content.s.</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/nomination') }}" class="btn btn-primary">NOMINATE</a>
                        </div>
                    </div>
                </div>

                <!-- 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwoRight">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoRight" aria-expanded="false" aria-controls="collapseTwoRight">
                           Best Social Media Financial Educator {{ Helper::awardYear() }}
                        </button>
                    </h2>
                    <div id="collapseTwoRight" class="accordion-collapse collapse" aria-labelledby="headingTwoRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Social Media Financial Educator {{ Helper::awardYear() }}” award honors an individual or organization that excels in using social media platforms to deliver impactful financial education..</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/nomination') }}" class="btn btn-primary">NOMINATE</a>
                        </div>
                    </div>
                </div>

                <!-- 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThreeRight">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeRight" aria-expanded="false" aria-controls="collapseThreeRight">
                           Best Emerging Financial Influencer in Asia {{ Helper::awardYear() }}
                        </button>
                    </h2>
                    <div id="collapseThreeRight" class="accordion-collapse collapse" aria-labelledby="headingThreeRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Emerging Financial Influencer in Asia {{ Helper::awardYear() }}” award recognizes a rising star in the financial industry who has quickly made a notable impact through their innovative content and influence..</strong>
                        </div>
                        <div class="text-center p-3">
                          <a href="{{ url('/nomination') }}" class="btn btn-primary">NOMINATE</a>
                        </div>
                    </div>
                </div>

                <!-- 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFourRight">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourRight" aria-expanded="false" aria-controls="collapseFourRight">
                           Best Financial Podcast Host {{ Helper::awardYear() }}
                        </button>
                    </h2>
                    <div id="collapseFourRight" class="accordion-collapse collapse" aria-labelledby="headingFourRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Financial Podcast Host {{ Helper::awardYear() }}” award honors an individual who has excelled in delivering engaging, informative, and impactful financial podcasts..</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/nomination') }}" class="btn btn-primary">NOMINATE</a>
                        </div>
                    </div>
                </div>

                <!-- 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFiveRight">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiveRight" aria-expanded="false" aria-controls="collapseFiveRight">
                           Best Stock Market Influencer in Asia {{ Helper::awardYear() }}
                        </button>
                    </h2>
                    <div id="collapseFiveRight" class="accordion-collapse collapse" aria-labelledby="headingFiveRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Stock Market Influencer in Asia {{ Helper::awardYear() }}” award recognizes an individual who has made a significant impact on the stock market community through their insights, analysis, and influence..</strong>
                        </div>
                        <div class="text-center p-3">
                            <a href="{{ url('/nomination') }}" class="btn btn-primary">NOMINATE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
