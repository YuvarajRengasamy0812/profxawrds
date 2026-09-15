@extends('frontEnd.layouts.profx')

@section('content')

<!-- Hero Section -->
<div class="hero-section">
    <div class="trophies-container">
        <div class="award-text">
            <h1>Financial Entrepreneur Awards</h1>
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
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneLeft" aria-expanded="true" aria-controls="collapseOneLeft">
                            Best Financial Innovator in Asia 2025
                        </button>
                    </h2>
                    <div id="collapseOneLeft" class="accordion-collapse collapse show" aria-labelledby="headingOneLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Financial Innovator in Asia 2025” award recognizes the organization that has demonstrated exceptional innovation and leadership in the financial sector across Asia.</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwoLeft">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoLeft" aria-expanded="false" aria-controls="collapseTwoLeft">
                            Emerging Financial Entrepreneur in Asia 2025
                        </button>
                    </h2>
                    <div id="collapseTwoLeft" class="accordion-collapse collapse" aria-labelledby="headingTwoLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Emerging Financial Entrepreneur in Asia 2025” award celebrates visionary individuals redefining the financial landscape across Asia.</strong>
                        </div>
                        <div class="text-center p-3">
                            <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThreeLeft">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeLeft" aria-expanded="false" aria-controls="collapseThreeLeft">
                            Most Influential Financial & Online Trading Leader 2025
                        </button>
                    </h2>
                    <div id="collapseThreeLeft" class="accordion-collapse collapse" aria-labelledby="headingThreeLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Most Influential Financial & Online Trading Leader 2025” award recognizes a visionary leader who has made significant contributions to fintech innovation and market transformation.</strong>
                        </div>
                        <div class="text-center p-3">
                          <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFourLeft">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourLeft" aria-expanded="false" aria-controls="collapseFourLeft">
                            Woman of the Year in Financial Services 2025
                        </button>
                    </h2>
                    <div id="collapseFourLeft" class="accordion-collapse collapse" aria-labelledby="headingFourLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Woman of the Year in Financial Services 2025” award honors an exceptional female leader whose innovation and leadership have significantly advanced the industry.</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFiveLeft">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiveLeft" aria-expanded="false" aria-controls="collapseFiveLeft">
                            Best Wealth Management Entrepreneur 2025
                        </button>
                    </h2>
                    <div id="collapseFiveLeft" class="accordion-collapse collapse" aria-labelledby="headingFiveLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Wealth Management Entrepreneur 2025” award recognizes a leader with exceptional success and innovation in wealth management.</strong>
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
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneRight" aria-expanded="true" aria-controls="collapseOneRight">
                            Best Financial Mentor 2025
                        </button>
                    </h2>
                    <div id="collapseOneRight" class="accordion-collapse collapse show" aria-labelledby="headingOneRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Financial Mentor 2025” award honors an individual providing exceptional guidance and support to emerging financial professionals.</strong>
                        </div>
                        <div class="text-center p-3">
                            <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwoRight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoRight" aria-expanded="false" aria-controls="collapseTwoRight">
                            Most Impactful Financial Entrepreneur 2025
                        </button>
                    </h2>
                    <div id="collapseTwoRight" class="accordion-collapse collapse" aria-labelledby="headingTwoRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Most Impactful Financial Entrepreneur 2025” award celebrates a leader whose innovations have transformed the financial landscape.</strong>
                        </div>
                        <div class="text-center p-3">
                          <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThreeRight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeRight" aria-expanded="false" aria-controls="collapseThreeRight">
                            Best Social Entrepreneur in Finance 2025
                        </button>
                    </h2>
                    <div id="collapseThreeRight" class="accordion-collapse collapse" aria-labelledby="headingThreeRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Social Entrepreneur in Finance 2025” award honors an innovator who combines finance and social impact for sustainable change.</strong>
                        </div>
                        <div class="text-center p-3">
                           <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFourRight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourRight" aria-expanded="false" aria-controls="collapseFourRight">
                            Young Financial Entrepreneur of the Year 2025
                        </button>
                    </h2>
                    <div id="collapseFourRight" class="accordion-collapse collapse" aria-labelledby="headingFourRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Young Financial Entrepreneur of the Year 2025” award recognizes a rising star with outstanding innovation and leadership.</strong>
                        </div>
                        <div class="text-center p-3">
                          <a href="{{ url('/winner') }}" class="btn btn-primary" target="_blank">WINNERS</a>
                        </div>
                    </div>
                </div>

                <!-- 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFiveRight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFiveRight" aria-expanded="false" aria-controls="collapseFiveRight">
                            Best Financial Services CEO 2025
                        </button>
                    </h2>
                    <div id="collapseFiveRight" class="accordion-collapse collapse" aria-labelledby="headingFiveRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Financial Services CEO 2025” award honors a visionary leader who has driven their company to new heights of excellence.</strong>
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
