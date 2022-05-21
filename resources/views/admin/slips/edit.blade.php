@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.slip.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.slips.update", [$slip->id]) }}" id="slip_form" enctype="multipart/form-data" data-toggle="validator">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="reference">{{ trans('cruds.slip.fields.reference') }}</label>
                    <input class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{ old('reference', $slip->reference) }}">
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
                        <option value="{{ $id }}" {{ (old('project_id') ? old('project_id') : $slip->project->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                                <th width="5%"></th>
                                <th width="10%" class="required">Référence</th>
                                <th width="20%" class="required">Description</th>
                                <th width="10%">Unit</th>
                                <th width="10%" class="text-center">Quantité min</th>
                                <th width="10%" class="text-center">Quantité max</th>
                                <th width="10%" class="text-center">Prix Unitaire</th>
                                <th width="10%"class="text-right">Prix Total min</th>
                                <th width="10%"class="text-right">Prix Total max</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($slip->slipitems as $item)

                                <tr class="item">
                                    <td>
                                        {{-- <form action="{{ route('admin.slips.deleteItem', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="supprimer">
                                        </form> --}}
                                        {{-- <span class="btn btn-danger btn-xs deleteItem" data-id="{{ $item->id }}" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"><i class="fa fa-trash"></i> --}}
                                            <input type="hidden" name="item_id" id="item_id" value="{{ old('item_id', $item->id) }}" >
                                        {{-- </span> --}}
                                        <a id="delete-items" href="javascript:void(0)" onclick="toggleDelete({{ old('item_id', $item->id) }})" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td>
                                        <input class="form-control {{ $errors->has('reference_item') ? 'is-invalid' : '' }}" type="text" name="reference_item" id="reference_item" value="{{ old('reference_item', $item->reference_item) }}" required>
                   
                                    </td>
                                    <td><textarea class="form-control input-sm {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" rows="1" value="{{ old('description', $item->description) }}" style="resize: vertical; text-transform: capitalize;">{{ old('description',$item->description) }}</textarea>
                                    </td>
                                    <td>
                                        <select class="form-control {{ $errors->has('unit') ? 'is-invalid' : '' }}" name="unit" id="unit">
                                            <option value disabled {{ old('unit', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\Models\SlipItem::UNIT_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('unit', $item->unit) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('unit'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('unit') }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <input class="form-control calcEvent {{ $errors->has('qte_min') ? 'is-invalid' : '' }}" type="text" name="qte_min" id="qte_min" value="{{ old('qte_min', $item->qte_min) }}">
                   
                                    </td>
                                    <td>
                                        <input class="form-control calcEvent {{ $errors->has('qte_max') ? 'is-invalid' : '' }}" type="text" name="qte_max" id="qte_max" value="{{ old('qte_max', $item->qte_max) }}">
                                   </td>
                                    <td>
                                        <input class="form-control calcEvent {{ $errors->has('unit_price') ? 'is-invalid' : '' }}" type="text" name="unit_price" id="unit_price" value="{{ old('unit_price', $item->unit_price) }}">
                   
                                    </td> 
                                    <td>
                                        <input class="form-control {{ $errors->has('total_price_min') ? 'is-invalid' : '' }}" type="text" name="total_price_min" id="total_price_min" disabled value="{{ old('total_price_min', $item->total_price_min) }}">
                                   </td>
                                   <td>
                                    <input class="form-control {{ $errors->has('total_price_max') ? 'is-invalid' : '' }}" type="text" name="total_price_max" id="total_price_max" disabled value="{{ old('total_price_max', $item->total_price_max) }}">
                               </td>
                                </tr>
                                @endforeach
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
        </form>
    </div>
</div>

<div class="modal fade" id="exampleModal" style="display:none;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Etes-vous sûr de supprimer  ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Annuler</button>
                <button type="button" onclick="deleteProject()" class="btn btn-danger">Supprimer</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
 @parent 

 @include('admin.slips.partials.slips_js')

@endsection