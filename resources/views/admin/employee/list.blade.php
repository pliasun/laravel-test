@extends('admin.layouts.main')

@section('content')
    <div class="ibox-title">
        <h5>{{ __('admin.employee_list') }}</h5>
    </div>
    <div class="ibox-content">
        <div class="table-responsive">
            @if($list->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>{{ __('admin.employee_first_name') }}</th>
                        <th>{{ __( 'admin.employee_last_name') }}</th>
                        <th>{{ __( 'admin.company') }}</th>
                        <th>{{ __( 'admin.employee_email') }}</th>
                        <th>{{ __( 'admin.employee_phone') }}</th>
                        <th class="buttons__"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->first_name }}</td>
                            <td>{{ $item->last_name }}</td>
                            <td>{{ $item->company->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td class="buttons__">
                                <a href="{{ route('admin.employee.show', [$item->company->id,$item->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.employee.edit', [$item->company->id,$item->id]) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a class="btn btn-delete delete-alert"
                                   data-action="{{ route('admin.employee.destroy',[$item->company->id,$item->id]) }}"
                                   data-title="{{ __('admin.modal_delete_title') }}"
                                   data-text="{{ __('admin.modal_delete_employee_text') }}"
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

