<?php

namespace App\Http\Requests;

use App\Models\Slip;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSlipRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('slip_create');
    }

    public function rules()
    {
        return [
            'project_id' => [
                'required',
                'integer',
            ],
            'reference' => [
                'string',
                'nullable',
            ],
            'created_by_id' => [
                'integer',
                'nullable',
            ],
        ];
    }
}
