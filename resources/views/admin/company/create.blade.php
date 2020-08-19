@extends('admin.layouts.main')

@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.company_create') }}</h5>
    </div>
    <div class="ibox-content">
        <form action="{{ route('admin.company.store') }}" enctype="multipart/form-data" method="POST" role="form">
            @csrf

            <div class="form-group">
                <label for="">{{ __('admin.company_name') }}</label>
                <input type="text" class="form-control" name="name" placeholder="{{ __('admin.company_name') }}"
                       value="{{ old('name') ?? '' }}">
            </div>
            <div class="form-group">
                <label for="">{{ __( 'admin.company_email') }}</label>
                <input type="email" class="form-control" name="email" placeholder="{{ __('admin.company_email') }}"
                       value="{{ old('email') ?? '' }}">
            </div>
            <div class="form-group">
                <label for="">{{ __( 'admin.company_logo') }}</label>
                <input type="file" class="form-control" name="logo" placeholder="{{ __( 'admin.company_logo') }}"
                       value="{{ old('logo') ?? '' }}"/>
            </div>
            <div class="form-group">
                <label for="">{{ __( 'admin.company_website') }}</label>
                <input type="url" class="form-control" name="website" placeholder="{{ __( 'admin.company_website') }}"
                       value="{{ old('website') ?? '' }}">
            </div>

            <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
        </form>
    </div>

@endsection
