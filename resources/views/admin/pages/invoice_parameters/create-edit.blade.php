@extends('admin.layouts.app')

@php
    $model = null;
    $route = route('invoice_parameters.store');
    $label = "Създай Клиент";

    if (isset($invoiceParameter))
    {
        $model = $invoiceParameter;
        $route = route('invoice_parameters.update', [ 'invoice_parameter' => $invoiceParameter->id ]);
        $label = "Обнови Клиент";
    }
@endphp

@section('content')
    <div class="card card-info card-outline mb-4">
        <div class="card-header">
            <div class="card-title">{{ $label }}</div>
        </div>

        <form method="post" action="{{ $route }}">
            @csrf

            @if($model)
                @method('put')
            @endif

            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Наименование<span class="required-indicator sr-only"> (required)</span></label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name', $model?->name) }}">
                        @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="address" class="form-label">Адрес<span class="required-indicator sr-only"></span></label>
                        <input type="text" class="form-control" id="address" name="address"
                               value="{{ old('address', $model?->address) }}">
                        @error('address')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="manager" class="form-label">Управител (МОЛ)<span class="required-indicator sr-only"></span></label>
                        <input type="text" class="form-control" id="manager" name="manager"
                               value="{{ old('manager', $model?->manager) }}">
                        @error('manager')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="vat" class="form-label">ДДС Номер<span class="required-indicator sr-only"></span></label>
                        <input type="text" class="form-control" id="vat" name="vat"
                               value="{{ old('vat', $model?->vat) }}">
                        @error('vat')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="tin" class="form-label">Идентификационен Номер<span class="required-indicator sr-only"></span></label>
                        <input type="text" class="form-control" id="tin" name="tin"
                               value="{{ old('tin', $model?->tin) }}">
                        @error('tin')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="bank" class="form-label">Име на Банка<span class="required-indicator sr-only"></span></label>
                        <input type="text" class="form-control" id="bank" name="bank"
                               value="{{ old('bank', $model?->bank) }}">
                        @error('bank')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="bic" class="form-label">BIC Код на Банката<span class="required-indicator sr-only"></span></label>
                        <input type="text" class="form-control" id="bic" name="bic"
                               value="{{ old('bic', $model?->bic) }}">
                        @error('bic')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="iban" class="form-label">IBAN разплащателна сметка<span class="required-indicator sr-only"></span></label>
                        <input type="text" class="form-control" id="iban" name="iban"
                               value="{{ old('iban', $model?->iban) }}">
                        @error('iban')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Запази</button>
            </div>
        </form>
    </div>
@endsection
