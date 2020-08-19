@extends('admin.layouts.main')

@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.company_show') }}</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="name col-3">ID</div>
            <div class="item col-7">{{ $company->id }}</div>
        </div>
        <div class="row">
            <div class="name col-3">{{ __('admin.company_name') }}</div>
            <div class="item col-7">{{ $company->name }}</div>
        </div>
        <div class="row">
            <div class="name col-3">{{ __( 'admin.company_email') }}</div>
            <div class="item col-7">{{ $company->email }}</div>
        </div>
        <div class="row">
            <div class="name col-3">{{ __( 'admin.company_logo') }}</div>
            @if ($company->logo)
                <div class="item col-7">
                    <img src="{{ $company->logo }}" alt="{{ $company->name }}"/>
                </div>
            @else
                <div class="item col-7"></div>
            @endif

        </div>
        <div class="row">
            <div class="name col-3">{{ __( 'admin.company_website') }}</div>
            <div class="item col-7">{{ $company->website }}</div>
        </div>
    </div>

@endsection
