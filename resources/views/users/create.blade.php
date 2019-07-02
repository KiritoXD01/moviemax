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
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="firstname">@lang('messages.name')</label>
                                <input type="text" id="firstname" name="firstname" class="form-control" required placeholder="@lang('messages.name')...">
                            </div>
                            <div class="col-6">
                                <label for="lastname">@lang('messages.lastName')</label>
                                <input type="text" id="lastname" name="lastname" class="form-control" required placeholder="@lang('messages.lastName')...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required placeholder="Email...">
                        </div>
                        <div class="form-group">
                            <label for="birthdate">@lang('messages.birthDate')</label>
                            <input type="text" id="birthdate" name="birthdate" class="form-control" required placeholder="@lang('messages.birthDate')...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">@lang('messages.password')</label>
                            <input type="password" id="password" name="password" class="form-control" required placeholder="@lang('passwords.password')...">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">@lang('messages.confirm') @lang('messages.password')</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required placeholder="@lang('messages.confirm') @lang('messages.password')...">
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" class="custom-control-input" id="status" name="status" checked value="1">
                                <label class="custom-control-label" for="status">@lang('messages.status')</label>
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
        let today = new Date(
            new Date().getFullYear(),
            new Date().getMonth(),
            new Date().getDate()
        );

        $("#birthdate").datepicker({
            uiLibrary: 'bootstrap4',
            format: "yyyy-mm-dd",
            maxDate: today
        });
    });
</script>
@endsection