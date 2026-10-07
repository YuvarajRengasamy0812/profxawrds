@extends('dashboard.layouts.master')
@section('title', 'Nomination - ' . $Nomination->company)
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3>{{ $Nomination->company ?: 'Nomination #' . $Nomination->id }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ __('backend.home') }}</a> /
                    <a href="{{ route('nominations.index') }}">Nominations</a> /
                    <a href="">#{{ $Nomination->id }}</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{ route('nominations.index') }}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <?php
            $rows = [
                'Company' => e($Nomination->company),
                'Contact Name' => e($Nomination->contact),
                'Job Title' => e($Nomination->jobtitle),
                'Email' => $Nomination->email ? '<a href="mailto:' . e($Nomination->email) . '">' . e($Nomination->email) . '</a>' : '',
                'Phone' => '<span dir="ltr">' . e($Nomination->phone) . '</span>',
                'Website' => preg_match('#^https?://#i', (string)$Nomination->website) ? '<a href="' . e($Nomination->website) . '" target="_blank" rel="noopener">' . e($Nomination->website) . '</a>' : e($Nomination->website),
                'Country' => e($Nomination->country),
                'Category' => e($Nomination->category),
                'Sub Category' => e($Nomination->subcategory),
                'Description' => nl2br(e($Nomination->description)),
                'Statement' => nl2br(e($Nomination->statement)),
                'Consent 1' => $Nomination->consent1 ? '<i class="fa fa-check text-success"></i> Yes' : '<i class="fa fa-times text-danger"></i> No',
                'Consent 2' => $Nomination->consent2 ? '<i class="fa fa-check text-success"></i> Yes' : '<i class="fa fa-times text-danger"></i> No',
                'Submitted At' => $Nomination->created_at ? $Nomination->created_at->format('d M Y, H:i') : '',
            ];
            ?>
            <div class="table-responsive">
                <table class="table table-bordered m-a-0">
                    <tbody>
                    @foreach($rows as $label => $value)
                        <tr>
                            <th class="dker" style="width:200px">{{ $label }}</th>
                            <td>{!! $value !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="dker p-a">
                <a href="{{ route('nominations.index') }}" class="btn white"><i class="material-icons">&#xe5c4;</i> Back</a>
                @if(@Auth::user()->permissionsGroup->delete_status)
                    <a href="{{ route('nominations.destroy', $Nomination->id) }}" class="btn warning pull-right"
                       onclick="return confirm('Delete this nomination?')"><i class="material-icons">&#xe872;</i> {{ __('backend.delete') }}</a>
                @endif
            </footer>
        </div>
    </div>
@endsection
