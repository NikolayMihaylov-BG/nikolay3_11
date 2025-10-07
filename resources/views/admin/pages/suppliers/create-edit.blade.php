@extends('admin.layouts.app')

@php
    $model = null;
    $route = route('suppliers.store');
    $label = "Създай Доставчик";

    if (isset($supplier))
    {
        $model = $supplier;
        $route = route('suppliers.update', [ 'supplier' => $supplier->id ]);
        $label = "Обнови Доставчик";
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

            @include('admin.partials.partners.form', [
                'model' => $model
            ])

            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Запази</button>
            </div>
        </form>
    </div>
@endsection
