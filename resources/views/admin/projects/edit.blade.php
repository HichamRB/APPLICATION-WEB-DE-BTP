@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.project.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.projects.update", [$project->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
            <div class="form-group col-md-6">
                <label for="reference">{{ trans('cruds.project.fields.reference') }}</label>
                <input class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{ old('reference', $project->reference) }}">
                @if($errors->has('reference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.reference_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label class="required">{{ trans('cruds.project.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Project::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $project->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.type_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="order_date">{{ trans('cruds.project.fields.order_date') }}</label>
                <input class="form-control date {{ $errors->has('order_date') ? 'is-invalid' : '' }}" type="text" name="order_date" id="order_date" value="{{ old('order_date', $project->order_date) }}">
                @if($errors->has('order_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.order_date_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="deadline_date">{{ trans('cruds.project.fields.deadline_date') }}</label>
                <input class="form-control date {{ $errors->has('deadline_date') ? 'is-invalid' : '' }}" type="text" name="deadline_date" id="deadline_date" value="{{ old('deadline_date', $project->deadline_date) }}">
                @if($errors->has('deadline_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deadline_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.deadline_date_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="client_id">{{ trans('cruds.project.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $project->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.client_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="project_chef_id">{{ trans('cruds.project.fields.project_chef') }}</label>
                <select class="form-control select2 {{ $errors->has('project_chef') ? 'is-invalid' : '' }}" name="project_chef_id" id="project_chef_id">
                    @foreach($project_chefs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('project_chef_id') ? old('project_chef_id') : $project->project_chef->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_chef'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_chef') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.project_chef_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label>{{ trans('cruds.project.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Project::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $project->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.status_helper') }}</span>
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