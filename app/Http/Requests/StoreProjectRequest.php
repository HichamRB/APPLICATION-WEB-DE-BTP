<?php

namespace App\Http\Requests;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_create');
    }

    public function rules()
    {
        return [
            'reference' => [
                'string',
                'nullable',
            ],
            'order_date' => [
                'string',
                'nullable',
            ],
            'deadline_date' => [
                'string',
                'nullable',
            ],
            'type' => [
                'required',
            ],
        ];
    }
}
