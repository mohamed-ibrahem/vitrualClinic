@extends ('layout.app', [
    'wrapper' => Form::open(['class' => 'form-horizontal', 'id' => 'register_doctor', 'route' => 'admin.doctors.store', 'files' => true]),
    'endOfWrapper' => form::close()
])

@section ('title', trans('general.createNew', ['page' => trans_choice('pages.admin.users.doctors.title', 1)]))

@section ('toolbar')
    <a href="{{ route('admin.doctors.index') }}" class="btn navbar-btn btn-default">
        @lang('general.cancel')
    </a>

    <button type="submit" class="btn green button-submit">
        Submit
        <i class="fa fa-check fa-fw"></i>
    </button>
@endsection


@section ('content')
    <div class="container">
        @include ('admin.doctors._form')
    </div>
@endsection
