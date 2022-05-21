@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.slip.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.slips.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.slip.fields.id') }}
                        </th>
                        <td>
                            {{ $slip->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slip.fields.project') }}
                        </th>
                        <td>
                            {{ $slip->project->reference ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slip.fields.reference') }}
                        </th>
                        <td>
                            {{ $slip->reference }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slip.fields.created_by') }}
                        </th>
                        <td>
                            {{ $slip->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            
                <table class="table table-bordered table-striped" id="item_table">
                    <thead class="item-table-header">
                    <tr>
                        <th width="5%"></th>
                        <th width="10%" class="text-center">Référence</th>
                        <th width="20%" class="text-center">Description</th>
                        <th width="10%" class="text-center">Unit</th>
                        <th width="10%" class="text-center">Quantité min</th>
                        <th width="10%" class="text-center">Quantité max</th>
                        <th width="10%" class="text-center">Prix Unitaire</th>
                        <th width="10%"class="text-center">Prix Total min</th>
                        <th width="10%"class="text-center">Prix Total max</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($slip->slipitems as $item)

                        <tr class="item">
                            <td></td>
                         <td>{{ $item->reference_item }} </td>
                            
                         <td> {{ $item->description }}   </td>
                            
                         <td> {{ $item->unit }}          </td>
                           
                         <td> {{ $item->qte_min }}       </td>
                            
                         <td> {{ $item->qte_max }}       </td>
                            
                         <td>{{ $item->unit_price }}      </td>
                             
                         <td> {{ $item->total_price_min }} </td>
                           
                         <td> {{ $item->total_price_max }}  </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
          
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.slips.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
 @parent 
<script>
    $(document).ready(function() {
   // var groupColumn = 2;
    // var table = $('#item_table').DataTable({
    //     "columnDefs": [
    //         { "visible": false, "targets": groupColumn }
    //     ],
    //     "order": [[ groupColumn, 'asc' ]],
    //     "displayLength": 25,
    //     rowGroup: {
    //         endRender: function ( rows, group ) {
    //             var avg = rows
    //                 .data()
    //                 .pluck(6)
    //                 .reduce( function (a, b) {
    //                     return a + b.replace(/[^\d]/g, '')*1;
    //                 }, 0) / rows.count();
 
    //             return 'Average salary in '+group+': '+
    //                 $.fn.dataTable.render.number(',', '.', 0, '$').display( avg );
    //         },
    //         dataSrc: 3
    //     },
    //     "drawCallback": function ( settings ) {
    //         var api = this.api();
    //         var rows = api.rows( {page:'current'} ).nodes();
    //         var last=null;
 
    //         api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
    //             if ( last !== group ) {
    //                 $(rows).eq( i ).before(
    //                     '<tr class="group"><td colspan="8">'+group+'</td></tr>'
    //                 );
 
    //                 last = group;
    //             }
    //         } );
    //     }
    // } );

} );
</script>
@endsection