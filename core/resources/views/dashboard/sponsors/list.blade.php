@extends('dashboard.layouts.master')
<?php $pageTitle = $type == 'event' ? 'Event Sponsors' : 'Homepage Sponsors'; ?>
@section('title', $pageTitle)
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>{{ $pageTitle }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ __('backend.home') }}</a> /
                    <a href="">{{ $pageTitle }}</a>
                </small>
                <div class="text-muted m-t-xs">
                    @if($type == 'event')
                        Shown on the <a href="{{ url('/event') }}" target="_blank">/event</a> page.
                    @else
                        Shown on the homepage "PROFX Awards Sponsors" section, grouped by category.
                    @endif
                </div>
            </div>

            <div class="box-tool">
                <ul class="nav">
                    @if($type == 'home')
                        <li class="nav-item inline">
                            <a class="btn btn-fw white" href="{{ route('sponsorCategories') }}">
                                <i class="material-icons">&#xe2c7;</i> Categories
                            </a>
                        </li>
                    @endif
                    @if(@Auth::user()->permissionsGroup->add_status)
                        <li class="nav-item inline">
                            <a class="btn btn-fw primary" href="{{ route('sponsorsCreate', $type) }}">
                                <i class="material-icons">&#xe02e;</i> Add Sponsor
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            @if($type == 'home')
                <div class="p-a b-b">
                    <form method="GET" action="{{ route('sponsors', 'home') }}" class="form-inline">
                        <select name="category_id" class="form-control m-r-sm" onchange="this.form.submit()">
                            <option value="">All categories</option>
                            @foreach($Categories as $Category)
                                <option value="{{ $Category->id }}" {{ request('category_id') == $Category->id ? 'selected' : '' }}>{{ $Category->title }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            @endif

            @if(count($Sponsors) == 0)
                <div class="p-a text-center">
                    <div class="text-muted m-b"><i class="fa fa-image fa-4x"></i></div>
                    <h6>{{ __('backend.noData') }}</h6>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered m-a-0">
                        <thead class="dker">
                        <tr>
                            <th style="width:140px">Logo</th>
                            <th>Name</th>
                            @if($type == 'home')
                                <th class="hidden-xs-down">Category</th>
                            @endif
                            <th class="hidden-xs-down">Website</th>
                            <th class="text-center hidden-xs-down" style="width:70px">Order</th>
                            <th class="text-center" style="width:70px">{{ __('backend.status') }}</th>
                            <th class="text-center" style="width:120px">{{ __('backend.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Sponsors as $Sponsor)
                            <tr>
                                <td class="text-center" style="background:#fff">
                                    @if($Sponsor->logo)
                                        <img src="{{ asset($Sponsor->logo) }}" alt="{{ $Sponsor->name }}"
                                             style="max-height:50px;max-width:120px;object-fit:contain">
                                    @endif
                                </td>
                                <td class="h6">{{ $Sponsor->name }}@if($type == 'home' && $Sponsor->category)<div class="text-muted text-sm hidden-sm-up">{{ $Sponsor->category->title }}</div>@endif</td>
                                @if($type == 'home')
                                    <td class="hidden-xs-down">{!! $Sponsor->category ? e($Sponsor->category->title) : '<span class="text-danger">No category</span>' !!}</td>
                                @endif
                                <td class="hidden-xs-down">
                                    @if($Sponsor->link)
                                        <a href="{{ $Sponsor->link }}" target="_blank" rel="noopener">{{ $Sponsor->link }}</a>
                                    @endif
                                </td>
                                <td class="text-center hidden-xs-down">{{ $Sponsor->row_no }}</td>
                                <td class="text-center">
                                    <i class="fa {{ $Sponsor->status ? 'fa-check text-success' : 'fa-times text-danger' }} inline"></i>
                                </td>
                                <td class="text-center">
                                    @if(@Auth::user()->permissionsGroup->edit_status)
                                        <a class="btn btn-sm success" href="{{ route('sponsorsEdit', $Sponsor->id) }}"
                                           title="{{ __('backend.edit') }}">
                                            <i class="material-icons">&#xe3c9;</i>
                                        </a>
                                    @endif
                                    @if(@Auth::user()->permissionsGroup->delete_status)
                                        <a class="btn btn-sm warning" href="{{ route('sponsorsDestroy', $Sponsor->id) }}"
                                           title="{{ __('backend.delete') }}"
                                           onclick="return confirm('Delete this sponsor?')">
                                            <i class="material-icons">&#xe872;</i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
