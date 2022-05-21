<?php

namespace App\Http\Requests;

use App\Models\Employe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmployeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employe_create');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            'mobile' => [
                'string',
                'required',
            ],
            'birthday' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'cin' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'rib' => [
                'string',
                'required',
            ],
            'salary_type' => [
                'required',
            ],
            'job_start' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'job_end' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
