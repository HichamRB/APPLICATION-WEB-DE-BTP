<?php

namespace App\Http\Requests;

use App\Models\Slip;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySlipRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('slip_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:slips,id',
        ];
    }
}
