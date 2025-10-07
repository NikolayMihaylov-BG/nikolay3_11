@extends('admin.layouts.app')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title">Клиенти</div>
            <a href="{{ route('invoice_parameters.create') }}" class="btn btn-primary mb-2">Създай Клиент</a>
        </div>

        <div class="card-body">
            <table class="table table-bordered" role="table" data-table-route="{{ route('invoice_parameters.datatable') }}">
                <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Действия</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/admin/invoice_parameters/index.js')
@endpush
