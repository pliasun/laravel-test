@extends('admin.layouts.main')

@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.employee_show') }}</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="name col-3">ID</div>
            <div class="item col-7">{{ $employee->id }}</div>
        </div>
        <div class="row">
            <div class="name col-3">{{ __('admin.employee_first_name') }}</div>
            <div class="item col-7">{{ $employee->first_name }}</div>
        </div>
        <div class="row">
            <div class="name col-3">{{ __( 'admin.employee_last_name') }}</div>
            <div class="item col-7">{{ $employee->last_name }}</div>
        </div>
        <div class="row">
            <div class="name col-3">{{ __( 'admin.company') }}</div>
            <div class="item col-7">{{ $employee->company->name  }}</div>
        </div>
        <div class="row">
            <div class="name col-3">{{ __( 'admin.employee_email') }}</div>
            <div class="item col-7">{{ $employee->email  }}</div>
        </div>
        <div class="row">
            <div class="name col-3">{{ __( 'admin.employee_phone') }}</div>
            <div class="item col-7">{{ $employee->phone  }}</div>
        </div>

    </div>

@endsection
