<?php

namespace App\Http\Requests;

use App\Models\Stock;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStockRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stock_create');
    }

    public function rules()
    {
        return [
            'quantity_in' => [
                'numeric',
            ],
            'quantity_out' => [
                'string',
                'nullable',
            ],
            'date_mvt' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'created_by' => [
                'string',
                'nullable',
            ],
        ];
    }
}
