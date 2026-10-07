<?php
// Sidebar for the PROFX Awards admin. Only modules this website uses are listed here;
// everything else is blocked by App\Http\Middleware\BlockUnusedAdmin (see config/profx.php).

// Path after /admin/, e.g. "sponsors/event" or "23/topics"
$adminPath = trim(substr(Request::path(), strlen(config('smartend.backend_path'))), '/');
$adminParts = explode('/', $adminPath);
$adminSeg1 = $adminParts[0] ?? '';
$adminSeg2 = $adminParts[1] ?? '';
$routeName = Route::currentRouteName();

$mnu_title_var = "title_" . @Helper::currentLanguage()->code;
$mnu_title_var2 = "title_" . config('smartend.default_language');

$permissions = @Auth::user()->permissionsGroup;
$data_sections_arr = explode(",", (string)@$permissions->data_sections);
$allowedSections = config('profx.admin_sections', []);

// Keep the order from config/profx.php
$menuSections = collect($allowedSections)->map(function ($id) use ($GeneralWebmasterSections, $data_sections_arr) {
    $section = $GeneralWebmasterSections->firstWhere('id', $id);
    return ($section && in_array($section->id, $data_sections_arr)) ? $section : null;
})->filter();

$sectionIcons = [23 => "&#xe413;", 11 => "&#xe885;"];
$sectionLabels = [23 => "Event Gallery", 11 => "Award Winners"];

$nominationsCount = \App\Models\Nomination::count();
?>

