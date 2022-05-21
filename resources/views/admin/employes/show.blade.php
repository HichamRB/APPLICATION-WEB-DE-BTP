@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.employe.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.id') }}
                        </th>
                        <td>
                            {{ $employe->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.picture') }}
                        </th>
                        <td>
                            @if($employe->picture)
                                <a href="{{ $employe->picture->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $employe->picture->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.first_name') }}
                        </th>
                        <td>
                            {{ $employe->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.last_name') }}
                        </th>
                        <td>
                            {{ $employe->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.mobile') }}
                        </th>
                        <td>
                            {{ $employe->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.job') }}
                        </th>
                        <td>
                            {{ $employe->job->job_title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.birthday') }}
                        </th>
                        <td>
                            {{ $employe->birthday }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.cin') }}
                        </th>
                        <td>
                            {{ $employe->cin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.address') }}
                        </th>
                        <td>
                            {{ $employe->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.rib') }}
                        </th>
                        <td>
                            {{ $employe->rib }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.bank') }}
                        </th>
                        <td>
                            {{ App\Models\Employe::BANK_SELECT[$employe->bank] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.salary_type') }}
                        </th>
                        <td>
                            {{ App\Models\Employe::SALARY_TYPE_SELECT[$employe->salary_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.salary') }}
                        </th>
                        <td>
                            {{ $employe->salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.job_start') }}
                        </th>
                        <td>
                            {{ $employe->job_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.job_end') }}
                        </th>
                        <td>
                            {{ $employe->job_end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employe.fields.contract_type') }}
                        </th>
                        <td>
                            {{ App\Models\Employe::CONTRACT_TYPE_SELECT[$employe->contract_type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection