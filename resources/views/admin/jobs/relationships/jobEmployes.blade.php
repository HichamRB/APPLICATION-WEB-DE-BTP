@can('employe_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.employes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.employe.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.employe.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-jobEmployes">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.employe.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.employe.fields.picture') }}
                        </th>
                        <th>
                            {{ trans('cruds.employe.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.employe.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.employe.fields.mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.employe.fields.job') }}
                        </th>
                        <th>
                            {{ trans('cruds.employe.fields.cin') }}
                        </th>
                        <th>
                            {{ trans('cruds.employe.fields.salary_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.employe.fields.salary') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employes as $key => $employe)
                        <tr data-entry-id="{{ $employe->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $employe->id ?? '' }}
                            </td>
                            <td>
                                @if($employe->picture)
                                    <a href="{{ $employe->picture->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $employe->picture->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $employe->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $employe->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $employe->mobile ?? '' }}
                            </td>
                            <td>
                                {{ $employe->job->job_title ?? '' }}
                            </td>
                            <td>
                                {{ $employe->cin ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Employe::SALARY_TYPE_SELECT[$employe->salary_type] ?? '' }}
                            </td>
                            <td>
                                {{ $employe->salary ?? '' }}
                            </td>
                            <td>
                                @can('employe_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.employes.show', $employe->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('employe_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.employes.edit', $employe->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('employe_delete')
                                    <form action="{{ route('admin.employes.destroy', $employe->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('employe_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.employes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-jobEmployes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('div#sidebar').on('transitionend', function(e) {
    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
  })
  
})

</script>
@endsection