@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.site.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sites.update", [$site->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
            <div class="form-group col-md-6">
                <label for="reference">{{ trans('cruds.site.fields.reference') }}</label>
                <input class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{ old('reference', $site->reference) }}">
                @if($errors->has('reference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.site.fields.reference_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="site_manager_id">{{ trans('cruds.site.fields.site_manager') }}</label>
                <select class="form-control select2 {{ $errors->has('site_manager') ? 'is-invalid' : '' }}" name="site_manager_id" id="site_manager_id">
                    @foreach($site_managers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('site_manager_id') ? old('site_manager_id') : $site->site_manager->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('site_manager'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_manager') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.site.fields.site_manager_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="address">{{ trans('cruds.site.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $site->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.site.fields.address_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="progress_level">{{ trans('cruds.site.fields.progress_level') }}</label>
                <input class="form-control {{ $errors->has('progress_level') ? 'is-invalid' : '' }}" type="number" name="progress_level" id="progress_level" value="{{ old('progress_level', $site->progress_level) }}" step="1">
                @if($errors->has('progress_level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('progress_level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.site.fields.progress_level_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="start_date">{{ trans('cruds.site.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $site->start_date) }}">
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.site.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="end_date">{{ trans('cruds.site.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $site->end_date) }}">
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.site.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection