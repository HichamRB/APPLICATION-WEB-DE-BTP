@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stock.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stocks.update", [$stock->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
            <div class="form-group col-md-6">
                <label for="product_id">{{ trans('cruds.stock.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id">
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $stock->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.product_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="supplier_id">{{ trans('cruds.stock.fields.supplier') }}</label>
                <select class="form-control select2 {{ $errors->has('supplier') ? 'is-invalid' : '' }}" name="supplier_id" id="supplier_id">
                    @foreach($suppliers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('supplier_id') ? old('supplier_id') : $stock->supplier->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('supplier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('supplier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.supplier_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="quantity_in">{{ trans('cruds.stock.fields.quantity_in') }}</label>
                <input class="form-control {{ $errors->has('quantity_in') ? 'is-invalid' : '' }}" type="number" name="quantity_in" id="quantity_in" value="{{ old('quantity_in', $stock->quantity_in) }}" step="0.01">
                @if($errors->has('quantity_in'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity_in') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.quantity_in_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="quantity_out">{{ trans('cruds.stock.fields.quantity_out') }}</label>
                <input class="form-control {{ $errors->has('quantity_out') ? 'is-invalid' : '' }}" type="number" name="quantity_out" id="quantity_out" value="{{ old('quantity_out', $stock->quantity_out) }}">
                @if($errors->has('quantity_out'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity_out') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.quantity_out_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="created_by">{{ trans('cruds.stock.fields.created_by') }}</label>
                <input class="form-control {{ $errors->has('created_by') ? 'is-invalid' : '' }}" type="text" name="created_by" id="created_by" value="{{ old('created_by', $stock->created_by) }}">
                @if($errors->has('created_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('created_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.created_by_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="date_mvt">{{ trans('cruds.stock.fields.date_mvt') }}</label>
                <input class="form-control datetime {{ $errors->has('date_mvt') ? 'is-invalid' : '' }}" type="text" name="date_mvt" id="date_mvt" value="{{ old('date_mvt', $stock->date_mvt) }}">
                @if($errors->has('date_mvt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_mvt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.date_mvt_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="project_id">{{ trans('cruds.stock.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id">
                    @foreach($projects as $id => $entry)
                        <option value="{{ $id }}" {{ (old('project_id') ? old('project_id') : $stock->project->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.project_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="site_id">{{ trans('cruds.stock.fields.site') }}</label>
                <select class="form-control select2 {{ $errors->has('site') ? 'is-invalid' : '' }}" name="site_id" id="site_id">
                    @foreach($sites as $id => $entry)
                        <option value="{{ $id }}" {{ (old('site_id') ? old('site_id') : $stock->site->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('site'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.site_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="validate_by_id">{{ trans('cruds.stock.fields.validate_by') }}</label>
                <select class="form-control select2 {{ $errors->has('validate_by') ? 'is-invalid' : '' }}" name="validate_by_id" id="validate_by_id">
                    @foreach($validate_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('validate_by_id') ? old('validate_by_id') : $stock->validate_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('validate_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('validate_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stock.fields.validate_by_helper') }}</span>
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