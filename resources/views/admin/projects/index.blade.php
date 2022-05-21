@extends('layouts.admin')
<style>
    table.dataTable thead th {
    vertical-align: bottom;
    border-bottom: 2px solid;
    border-bottom: 2px solid ;
    }
    table.dataTable thead td {
    vertical-align: bottom;
    border-bottom: 2px solid;
    }
    .dataTables_wrapper .dataTables_length {
    float: left;
    color: black !important;
    }

div.dataTables_wrapper div.dataTables_filter label {
    font-weight: normal;
    white-space: nowrap;
    text-align: left;
    color: black !important;
}
div.dataTables_wrapper div.dataTables_info{
color: black !important;
}

    </style>
@section('content')
<body style="background-image: url(https://agrinova.ma/wp-content/uploads/2020/01/Background-website-01.jpg); ">
@can('project_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.projects.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.project.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card" style="border-color:#2eaacc !important ;color: black;">
    <div class="card-header" style="  color:black;">
        {{ trans('cruds.project.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body" style=" color:black;">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Project" style="color: black; border: 1px solid;
        ">
            <thead style="color:black;">
                <tr>
                    <th width="10" style="border-bottom: 2px solid ">

                    </th>
                    <th style="border-bottom: 2px solid ">
                        {{ trans('cruds.project.fields.id') }}
                    </th>
                    <th style="border-bottom: 2px solid ">
                        {{ trans('cruds.project.fields.reference') }}
                    </th>
                    <th style="border-bottom: 2px solid ">
                        {{ trans('cruds.project.fields.order_date') }}
                    </th>
                    <th style="border-bottom: 2px solid ">
                        {{ trans('cruds.project.fields.deadline_date') }}
                    </th >
                    <ths style="border-bottom: 2px solid ">
                        {{ trans('cruds.project.fields.client') }}
                    </th>
                    <th style="border-bottom: 2px solid ">
                        {{ trans('cruds.project.fields.type') }}
                    </th>
                    <th style="border-bottom: 2px solid ">
                        {{ trans('cruds.project.fields.project_chef') }}
                    </th>
                    <th style="border-bottom: 2px solid ">
                        {{ trans('cruds.project.fields.status') }}
                    </th>
                    <th style="border-bottom: 2px solid ">
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid ">
                    </td>
                    <td style="border-bottom: 1px solid ">
                    </td>
                    <td style="border-bottom: 1px solid ">
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td style="border-bottom: 1px solid ">
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td style="border-bottom: 1px solid ">
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td style="border-bottom: 1px solid ">
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($contact_companies as $key => $item)
                                <option value="{{ $item->company_name }}">{{ $item->company_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td style="border-bottom: 1px solid ">
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Project::TYPE_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td style="border-bottom: 1px solid ">
                    </td>
                    <td style="border-bottom: 1px solid ">
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Models\Project::STATUS_SELECT as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td style="border-bottom: 1px solid ">
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('project_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.projects.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.projects.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'reference', name: 'reference' },
{ data: 'order_date', name: 'order_date' },
{ data: 'deadline_date', name: 'deadline_date' },
{ data: 'client_company_name', name: 'client.company_name' },
{ data: 'type', name: 'type' },
{ data: 'project_chef_last_name', name: 'project_chef.last_name' },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-Project').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
</body>
@endsection
