@extends('layouts.app')
@section('title', trans('messages.add').' '.trans('messages.movie'))

@section('content')
    <form action="{{ route('movies.store') }}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('movies.index') }}" class="btn btn-warning">
                            <i class="fa fa-fw fa-undo"></i> @lang('messages.cancel')
                        </a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fa fa-fw fa-save"></i> @lang('messages.save') @lang('messages.movie')
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">@lang('messages.title')</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="@lang('messages.title')..." value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="year">@lang('messages.year')</label>
                            <input type="text" id="year" name="year" class="form-control" placeholder="@lang('messages.year')..." value="{{ old('year') }}" required readonly style="background-color: white;">
                        </div>
                        <div class="form-group">
                            <label for="imdb_id">IMDB ID</label>
                            <input type="text" id="imdb_id" name="imdb_id" class="form-control" required placeholder="IMDB ID..." value="{{ old('imdb_id') }}">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" class="custom-control-input" id="status" name="status" checked value="1">
                                <label class="custom-control-label" for="status">@lang('messages.status')</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">@lang('messages.image')</label>
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-primary btn-block" id="btnImage">
                                        <i class="fa fa-plus fa-fw"></i> @lang('messages.add') @lang('messages.image')
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-danger btn-block" id="cancelImg">
                                        <i class="fa fa-trash fa-fw"></i> @lang('messages.delete') @lang('messages.image')
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="image" id="image" value="{{ old('image') }}">
                            <input type="file" id="hiddenImage" accept="image/*">
                            <br>
                            <div class="text-center">
                                <img src="{{ asset('img/addimage.png') }}" alt="" id="previewImg" class="img-thumbnail" style="width: 70%;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('javascript')
<script>
$(document).ready(function(){
    $("#year").datepicker({
        format: 'yyyy',
        uiLibrary: 'bootstrap4'
    });
});
</script>
@endsection