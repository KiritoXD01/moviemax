@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            <i class="fas fa-download text-white-50"></i> @lang('messages.generate') @lang('messages.report')
        </a>
    </div>
    <!-- End Page Heading -->

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">@lang('messages.movies')</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $movies }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-film fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">@lang('messages.users')</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Top 10 @lang('messages.movies')</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTableTop" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>@lang('messages.title')</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($TopMovies as $movie)
                                <tr>
                                    <td>{{ $movie->title }}</td>
                                    <td>{{ $movie->users_count }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script>
$(document).ready(function(){
    $("#dataTableTop").dataTable();
});
</script>
@endsection