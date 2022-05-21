@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.slip.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.slips.store") }}" enctype="multipart/form-data" id="slip_form" data-toggle="validator">
            @csrf
            <div class="row slip">
                <div class="form-group col-md-6">
                    <label for="reference">{{ trans('cruds.slip.fields.reference') }}</label>
                    <input class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{ old('reference', '') }}">
                    @if($errors->has('reference'))
                        <div class="invalid-feedback">
                            {{ $errors->first('reference') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.slip.fields.reference_helper') }}</span>
                </div>
            <div class="form-group col-md-6">
                <label class="required" for="project_id">{{ trans('cruds.slip.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id" required>
                    @foreach($projects as $id => $entry)
                        <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.slip.fields.project_helper') }}</span>
            </div>
            <div class="container-fluid p-4">
                <div class="card">
                  <h3 class="card-header">
                    Les elements de Bordereau
                  </h3>
                  <div class="card-body">
              
                    {{-- <p class="text-muted card-text">
                      <small>* Les champs dotés d'une astérisque sont obligatoires.</small>
                    </p> --}}
                    <div class="col-md-12">
                        <table class="table table-striped" id="item_table">
                            <thead class="item-table-header">
                            <tr>
                                <th width="2%"></th>
                                <th width="10%" class="required">Référence</th>
                                <th width="20%">Description</th>
                                <th width="10%">Unit</th>
                                <th width="10%" class="text-center">Quantité min</th>
                                <th width="10%" class="text-center">Quantité max</th>
                                <th width="10%" class="text-center">Prix Unitaire</th>
                                <th width="10%"class="text-right">Prix Total min</th>
                                <th width="10%"class="text-right">Prix Total max</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr class="item">
                                    <td></td>
                                    <td>
                                        <input class="form-control {{ $errors->has('reference_item') ? 'is-invalid' : '' }}" type="text" name="reference_item" id="reference_item" value="{{ old('reference_item', '') }}">
                   
                                    </td>
                                    <td><textarea class="form-control input-sm {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="1" type="text" name="description" id="description" value="{{ old('description', '') }}" style="resize: vertical; text-transform: capitalize;"></textarea></td>
                                    <td>
                                        <select class="form-control {{ $errors->has('unit') ? 'is-invalid' : '' }}" name="unit" id="unit">
                                            <option value disabled {{ old('unit', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\Models\SlipItem::UNIT_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('unit', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('unit'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('unit') }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <input class="form-control calcEvent {{ $errors->has('qte_min') ? 'is-invalid' : '' }}" type="text" name="qte_min" id="qte_min" value="{{ old('qte_min', '') }}">
                   
                                    </td>
                                    <td>
                                        <input class="form-control calcEvent {{ $errors->has('qte_max') ? 'is-invalid' : '' }}" type="text" name="qte_max" id="qte_max" value="{{ old('qte_max', '') }}">
                   
                                    </td>
                                    <td>
                                        <input class="form-control calcEvent {{ $errors->has('unit_price') ? 'is-invalid' : '' }}" type="text" name="unit_price" id="unit_price" value="{{ old('unit_price', '') }}">
                   
                                    </td> 
                                    <td>
                                        <input class="form-control {{ $errors->has('total_price_min') ? 'is-invalid' : '' }}" type="text" name="total_price_min" id="total_price_min" disabled value="0.00">
                                   </td>
                                   <td>
                                    <input class="form-control {{ $errors->has('total_price_max') ? 'is-invalid' : '' }}" type="text" name="total_price_max" id="total_price_max" disabled value="0.00">
                               </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>   
                    <div class="col-md-6">
                        <span id="btn_add_row" class="btn btn-xs btn-info btn_add_row"><i class="fa fa-plus"></i> Ajouter une Ligne</span>
                       </div>
                </div></div>
            <div class="form-group col-md-6">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
 @parent 
 @include('admin.slips.partials.slips_js')
    
@endsection