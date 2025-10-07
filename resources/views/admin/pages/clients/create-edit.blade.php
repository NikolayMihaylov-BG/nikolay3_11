@extends('admin.layouts.app')

@php
    $model = null;
    $route = route('clients.store');
    $label = "Създай Клиент";

    if (isset($client))
    {
        $model = $client;
        $route = route('clients.update', [ 'client' => $client->id ]);
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

            @include('admin.partials.partners.form', [
                'model' => $model
            ])

            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Запази</button>
            </div>
        </form>
    </div>
@endsection
