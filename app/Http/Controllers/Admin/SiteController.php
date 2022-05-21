<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySiteRequest;
use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Models\Employe;
use App\Models\Site;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('site_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Site::with(['site_manager'])->select(sprintf('%s.*', (new Site())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'site_show';
                $editGate = 'site_edit';
                $deleteGate = 'site_delete';
                $crudRoutePart = 'sites';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('reference', function ($row) {
                return $row->reference ? $row->reference : '';
            });

            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->addColumn('site_manager_last_name', function ($row) {
                return $row->site_manager ? $row->site_manager->last_name : '';
            });

            $table->editColumn('site_manager.first_name', function ($row) {
                return $row->site_manager ? (is_string($row->site_manager) ? $row->site_manager : $row->site_manager->first_name) : '';
            });
            $table->editColumn('progress_level', function ($row) {
                return $row->progress_level ? $row->progress_level : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'site_manager']);

            return $table->make(true);
        }

        $employes = Employe::get();

        return view('admin.sites.index', compact('employes'));
    }

    public function create()
    {
        abort_if(Gate::denies('site_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $site_managers = Employe::all()->pluck('last_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sites.create', compact('site_managers'));
    }

    public function store(StoreSiteRequest $request)
    {
        $site = Site::create($request->all());

        return redirect()->route('admin.sites.index');
    }

    public function edit(Site $site)
    {
        abort_if(Gate::denies('site_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $site_managers = Employe::all()->pluck('last_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $site->load('site_manager');

        return view('admin.sites.edit', compact('site_managers', 'site'));
    }

    public function update(UpdateSiteRequest $request, Site $site)
    {
        $site->update($request->all());

        return redirect()->route('admin.sites.index');
    }

    public function show(Site $site)
    {
        abort_if(Gate::denies('site_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $site->load('site_manager');

        return view('admin.sites.show', compact('site'));
    }

    public function destroy(Site $site)
    {
        abort_if(Gate::denies('site_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $site->delete();

        return back();
    }

    public function massDestroy(MassDestroySiteRequest $request)
    {
        Site::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
