@extends('dashboard.layouts.master')
@section('title', 'Sponsor Categories')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>Sponsor Categories</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ __('backend.home') }}</a> /
                    <a href="{{ route('sponsors', 'home') }}">Sponsors</a> /
                    <a href="">Categories</a>
                </small>
            </div>

            @if(@Auth::user()->permissionsGroup->add_status)
                <div class="p-a b-b">
                    {{ Form::open(['route' => 'sponsorCategoriesStore', 'method' => 'POST', 'class' => 'form-inline']) }}
                    <input type="text" name="title" class="form-control m-r-sm" style="min-width:260px"
                           placeholder="Category name (e.g. Official Sponsor)" required>
                    <input type="number" name="row_no" class="form-control m-r-sm" style="width:90px" placeholder="Order">
                    <label class="ui-check m-r-sm m-b-0">
                        <input type="checkbox" name="status" value="1" checked><i class="dark-white"></i> Active
                    </label>
                    <button type="submit" class="btn primary"><i class="material-icons">&#xe02e;</i> Add Category</button>
                    {{ Form::close() }}
                </div>
            @endif

            @if(count($Categories) == 0)
                <div class="p-a text-center">
                    <div class="text-muted m-b"><i class="fa fa-folder-open fa-4x"></i></div>
                    <h6>{{ __('backend.noData') }}</h6>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered m-a-0 profx-stack">
                        <thead class="dker">
                        <tr>
                            <th>Category Name</th>
                            <th class="text-center" style="width:110px">Order</th>
                            <th class="text-center" style="width:90px">Active</th>
                            <th class="text-center" style="width:100px">Sponsors</th>
                            <th class="text-center" style="width:150px">{{ __('backend.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Categories as $Category)
                            <tr>
                                {{ Form::open(['route' => ['sponsorCategoriesUpdate', $Category->id], 'method' => 'POST', 'id' => 'catForm' . $Category->id]) }}
                                {{ Form::close() }}
                                <td data-label="Category Name">
                                    <input type="text" name="title" form="catForm{{ $Category->id }}" class="form-control"
                                           value="{{ $Category->title }}" required>
                                </td>
                                <td data-label="Order">
                                    <input type="number" name="row_no" form="catForm{{ $Category->id }}" class="form-control"
                                           value="{{ $Category->row_no }}">
                                </td>
                                <td class="text-center" data-label="Active">
                                    <label class="ui-check m-a-0">
                                        <input type="checkbox" name="status" value="1" form="catForm{{ $Category->id }}"
                                            {{ $Category->status ? 'checked' : '' }}><i class="dark-white"></i>
                                    </label>
                                </td>
                                <td class="text-center" data-label="Sponsors">
                                    <a href="{{ route('sponsors', ['type' => 'home', 'category_id' => $Category->id]) }}">{{ $Category->sponsors_count }}</a>
                                </td>
                                <td class="text-center profx-stack-actions">
                                    @if(@Auth::user()->permissionsGroup->edit_status)
                                        <button type="submit" form="catForm{{ $Category->id }}" class="btn btn-sm success"
                                                title="{{ __('backend.save') }}">
                                            <i class="material-icons">&#xe161;</i>
                                        </button>
                                    @endif
                                    @if(@Auth::user()->permissionsGroup->delete_status)
                                        <a class="btn btn-sm warning" title="{{ __('backend.delete') }}"
                                           href="{{ route('sponsorCategoriesDestroy', $Category->id) }}"
                                           onclick="return confirm('Delete this category? Its sponsors will be kept but hidden from the homepage until moved to another category.')">
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
