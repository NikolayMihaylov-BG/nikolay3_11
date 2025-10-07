@extends('admin.layouts.app')

@section('content')
    <div class="card card-primary card-outline mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title">Съставки</div>
            <a href="{{ route('items.create') }}" class="btn btn-primary mb-2">Създай</a>
        </div>

        <div class="card-body">
            <table class="table table-bordered" role="table" data-table-route="{{ route('items.datatable') }}">
                <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Количество</th>
                    <th>Мерна Единица</th>
                    <th>Действия</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/admin/items/index.js')
@endpush
