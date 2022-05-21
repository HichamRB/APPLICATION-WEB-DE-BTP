<?php

namespace App\Http\Requests;

use App\Models\Slip;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSlipRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('slip_edit');
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
        ];
    }
}
