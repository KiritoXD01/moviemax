@extends('layouts.app')
@section('title', trans('messages.create').' '.trans('messages.user'))

@section('content')
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('users.index') }}" class="btn btn-warning">
                            <i class="fa fa-fw fa-undo"></i> @lang('messages.cancel')
                        </a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fa fa-fw fa-save"></i> @lang('messages.save') @lang('messages.changes')
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">@lang('messages.name')</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="@lang('messages.name')..." value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="code">@lang('messages.code')</label>
                            <input type="text" id="code" name="code" class="form-control" placeholder="@lang('messages.code')..." value="{{ old('code') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">@lang('messages.description')</label>
                            <textarea id="description" name="description" class="form-control" placeholder="@lang('messages.description')..." rows="4">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">@lang('messages.price')</label>
                            <input type="number" id="price" name="price" class="form-control" required placeholder="@lang('messages.price')..." value="{{ old('price') }}">
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

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection