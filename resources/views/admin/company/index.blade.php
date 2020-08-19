@extends('admin.layouts.main')

@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.company_list') }}</h5>
        <div class="ibox-tools">
            <a href="{{ route('admin.company.create') }}">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <div class="table-responsive">
            @if($list->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>{{ __('admin.company_name') }}</th>
                        <th>{{ __( 'admin.employee') }}</th>
                        <th>{{ __( 'admin.company_email') }}</th>
                        <th>{{ __( 'admin.company_logo') }}</th>
                        <th>{{ __( 'admin.company_website') }}</th>
                        <th class="buttons__"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                [ {{ $item->employees()->count() }} ]
                                <a href="{{ route('admin.employee.create', [$item->id]) }}" title="{{ __('admin.employee_create') }}">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <a href="{{ route('admin.employee.index', [$item->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->logo }}</td>
                            <td>{{ $item->website }}</td>
                            <td class="buttons__">
                                <a href="{{ route('admin.company.show', [$item->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.company.edit', [$item->id]) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a class="btn btn-delete delete-alert"
                                   data-action="{{ route('admin.company.destroy',[$item->id]) }}"
                                   data-title="{{ __('admin.modal_delete_title') }}"
                                   data-text="{{ __('admin.modal_delete_company_text') }}"
                                   data-success="{{ __('admin.modal_delete_success') }}"
                                   data-error-title="{{ __('admin.modal_error_title') }}"
                                   data-error="{{ __('admin.modal_error') }}"
                                   href="#">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $list->links() }}
            @else
                {{ __('admin.data_error') }}
            @endif
        </div>
    </div>
@endsection

