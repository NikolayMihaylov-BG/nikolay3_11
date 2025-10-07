@extends('admin.layouts.app')

@php
    $model = null;
    $route = route('items.store');
    $label = "Създай Материал";

    if (isset($item))
    {
        $model = $item;
        $route = route('items.update', [ 'item' => $item->id ]);
        $label = "Обнови Материал";
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
                    <div class="col-md-6">
                        <label for="code" class="form-label">Код<span
                                class="required-indicator sr-only"> (required)</span></label>
                        <input type="text" class="form-control" id="code" name="code"
                               value="{{ old('code', $model?->code) }}">
                        @error('code')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Наименование<span class="required-indicator sr-only"> (required)</span></label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{ old('name', $model?->name) }}">
                        @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="unit" class="form-label">Мерна Единица<span class="required-indicator sr-only"> (required)</span></label>
                        <select class="form-select" id="unit" name="unit">
                            @foreach(App\Enums\MeasurementUnit::cases() as $unit)
                                <option
                                    value="{{ $unit->value }}" @selected(old('unit', $model?->unit) == $unit->value)>
                                    {{ __("enum.$unit->value") }}
                                </option>
                            @endforeach
                        </select>
                        @error('unit')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="qnt" class="form-label">Разфасовка<span class="required-indicator sr-only"> (required)</span></label>
                        <input type="number" class="form-control" id="qnt" name="qnt" min="0" step=".01"
                               value="{{ old('qnt', $model?->qnt) }}">
                        @error('qnt')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
{{--                    <div class="col-md-4">--}}
{{--                        <label for="price_qnt" class="form-label">Цена за мерна единица<span--}}
{{--                                class="required-indicator sr-only"> (required)</span></label>--}}
{{--                        <input type="number" class="form-control" id="price_qnt" name="price_qnt" min="0" step=".01"--}}
{{--                               value="{{ old('price_qnt', $model?->price_qnt) }}">--}}
{{--                        @error('price_qnt')--}}
{{--                        <span class="invalid-feedback">{{ $message }}</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Запази</button>
            </div>
        </form>
    </div>
@endsection
