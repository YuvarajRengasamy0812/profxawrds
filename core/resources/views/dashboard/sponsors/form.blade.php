@extends('dashboard.layouts.master')
<?php
$isEdit = $Sponsor->exists;
$listTitle = $type == 'event' ? 'Event Sponsors' : 'Homepage Sponsors';
$pageTitle = ($isEdit ? 'Edit Sponsor' : 'Add Sponsor') . ' - ' . $listTitle;
?>
@section('title', $pageTitle)
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">{!! $isEdit ? '&#xe3c9;' : '&#xe02e;' !!}</i> {{ $isEdit ? 'Edit Sponsor' : 'Add Sponsor' }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ __('backend.home') }}</a> /
                    <a href="{{ route('sponsors', $type) }}">{{ $listTitle }}</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{ route('sponsors', $type) }}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{ Form::open(['route' => $isEdit ? ['sponsorsUpdate', $Sponsor->id] : ['sponsorsStore', $type], 'method' => 'POST', 'files' => true]) }}

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Sponsor Name <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" required
                               value="{{ old('name', $Sponsor->name) }}" placeholder="e.g. Dominion Markets">
                    </div>
                </div>

                @if($type == 'home')
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Category <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select name="category_id" class="form-control" required>
                                <option value="">- Select category -</option>
                                @foreach($Categories as $Category)
                                    <option value="{{ $Category->id }}" {{ old('category_id', $Sponsor->category_id) == $Category->id ? 'selected' : '' }}>{{ $Category->title }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">
                                Need a new category? <a href="{{ route('sponsorCategories') }}">Manage categories</a>
                            </small>
                        </div>
                    </div>
                @endif

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Logo @if(!$isEdit)<span class="text-danger">*</span>@endif</label>
                    <div class="col-sm-10">
                        @if($Sponsor->logo)
                            <div class="m-b-sm p-a-sm" style="background:#fff;display:inline-block;border:1px solid #ddd">
                                <img src="{{ asset($Sponsor->logo) }}" alt="{{ $Sponsor->name }}" style="max-height:80px;max-width:220px">
                            </div>
                        @endif
                        <input type="file" name="logo" class="form-control" accept="image/*" {{ $isEdit ? '' : 'required' }}>
                        <small class="text-muted">PNG / JPG / WEBP / SVG, max 5MB. {{ $isEdit ? 'Leave empty to keep the current logo.' : '' }}</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Website Link</label>
                    <div class="col-sm-10">
                        <input type="url" name="link" class="form-control" dir="ltr"
                               value="{{ old('link', $Sponsor->link) }}" placeholder="https://www.example.com/">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Display Order</label>
                    <div class="col-sm-3">
                        <input type="number" name="row_no" class="form-control"
                               value="{{ old('row_no', $Sponsor->row_no) }}" placeholder="Auto">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">{{ __('backend.status') }}</label>
                    <div class="col-sm-10">
                        <label class="ui-check m-a-0">
                            <input type="checkbox" name="status" value="1" {{ old('status', $Sponsor->status) ? 'checked' : '' }}>
                            <i class="dark-white"></i> Active (show on website)
                        </label>
                    </div>
                </div>

                <div class="form-group row m-t-md">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-lg btn-primary m-t">
                            <i class="material-icons">&#xe31b;</i> {{ $isEdit ? __('backend.update') : __('backend.add') }}
                        </button>
                        <a href="{{ route('sponsors', $type) }}" class="btn btn-lg btn-default m-t">
                            <i class="material-icons">&#xe5cd;</i> {{ __('backend.cancel') }}
                        </a>
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
