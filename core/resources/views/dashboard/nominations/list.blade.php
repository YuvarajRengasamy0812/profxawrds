@extends('dashboard.layouts.master')
@section('title', 'Nominations')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>Nominations <small class="label primary m-l-xs">{{ $Nominations->total() }}</small></h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ __('backend.home') }}</a> /
                    <a href="">Nominations</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="btn btn-fw success" href="{{ route('nominations.export', request()->only('q', 'category')) }}">
                            <i class="material-icons">&#xe2c4;</i> Export CSV
                        </a>
                    </li>
                </ul>
            </div>

            <div class="p-a b-b">
                <form method="GET" action="{{ route('nominations.index') }}" class="form-inline">
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control m-r-sm" style="min-width:240px"
                           placeholder="Search company, name, email, phone">
                    <select name="category" class="form-control m-r-sm">
                        <option value="">All categories</option>
                        @foreach($Categories as $Category)
                            <option value="{{ $Category }}" {{ request('category') == $Category ? 'selected' : '' }}>{{ $Category }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn primary m-r-sm"><i class="fa fa-search"></i> {{ __('backend.search') }}</button>
                    @if(request('q') || request('category'))
                        <a href="{{ route('nominations.index') }}" class="btn white">Clear</a>
                    @endif
                </form>
            </div>

            @if($Nominations->total() == 0)
                <div class="p-a text-center">
                    <div class="text-muted m-b"><i class="fa fa-trophy fa-4x"></i></div>
                    <h6>{{ __('backend.noData') }}</h6>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover m-a-0">
                        <thead class="dker">
                        <tr>
                            <th class="hidden-sm-down" style="width:50px">#</th>
                            <th>Company</th>
                            <th class="hidden-xs-down">Contact</th>
                            <th>Email / Phone</th>
                            <th class="hidden-sm-down">Country</th>
                            <th class="hidden-sm-down">Category</th>
                            <th class="hidden-xs-down" style="width:110px">Submitted</th>
                            <th class="text-center" style="width:110px">{{ __('backend.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Nominations as $Nomination)
                            <tr>
                                <td class="hidden-sm-down">{{ $Nomination->id }}</td>
                                <td class="h6"><a href="{{ route('nominations.show', $Nomination->id) }}">{{ $Nomination->company }}</a>
                                    <div class="text-muted text-sm hidden-sm-up">{{ $Nomination->contact }} &middot; {{ $Nomination->created_at ? $Nomination->created_at->format('d M Y') : '' }}</div></td>
                                <td class="hidden-xs-down">
                                    {{ $Nomination->contact }}
                                    @if($Nomination->jobtitle)
                                        <div class="text-muted text-sm">{{ $Nomination->jobtitle }}</div>
                                    @endif
                                </td>
                                <td>
                                    @if($Nomination->email)<a href="mailto:{{ $Nomination->email }}">{{ $Nomination->email }}</a>@endif
                                    @if($Nomination->phone)<div class="text-muted text-sm" dir="ltr">{{ $Nomination->phone }}</div>@endif
                                </td>
                                <td class="hidden-sm-down">{{ $Nomination->country }}</td>
                                <td class="hidden-sm-down">
                                    {{ $Nomination->category }}
                                    @if($Nomination->subcategory)
                                        <div class="text-muted text-sm">{{ $Nomination->subcategory }}</div>
                                    @endif
                                </td>
                                <td class="text-sm hidden-xs-down">{{ $Nomination->created_at ? $Nomination->created_at->format('d M Y H:i') : '' }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm info" href="{{ route('nominations.show', $Nomination->id) }}" title="View">
                                        <i class="material-icons">&#xe8f4;</i>
                                    </a>
                                    @if(@Auth::user()->permissionsGroup->delete_status)
                                        <a class="btn btn-sm warning" href="{{ route('nominations.destroy', $Nomination->id) }}"
                                           title="{{ __('backend.delete') }}" onclick="return confirm('Delete this nomination?')">
                                            <i class="material-icons">&#xe872;</i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="dker p-a">
                    <div class="row">
                        <div class="col-sm-6 text-sm text-muted p-t-sm">
                            {{ $Nominations->firstItem() }} - {{ $Nominations->lastItem() }} / {{ $Nominations->total() }}
                        </div>
                        <div class="col-sm-6 text-right">
                            {!! $Nominations->links() !!}
                        </div>
                    </div>
                </footer>
            @endif
        </div>
    </div>
@endsection
