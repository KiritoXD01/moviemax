@extends('layouts.app')
@section('title', trans('messages.movies'))

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@lang('messages.movies')</h1>
        <a href="{{ route('movies.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> @lang('messages.add') @lang('messages.movie')
        </a>
    </div>
    <!-- End Page Heading -->

    <!-- Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="datatable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>@lang('messages.title')</th>
                        <th>@lang('messages.year')</th>
                        <th>IMDB ID</th>
                        <th>@lang('messages.status')</th>
                        <td>@lang('messages.actions')</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($movies as $movie)
                        <tr>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->year }}</td>
                            <td>{{ $movie->imdb_id }}</td>
                            <td class="text-center">
                                @if($movie->status)
                                    <span class="badge badge-primary">@lang('messages.enabled')</span>
                                @else
                                    <span class="badge badge-danger">@lang('messages.disabled')</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-info">
                                            <i class="fa fa-edit"></i> @lang('messages.edit')
                                        </a>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> @lang('messages.delete')
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Table -->
@endsection

@section('javascript')
    <script>
        $(document).ready(function(){
            $("#datatable").dataTable();
        });
    </script>
@endsection