@extends('dashboard.layouts.master')
@section('title', 'Newsletter Subscribers')
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>Newsletter Subscribers <small class="label primary m-l-xs">{{ $Subscribers->total() }}</small></h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ __('backend.home') }}</a> /
                    <a href="">Subscribers</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="btn btn-fw success" href="{{ route('subscribersExport', request()->only('q')) }}">
                            <i class="material-icons">&#xe2c4;</i> Export CSV
                        </a>
                    </li>
                </ul>
            </div>

            <div class="p-a b-b">
                <form method="GET" action="{{ route('subscribers') }}" class="form-inline">
                    <input type="text" name="q" value="{{ request('q') }}" class="form-control m-r-sm" style="min-width:240px"
                           placeholder="Search email">
                    <button type="submit" class="btn primary m-r-sm"><i class="fa fa-search"></i> {{ __('backend.search') }}</button>
                    @if(request('q'))
                        <a href="{{ route('subscribers') }}" class="btn white">Clear</a>
                    @endif
                </form>
            </div>

            @if($Subscribers->total() == 0)
                <div class="p-a text-center">
                    <div class="text-muted m-b"><i class="fa fa-envelope-o fa-4x"></i></div>
                    <h6>{{ __('backend.noData') }}</h6>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover m-a-0">
                        <thead class="dker">
                        <tr>
                            <th style="width:60px">#</th>
                            <th>Email</th>
                            <th style="width:180px">Subscribed At</th>
                            <th class="text-center" style="width:90px">{{ __('backend.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Subscribers as $Subscriber)
                            <tr>
                                <td>{{ $Subscriber->id }}</td>
                                <td><a href="mailto:{{ $Subscriber->email }}">{{ $Subscriber->email }}</a></td>
                                <td class="text-sm">{{ $Subscriber->created_at ? $Subscriber->created_at->format('d M Y H:i') : '' }}</td>
                                <td class="text-center">
                                    @if(@Auth::user()->permissionsGroup->delete_status)
                                        <a class="btn btn-sm warning" href="{{ route('subscribersDestroy', $Subscriber->id) }}"
                                           title="{{ __('backend.delete') }}" onclick="return confirm('Remove this subscriber?')">
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
                            {{ $Subscribers->firstItem() }} - {{ $Subscribers->lastItem() }} / {{ $Subscribers->total() }}
                        </div>
                        <div class="col-sm-6 text-right">
                            {!! $Subscribers->links() !!}
                        </div>
                    </div>
                </footer>
            @endif
        </div>
    </div>
@endsection
