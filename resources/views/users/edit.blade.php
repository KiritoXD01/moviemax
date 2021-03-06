@extends('layouts.app')
@section('title', trans('messages.edit').' '.trans('messages.user'))

@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('PATCH')
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
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="firstname">@lang('messages.name')</label>
                            <input type="text" id="firstname" name="firstname" class="form-control" required placeholder="@lang('messages.name')..." value="{{ $user->firstname }}">
                        </div>
                        <div class="col-6">
                            <label for="lastname">@lang('messages.lastName')</label>
                            <input type="text" id="lastname" name="lastname" class="form-control" required placeholder="@lang('messages.lastName')..." value="{{ $user->lastname }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required placeholder="Email..." value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="birthdate">@lang('messages.birthDate')</label>
                        <input type="text" id="birthdate" name="birthdate" class="form-control" required placeholder="@lang('messages.birthDate')..." readonly style="background-color: white;" value="{{ $user->birthdate }}">
                    </div>
                    <div class="form-group">
                        <label for="user_type">@lang('messages.userType')</label>
                        <select id="user_type" name="user_type" class="form-control" required>
                            <option value="" selected>-- @lang('messages.userType') --</option>
                            @foreach(App\Enums\UserType::UserTypes as $key => $value)
                                <option value="{{ $key }}" @if($key == $user->user_type) selected @endif>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" class="custom-control-input" id="status" name="status" @if($user->status) checked @endif value="1">
                            <label class="custom-control-label" for="status">@lang('messages.status')</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form action="{{ route('users.updatePassword', $user->id) }}" method="post">
            @method('PATCH')
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
                                <i class="fa fa-fw fa-save"></i> @lang('messages.change') @lang('messages.password')
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="old_password">@lang('messages.previous') @lang('messages.password')</label>
                            <input type="password" id="old_password" name="old_password" class="form-control" required placeholder="@lang('messages.previous') @lang('messages.password')...">
                        </div>
                        <div class="form-group">
                            <label for="password">@lang('messages.password')</label>
                            <input type="password" id="password" name="password" class="form-control" required placeholder="@lang('passwords.password')...">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">@lang('messages.confirm') @lang('messages.password')</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required placeholder="@lang('messages.confirm') @lang('messages.password')...">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function(){
            let today = new Date(
                new Date().getFullYear(),
                new Date().getMonth(),
                $user =
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