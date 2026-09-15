<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-12 text-center text-lg-start mb-2 mb-lg-0">
                <div class="venue-info">
                    <strong>Venue:</strong> Le Meridian, Airport Road, Dubai UAE
                    <span class="venue-date"><strong>Date & Time:</strong> 19th December 2025, 6:00PM - 11:00PM</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 text-center text-lg-end">
                <div class="social-icons">
                    <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    <a href="#" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Navigation -->
<nav class="navbar navbar-expand-lg main-header">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <div class="logo-section">
                <img src="{{ asset('assets/keditor/profx/assets/Awards.png') }}" alt="PROPX Awards Logo">
            </div>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              

                <!-- Dynamic Menu Integration -->
                @if(Helper::GeneralWebmasterSettings("header_menu_id") > 0)
                    @php
                        $MenuLinks = \App\Helpers\SiteMenu::List(Helper::GeneralWebmasterSettings("header_menu_id"));
                    @endphp
                    @if(count($MenuLinks) > 0)
                        @foreach($MenuLinks as $MenuLink)
                            <li class="nav-item {{ $MenuLink->sub ? 'dropdown' : '' }}">
                                <a class="nav-link {{ \App\Helpers\SiteMenu::ActiveLink(url()->current(), $MenuLink, @$WebmasterSection) }}" 
                                   href="{{ $MenuLink->url }}" target="{{ $MenuLink->target }}">
                                    {!! $MenuLink->icon ? "<i class='".$MenuLink->icon."'></i> " : "" !!} {{ $MenuLink->title }}
                                    @if($MenuLink->sub)
                                        <i class="drop-arrow bi bi-chevron-down"></i>
                                    @endif
                                </a>

                                @if($MenuLink->sub)
                                    <ul class="dropdown-menu">
                                        @foreach($MenuLink->sub as $SubLink)
                                            <li class="{{ $SubLink->sub ? 'dropdown' : '' }}">
                                                <a class="nav-link" href="{{ $SubLink->url }}" target="{{ $SubLink->target }}">
                                                    {!! $SubLink->icon ? "<i class='".$SubLink->icon."'></i> " : "" !!} {{ $SubLink->title }}
                                                    @if($SubLink->sub)
                                                        <i class="drop-arrow bi bi-chevron-{{ Helper::currentLanguage()->right }}"></i>
                                                    @endif
                                                </a>
                                                @if($SubLink->sub)
                                                    <ul class="dropdown-menu">
                                                        @foreach($SubLink->sub as $SubLink2)
                                                            <li class="{{ $SubLink2->sub ? 'dropdown' : '' }}">
                                                                <a class="nav-link" href="{{ $SubLink2->url }}" target="{{ $SubLink2->target }}">
                                                                    {!! $SubLink2->icon ? "<i class='".$SubLink2->icon."'></i> " : "" !!} {{ $SubLink2->title }}
                                                                    @if($SubLink2->sub)
                                                                        <i class="drop-arrow bi bi-chevron-{{ Helper::currentLanguage()->right }}"></i>
                                                                    @endif
                                                                </a>
                                                                @if($SubLink2->sub)
                                                                    <ul class="dropdown-menu">
                                                                        @foreach($SubLink2->sub as $SubLink3)
                                                                            <li><a class="nav-link" href="{{ $SubLink3->url }}" target="{{ $SubLink3->target }}">
                                                                                {!! $SubLink3->icon ? "<i class='".$SubLink3->icon."'></i> " : "" !!} {{ $SubLink3->title }}
                                                                            </a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endif
                @endif
                <!-- End Dynamic Menu -->
            </ul>

            <!-- CTA Buttons -->
            <div class="cta-buttons d-flex gap-2">
                <a href="{{ url('/nomination') }}" class="btn btn-nominate">NOMINATE</a>
                <a href="#sponsor" class="btn btn-sponsor">SPONSOR</a>
                <a href="#login" class="btn btn-login">LOGIN</a>
            </div>
        </div>
    </div>
</nav>