<div id="aside" class="app-aside modal fade folded md nav-expand">
    <div class="left navside dark dk" layout="column">

        <div class="navbar navbar-md no-radius">
            <a class="hidden-folded inline folded-toggle m-t p-t-xs pull-right">
                <i class="material-icons md-24 opacity">&#xe5d2;</i>
            </a>
            <!-- brand -->
            <a class="navbar-brand" href="{{ route('adminHome') }}">
                <img class="m-r-sm admin-brand-logo" src="{{ asset(Helper::awardLogoAsset()) }}" alt="PROFX Awards {{ Helper::awardYear() }}">
            </a>
            <!-- / brand -->
        </div>
        <div flex class="hide-scroll">
            <nav class="scroll nav-active-primary">

                <ul class="nav" ui-nav>
                    {{-- Main --}}
                    <li class="nav-header hidden-folded">
                        <small class="text-muted">{{ __('backend.main') }}</small>
                    </li>
                    <li {{ ($routeName == "adminHome") ? 'class=active' : '' }}>
                        <a href="{{ route('adminHome') }}">
                            <span class="nav-icon"><i class="material-icons">&#xe3fc;</i></span>
                            <span class="nav-text">{{ __('backend.dashboard') }}</span>
                        </a>
                    </li>

                    {{-- Awards --}}
                    <li class="nav-header hidden-folded m-t-sm">
                        <small class="text-muted">Awards</small>
                    </li>
                    <li {{ ($adminSeg1 == "nominations") ? 'class=active' : '' }}>
                        <a href="{{ route('nominations.index') }}">
                            @if($nominationsCount > 0)
                                <span class="nav-label"><b class="label rounded warn">{{ $nominationsCount }}</b></span>
                            @endif
                            <span class="nav-icon"><i class="material-icons">&#xe8d2;</i></span>
                            <span class="nav-text">Nominations</span>
                        </a>
                    </li>
                    <li {{ ($adminSeg1 == "subscribers") ? 'class=active' : '' }}>
                        <a href="{{ route('subscribers') }}">
                            <span class="nav-icon"><i class="material-icons">&#xe0be;</i></span>
                            <span class="nav-text">Subscribers</span>
                        </a>
                    </li>
                    <li {{ ($adminSeg1 == "sponsors" || $adminSeg1 == "sponsor-categories") ? 'class=active' : '' }}>
                        <a>
                            <span class="nav-caret"><i class="fa fa-caret-down"></i></span>
                            <span class="nav-icon"><i class="material-icons">&#xe838;</i></span>
                            <span class="nav-text">Sponsors</span>
                        </a>
                        <ul class="nav-sub">
                            <li {{ ($adminSeg1 == "sponsor-categories") ? 'class=active' : '' }}>
                                <a href="{{ route('sponsorCategories') }}">
                                    <span class="nav-text">Sponsor Categories</span>
                                </a>
                            </li>
                            <li {{ ($adminSeg1 == "sponsors" && $adminSeg2 != "event" && @$type != "event") ? 'class=active' : '' }}>
                                <a href="{{ route('sponsors', 'home') }}">
                                    <span class="nav-text">Homepage Sponsors</span>
                                </a>
                            </li>
                            <li {{ ($adminSeg1 == "sponsors" && ($adminSeg2 == "event" || @$type == "event")) ? 'class=active' : '' }}>
                                <a href="{{ route('sponsors', 'event') }}">
                                    <span class="nav-text">Event Sponsors</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Website content (CMS sections used by the site) --}}
                    @if($menuSections->count() > 0)
                        <li class="nav-header hidden-folded m-t-sm">
                            <small class="text-muted">Website Content</small>
                        </li>
                        @foreach($menuSections as $MenuSection)
                            <?php
                            $sectionTitle = $sectionLabels[$MenuSection->id]
                                ?? ($MenuSection->$mnu_title_var ?: $MenuSection->$mnu_title_var2);
                            $sectionActive = ($adminSeg1 == (string)$MenuSection->id) || (@$WebmasterSection->id == $MenuSection->id);
                            $icon = $sectionIcons[$MenuSection->id] ?? "&#xe2c8;";
                            ?>
                            @if($MenuSection->sections_status > 0)
                                <li {{ $sectionActive ? 'class=active' : '' }}>
                                    <a>
                                        <span class="nav-caret"><i class="fa fa-caret-down"></i></span>
                                        <span class="nav-icon"><i class="material-icons">{!! $icon !!}</i></span>
                                        <span class="nav-text">{{ $sectionTitle }}</span>
                                    </a>
                                    <ul class="nav-sub">
                                        <li {{ ($sectionActive && $adminSeg2 == "categories") ? 'class=active' : '' }}>
                                            <a href="{{ route('categories', $MenuSection->id) }}">
                                                <span class="nav-text">Albums / Categories</span>
                                            </a>
                                        </li>
                                        <li {{ ($sectionActive && $adminSeg2 != "categories") ? 'class=active' : '' }}>
                                            <a href="{{ route('topics', $MenuSection->id) }}">
                                                <span class="nav-text">All Items</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li {{ $sectionActive ? 'class=active' : '' }}>
                                    <a href="{{ route('topics', $MenuSection->id) }}">
                                        <span class="nav-icon"><i class="material-icons">{!! $icon !!}</i></span>
                                        <span class="nav-text">{{ $sectionTitle }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif

                    {{-- Settings --}}
                    @if(@$permissions->roles_status || (Helper::GeneralWebmasterSettings("settings_status") && @$permissions->settings_status) || @$permissions->webmaster_status)
                        <li class="nav-header hidden-folded m-t-sm">
                            <small class="text-muted">{{ __('backend.settings') }}</small>
                        </li>
                    @endif
                    @if(Helper::GeneralWebmasterSettings("settings_status") && @$permissions->settings_status)
                        <li {{ ($adminSeg1 == "settings") ? 'class=active' : '' }}>
                            <a href="{{ route('settings') }}">
                                <span class="nav-icon"><i class="material-icons">&#xe8b8;</i></span>
                                <span class="nav-text">Site Settings</span>
                            </a>
                        </li>
                    @endif
                    @if(@$permissions->roles_status)
                        <li {{ ($adminSeg1 == "users" || $adminSeg1 == "permissions-links") ? 'class=active' : '' }}>
                            <a href="{{ route('users') }}">
                                <span class="nav-icon"><i class="material-icons">&#xe7fb;</i></span>
                                <span class="nav-text">{{ __('backend.usersPermissions') }}</span>
                            </a>
                        </li>
                    @endif
                    @if(@$permissions->webmaster_status)
                        <li {{ ($adminSeg1 == "webmaster" || $adminSeg1 == "webmaster-save" || $adminSeg1 == "webmaster-license") ? 'class=active' : '' }}>
                            <a href="{{ route('webmasterSettings') }}">
                                <span class="nav-icon"><i class="material-icons">&#xe869;</i></span>
                                <span class="nav-text">{{ __('backend.webmasterTools') }}</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </nav>
        </div>
        <br>
    </div>
</div>
