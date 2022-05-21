@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.contactCompany.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contact-companies.update", [$contactCompany->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
            <div class="form-group  col-md-6">
                <label class="required" for="company_name">{{ trans('cruds.contactCompany.fields.company_name') }}</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', $contactCompany->company_name) }}" required>
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contactCompany.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label>{{ trans('cruds.contactCompany.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ContactCompany::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $contactCompany->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contactCompany.fields.type_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="company_address">{{ trans('cruds.contactCompany.fields.company_address') }}</label>
                <input class="form-control {{ $errors->has('company_address') ? 'is-invalid' : '' }}" type="text" name="company_address" id="company_address" value="{{ old('company_address', $contactCompany->company_address) }}">
                @if($errors->has('company_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contactCompany.fields.company_address_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="company_email">{{ trans('cruds.contactCompany.fields.company_email') }}</label>
                <input class="form-control {{ $errors->has('company_email') ? 'is-invalid' : '' }}" type="text" name="company_email" id="company_email" value="{{ old('company_email', $contactCompany->company_email) }}">
                @if($errors->has('company_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contactCompany.fields.company_email_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="phone">{{ trans('cruds.contactCompany.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $contactCompany->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contactCompany.fields.phone_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="fax">{{ trans('cruds.contactCompany.fields.fax') }}</label>
                <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" id="fax" value="{{ old('fax', $contactCompany->fax) }}">
                @if($errors->has('fax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contactCompany.fields.fax_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="ice">{{ trans('cruds.contactCompany.fields.ice') }}</label>
                <input class="form-control {{ $errors->has('ice') ? 'is-invalid' : '' }}" type="text" name="ice" id="ice" value="{{ old('ice', $contactCompany->ice) }}">
                @if($errors->has('ice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contactCompany.fields.ice_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="rib">{{ trans('cruds.contactCompany.fields.rib') }}</label>
                <input class="form-control {{ $errors->has('rib') ? 'is-invalid' : '' }}" type="text" name="rib" id="rib" value="{{ old('rib', $contactCompany->rib) }}">
                @if($errors->has('rib'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rib') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contactCompany.fields.rib_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="company_website">{{ trans('cruds.contactCompany.fields.company_website') }}</label>
                <input class="form-control {{ $errors->has('company_website') ? 'is-invalid' : '' }}" type="text" name="company_website" id="company_website" value="{{ old('company_website', $contactCompany->company_website) }}">
                @if($errors->has('company_website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contactCompany.fields.company_website_helper') }}</span>
            </div>
            <div class="form-group col-md-8">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
            </div>
        </form>
    </div>
</div>



@endsection