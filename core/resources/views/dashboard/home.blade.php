@extends('dashboard.layouts.master')
@section('title', Helper::GeneralSiteSettings("site_title_".@Helper::currentLanguage()->code))
@section('content')
    <?php
    $newsletterGroup = Helper::GeneralWebmasterSettings("newsletter_contacts_group");
    $stats = [
        ['label' => 'Nominations', 'count' => \App\Models\Nomination::count(), 'icon' => '&#xe8d2;', 'color' => 'warn', 'route' => route('nominations.index')],
        ['label' => 'Subscribers', 'count' => \App\Models\Contact::where('group_id', $newsletterGroup)->count(), 'icon' => '&#xe0be;', 'color' => 'info', 'route' => route('subscribers')],
        ['label' => 'Homepage Sponsors', 'count' => \App\Models\Sponsor::where('type', 'home')->where('status', 1)->count(), 'icon' => '&#xe838;', 'color' => 'success', 'route' => route('sponsors', 'home')],
        ['label' => 'Event Sponsors', 'count' => \App\Models\Sponsor::where('type', 'event')->where('status', 1)->count(), 'icon' => '&#xe878;', 'color' => 'accent', 'route' => route('sponsors', 'event')],
    ];
    $latestNominations = \App\Models\Nomination::orderBy('id', 'desc')->limit(6)->get();
    $latestSubscribers = \App\Models\Contact::where('group_id', $newsletterGroup)->orderBy('id', 'desc')->limit(6)->get();
    ?>
    <div class="padding">
        <div class="profx-welcome">
            <h2>
                {{ __('backend.hi') }} <span>{{ Auth::user()->name }}</span>, {{ __('backend.welcomeBack') }} 🎉
            </h2>
            <p>PROFX Awards {{ Helper::awardYear() }} &middot; {{ Helper::awardEventDateTime() }}</p>
        </div>

        <div class="row">
            @foreach($stats as $stat)
                <div class="col-xs-6 col-md-3">
                    <a href="{{ $stat['route'] }}" class="box p-a profx-stat">
                        <div class="pull-left m-r">
                            <span class="w-48 rounded {{ $stat['color'] }}">
                                <i class="material-icons">{!! $stat['icon'] !!}</i>
                            </span>
                        </div>
                        <div class="clear">
                            <h4 class="m-a-0 text-lg _300">{{ $stat['count'] }}</h4>
                            <small class="text-muted">{{ $stat['label'] }}</small>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="box">
                    <div class="box-header">
                        <h3>Latest Nominations</h3>
                    </div>
                    <div class="box-tool">
                        <a href="{{ route('nominations.index') }}" class="btn btn-sm white">View all</a>
                    </div>
                    @if(count($latestNominations) == 0)
                        <div class="p-a text-center text-muted">{{ __('backend.noData') }}</div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover m-a-0">
                                <thead>
                                <tr>
                                    <th>Company</th>
                                    <th class="hidden-xs-down">Category</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latestNominations as $Nomination)
                                    <tr>
                                        <td>
                                            <a href="{{ route('nominations.show', $Nomination->id) }}" class="_600">{{ $Nomination->company ?: '#' . $Nomination->id }}</a>
                                            <div class="text-muted text-sm">{{ $Nomination->contact }}</div>
                                        </td>
                                        <td class="hidden-xs-down text-sm">{{ $Nomination->category }}</td>
                                        <td class="text-sm text-nowrap">{{ $Nomination->created_at ? $Nomination->created_at->format('d M Y') : '' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box">
                    <div class="box-header">
                        <h3>Quick Actions</h3>
                    </div>
                    <div class="box-body profx-quick">
                        <a href="{{ route('sponsorsCreate', 'home') }}" class="btn btn-block primary"><i class="material-icons">&#xe02e;</i> Add Homepage Sponsor</a>
                        <a href="{{ route('sponsorsCreate', 'event') }}" class="btn btn-block info"><i class="material-icons">&#xe02e;</i> Add Event Sponsor</a>
                        <a href="{{ route('sponsorCategories') }}" class="btn btn-block white"><i class="material-icons">&#xe2c7;</i> Sponsor Categories</a>
                        <a href="{{ route('nominations.export') }}" class="btn btn-block success"><i class="material-icons">&#xe2c4;</i> Export Nominations</a>
                        <a href="{{ url('/') }}" target="_blank" class="btn btn-block dark"><i class="material-icons">&#xe895;</i> View Website</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header">
                        <h3>Latest Subscribers</h3>
                    </div>
                    <div class="box-tool">
                        <a href="{{ route('subscribers') }}" class="btn btn-sm white">View all</a>
                    </div>
                    <ul class="list no-border m-a-0">
                        @forelse($latestSubscribers as $Subscriber)
                            <li class="list-item">
                                <div class="text-ellipsis">{{ $Subscriber->email }}</div>
                                <small class="text-muted">{{ $Subscriber->created_at ? $Subscriber->created_at->diffForHumans() : '' }}</small>
                            </li>
                        @empty
                            <li class="list-item text-muted text-center">{{ __('backend.noData') }}</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
