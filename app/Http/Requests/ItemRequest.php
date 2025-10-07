<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use App\Enums\MeasurementUnit;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'integer', Rule::unique('items', 'code')->ignore($this->item?->id)],
            'name' => ['required', Rule::unique('items', 'name')->ignore($this->item?->id)],
            'unit' => ['required', new Enum(MeasurementUnit::class)],
            'qnt' => 'required|decimal:0,2',
//            'price_qnt' => 'required|decimal:0,2',
        ];
    }
}
