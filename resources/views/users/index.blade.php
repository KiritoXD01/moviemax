@extends('layouts.app')
@section('title', trans('messages.users'))

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@lang('messages.users')</h1>
    <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> @lang('messages.create') @lang('messages.user')
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
                        <th>@lang('messages.fullName')</th>
                        <th>Email</th>
                        <th>@lang('messages.type')</th>
                        <th>@lang('messages.status')</th>
                        <td>@lang('messages.actions')</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->firstname.' '.$user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ App\Enums\UserType::UserTypes[$user->user_type] }}</td>
                        <td class="text-center">
                            @if($user->status)
                                <span class="badge badge-primary">@lang('messages.enabled')</span>
                            @else
                                <span class="badge badge-danger">@lang('messages.disabled')</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <div class="btn-group" role="group">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">
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