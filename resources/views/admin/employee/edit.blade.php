@extends('admin.layouts.main')

@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.employee_edit') }}</h5>
    </div>
    <div class="ibox-content">
        <form action="{{ route('admin.employee.update', [$company->id, $employee->id]) }}" enctype="multipart/form-data" method="POST" role="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">{{ __('admin.employee_first_name') }}</label>
                <input type="text" class="form-control" name="first_name" placeholder="{{ __('admin.employee_first_name') }}"
                       value="{{ old('first_name') ?? $employee->first_name ?? '' }}">
            </div>
            <div class="form-group">
                <label for="">{{ __( 'admin.employee_last_name') }}</label>
                <input type="text" class="form-control" name="last_name" placeholder="{{ __('admin.employee_last_name') }}"
                       value="{{ old('last_name') ?? $employee->last_name ?? '' }}">
            </div>
            <div class="form-group">
                <label for="">{{ __( 'admin.employee_email') }}</label>
                <input type="text" class="form-control" name="email" placeholder="{{ __('admin.employee_email') }}"
                       value="{{ old('email') ?? $employee->email ?? '' }}">
            </div>
            <div class="form-group">
                <label for="">{{ __( 'admin.employee_phone') }}</label>
                <input type="tel" class="form-control" name="phone" placeholder="{{ __('admin.employee_phone') }}"
                       value="{{ old('phone') ?? $employee->phone ?? '' }}">
            </div>


            <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
        </form>
    </div>

@endsection
