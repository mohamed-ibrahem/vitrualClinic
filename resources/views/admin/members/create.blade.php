@extends ('layout.app', [
    'wrapper' => Form::open(['class' => 'form-horizontal', 'id' => 'register_member', 'route' => 'admin.members.store', 'files' => true]),
    'endOfWrapper' => form::close()
])

@section ('title', trans('general.createNew', ['page' => trans_choice('pages.admin.users.members.title', 1)]))

@section ('toolbar')
    <a href="{{ route('admin.members.index') }}" class="btn navbar-btn btn-default">
        @lang('general.cancel')
    </a>

    <button type="submit" class="btn green button-submit">
        Submit
        <i class="fa fa-check fa-fw"></i>
    </button>
@endsection


@section ('content')
    <div class="container">
        @include ('admin.members._form')
    </div>
@endsection
