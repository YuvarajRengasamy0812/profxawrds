@extends('frontEnd.layouts.profx')

@section('content')

<!-- Hero Section -->
<div class="hero-section">
    <div class="trophies-container">
        <div class="award-text">
            <h1>Educational Academy Awards</h1>
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
                           Excellence in Stock Market Education
                        </button>
                    </h2>
                    <div id="collapseOneLeft" class="accordion-collapse collapse show" aria-labelledby="headingOneLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Excellence in Stock Market Education” award honors an organization or platform that has demonstrated outstanding commitment to educating investors and traders about the stock market..</strong>
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
                            Outstanding Multi-Asset Financial Education
                        </button>
                    </h2>
                    <div id="collapseTwoLeft" class="accordion-collapse collapse" aria-labelledby="headingTwoLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Outstanding Multi-Asset Financial Education” award recognizes an organization or platform that excels in providing comprehensive educational resources across various asset classes..</strong>
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
                            Best Online Trading Academy
                        </button>
                    </h2>
                    <div id="collapseThreeLeft" class="accordion-collapse collapse" aria-labelledby="headingThreeLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Online Trading Academy” award honors an academy that excels in providing top-notch online education and training for traders and investors.</strong>
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
                           Best Professional Trading Course
                        </button>
                    </h2>
                    <div id="collapseFourLeft" class="accordion-collapse collapse" aria-labelledby="headingFourLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Professional Trading Course” award recognizes a course that offers exceptional training and education for advanced traders. This award celebrates its in-depth content, expert instruction, and practical strategies that equip professionals with the skills and knowledge to excel in trading..</strong>
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
                            Best Trading Strategy Development Course
                        </button>
                    </h2>
                    <div id="collapseFiveLeft" class="accordion-collapse collapse" aria-labelledby="headingFiveLeft" data-bs-parent="#accordionLeft">
                        <div class="accordion-body">
                            <strong>The “Best Trading Strategy Development Course” award honors a course that excels in teaching traders how to create and refine effective trading strategies.</strong>
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
                           Best Financial Education Content Creator
                        </button>
                    </h2>
                    <div id="collapseOneRight" class="accordion-collapse collapse show" aria-labelledby="headingOneRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Financial Education Content Creator” award recognizes an individual or organization that produces outstanding financial education content..</strong>
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
                           Best Advanced Trading Program
                        </button>
                    </h2>
                    <div id="collapseTwoRight" class="accordion-collapse collapse" aria-labelledby="headingTwoRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Advanced Trading Program” award honors a program that provides top-tier education and training for experienced traders. This recognition celebrates its in-depth content, sophisticated strategies.</strong>
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
                           Best Technical Analysis Course
                        </button>
                    </h2>
                    <div id="collapseThreeRight" class="accordion-collapse collapse" aria-labelledby="headingThreeRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Technical Analysis Course” award recognizes a course that excels in teaching the principles and techniques of technical analysis..</strong>
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
                           Best Trading Mentorship Program
                        </button>
                    </h2>
                    <div id="collapseFourRight" class="accordion-collapse collapse" aria-labelledby="headingFourRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Trading Mentorship Program” award honors a program that provides exceptional guidance and support for traders through personalized mentorship.</strong>
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
                          Best Algorithmic Trading Education
                        </button>
                    </h2>
                    <div id="collapseFiveRight" class="accordion-collapse collapse" aria-labelledby="headingFiveRight" data-bs-parent="#accordionRight">
                        <div class="accordion-body">
                            <strong>The “Best Algorithmic Trading Education” award recognizes a program or platform that excels in teaching the principles and techniques of algorithmic trading.e.</strong>
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
