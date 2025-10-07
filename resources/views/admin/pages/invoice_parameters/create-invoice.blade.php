@extends('admin.layouts.app')

@section('content')
    <form method="post" action="{{ route('invoice_parameters.generatepdf', [ 'invoice_parameter' => $invoiceParameter->id ])}}">
        @csrf

        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header"><div class="card-title">Данни за Фактура - {{ $invoiceParameter->name }}</div></div>
            <!--end::Header-->

            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-5">
                        <label for="invoice_number" class="form-label">Фактура Номер<span class="sr-only"></span></label>
                        <input type="text" class="form-control" id="invoice_number" name="invoice_number">
                    </div>
                    <div class="col-md-5">
                        <label for="creator" class="form-label">Съставил<span class="sr-only"></span></label>
                        <input type="text" class="form-control" id="creator" name="creator" value="Емилия Величкова">
                    </div>
                    <div class="col-md-2">
                        <label for="discount" class="form-label">Търговска отстъпка (%)<span class="sr-only"></span></label>
                        <input type="text" class="form-control" id="discount" name="discount">
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header"><div class="card-title">Атрикули</div></div>
            <!--end::Header-->

            <div id="dynamic-fields" class="card-body">
                <div class="row g-3 mt-0">
                    <div class="col-md-1">
                        <label for="invoice_number" class="form-label">Арт. Номер<span class="sr-only"></span></label>
                    </div>
                    <div class="col-md-7">
                        <label for="invoice_number" class="form-label">Наименование<span class="sr-only"></span></label>
                    </div>
                    <div class="col-md-1">
                        <label for="invoice_number" class="form-label">Мярка<span class="sr-only"></span></label>
                    </div>
                    <div class="col-md-1">
                        <label for="invoice_number" class="form-label">Количество<span class="sr-only"></span></label>
                    </div>
                    <div class="col-md-1">
                        <label for="invoice_number" class="form-label">Ед. Цена<span class="sr-only"></span></label>
                    </div>
                </div>

                <div class="row g-3 mt-0">
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="items[0][item_number]" placeholder="Арт. Номер">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="items[0][name]" placeholder="Наименование">
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="items[0][unit]" placeholder="Мярка">
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="items[0][qnt]" placeholder="Количество">
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="items[0][price_qnt]" placeholder="Ед. Цена">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger remove-row">X</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-success" type="button" id="add-row">Добави Артикул</button>
            <button class="btn btn-primary" type="submit">Създай Фактура</button>
        </div>
    </form>
@endsection

@push('scripts')
    @vite('resources/js/admin/invoice_parameters/invoice.js')
@endpush
