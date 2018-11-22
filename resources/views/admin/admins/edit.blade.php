@extends ('layout.app', [
    'wrapper' => Form::open(['class' => 'form-horizontal', 'id' => 'register_admin', 'method' => 'put', 'route' => ['admin.admins.update', $user], 'files' => true]),
    'endOfWrapper' => form::close()
])

@section ('title', trans('general.edit', ['page' => $user->name]))

@section ('toolbar')
    <a href="{{ route('admin.admins.index') }}" class="btn navbar-btn btn-default">
        @lang('general.cancel')
    </a>

    <button type="submit" class="btn green button-submit">
        Save
        <i class="fa fa-save fa-fw"></i>
    </button>
@endsection

@section ('content')
    <div class="container">
        @include ('admin.admins._form')
    </div>
@endsection
