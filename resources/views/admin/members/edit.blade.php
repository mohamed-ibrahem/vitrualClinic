@extends ('layout.app', [
    'wrapper' => Form::open(['class' => 'form-horizontal', 'id' => 'register_member', 'method' => 'put', 'route' => ['admin.members.update', $user], 'files' => true]),
    'endOfWrapper' => form::close()
])

@section ('title', trans('general.edit', ['page' => $user->name]))

@section ('toolbar')
    <a href="{{ route('admin.members.index') }}" class="btn navbar-btn btn-default">
        @lang('general.cancel')
    </a>

    <button type="submit" class="btn green button-submit">
        Save
        <i class="fa fa-save fa-fw"></i>
    </button>
@endsection

@section ('content')
    <div class="container">
        @include ('admin.members._form')
    </div>
@endsection
