@extends('frontEnd.layouts.profx')

@section('content')

<!-- Hero Section -->
<div class="hero-section">
    <div class="trophies-container">
        <div class="award-text">
            <h1>Financial & Online Trading Provider Awards</h1>
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
                            Best Digital Banking Solutions in Asia 2025
                        </button>
                    </h2>
                    <div id="collapseOneLeft" class="accordion-collapse collapse show" aria-labelledby="headingOneLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Digital Banking Solutions in Asia 2025” award recognizes a digital banking provider that excels in offering innovative, user-friendly, and secure banking solutions..</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwoLeft">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoLeft" aria-expanded="false" aria-controls="collapseTwoLeft">
                          Best Financial & Online Trading Solution Provider in Asia 2025
                        </button>
                    </h2>
                    <div id="collapseTwoLeft" class="accordion-collapse collapse" aria-labelledby="headingTwoLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Financial & Online Trading Solution Provider in Asia 2025” award honors a company that excels in delivering innovative and effective financial technology solutions..</strong>
                        </div>
                        <div class="text-center p-3">
                          <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThreeLeft">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeLeft" aria-expanded="false" aria-controls="collapseThreeLeft">
                          Best Payment Solutions Provider in Asia 2025
                        </button>
                    </h2>
                    <div id="collapseThreeLeft" class="accordion-collapse collapse" aria-labelledby="headingThreeLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Payment Solutions Provider in Asia 2025” award recognizes a company that excels in offering advanced, reliable, and efficient payment solutions..</strong>
                        </div>
                        <div class="text-center p-3">
                          <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFourLeft">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourLeft" aria-expanded="false" aria-controls="collapseFourLeft">
                          Best Financial & Online Trading Partner for Financial Institution
                        </button>
                    </h2>
                    <div id="collapseFourLeft" class="accordion-collapse collapse" aria-labelledby="headingFourLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Financial & Online Trading Partner for Financial Institution” award honors a fintech company that has demonstrated exceptional collaboration with financial institutions..</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFiveLeft">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiveLeft" aria-expanded="false" aria-controls="collapseFiveLeft">
                           Best Innovative Financial & Online Trading Service Provider
                        </button>
                    </h2>
                    <div id="collapseFiveLeft" class="accordion-collapse collapse" aria-labelledby="headingFiveLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Innovative Financial & Online Trading Service Provider” award recognizes a company that has introduced groundbreaking fintech services with a significant impact on the industry..</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
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
                           Most Trusted Financial & Online Trading Provider in Asia 2025
                        </button>
                    </h2>
                    <div id="collapseOneRight" class="accordion-collapse collapse show" aria-labelledby="headingOneRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Most Trusted Financial & Online Trading Provider in Asia 2025” award honors a Financial & Online Trading company renowned for its reliability, transparency, and commitment to security..</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwoRight">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoRight" aria-expanded="false" aria-controls="collapseTwoRight">
                            Best Financial & Online Trading Brand of the Year 2025
                        </button>
                    </h2>
                    <div id="collapseTwoRight" class="accordion-collapse collapse" aria-labelledby="headingTwoRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Financial & Online Trading Brand of the Year 2025” award celebrates a fintech company that has achieved outstanding success and recognition in the industry. This award honors their exceptional brand strength, innovation, and impact in shaping the future of financial technology.e.</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThreeRight">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeRight" aria-expanded="false" aria-controls="collapseThreeRight">
                            Best Algo Trading Platform
                        </button>
                    </h2>
                    <div id="collapseThreeRight" class="accordion-collapse collapse" aria-labelledby="headingThreeRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Algo Trading Platform” award recognizes a platform that excels in providing advanced tools and features for algorithmic trading.</strong>
                        </div>
                        <div class="text-center p-3">
                          <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFourRight">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourRight" aria-expanded="false" aria-controls="collapseFourRight">
                           Best AI Powered Platform for Investor
                        </button>
                    </h2>
                    <div id="collapseFourRight" class="accordion-collapse collapse" aria-labelledby="headingFourRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best AI-Powered Platform for Investors” award honors a platform that leverages artificial intelligence to deliver advanced investment insights, strategies, and tools..</strong>
                        </div>
                        <div class="text-center p-3">
                            <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFiveRight">
                        <button class="accordion-button btn-text collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiveRight" aria-expanded="false" aria-controls="collapseFiveRight">
                            Best Finance Software Provider in Asia 2025
                        </button>
                    </h2>
                    <div id="collapseFiveRight" class="accordion-collapse collapse" aria-labelledby="headingFiveRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Finance Software Provider in Asia 2025” award recognizes a company that excels in delivering top-tier financial software solutions..</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
