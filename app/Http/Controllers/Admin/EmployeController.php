<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEmployeRequest;
use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;
use App\Models\Employe;
use App\Models\Job;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EmployeController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('employe_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Employe::with(['job'])->select(sprintf('%s.*', (new Employe())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'employe_show';
                $editGate = 'employe_edit';
                $deleteGate = 'employe_delete';
                $crudRoutePart = 'employes';

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
            $table->editColumn('picture', function ($row) {
                if ($photo = $row->picture) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : '';
            });
            $table->editColumn('mobile', function ($row) {
                return $row->mobile ? $row->mobile : '';
            });
            $table->addColumn('job_job_title', function ($row) {
                return $row->job ? $row->job->job_title : '';
            });

            $table->editColumn('cin', function ($row) {
                return $row->cin ? $row->cin : '';
            });
            $table->editColumn('salary_type', function ($row) {
                return $row->salary_type ? Employe::SALARY_TYPE_SELECT[$row->salary_type] : '';
            });
            $table->editColumn('salary', function ($row) {
                return $row->salary ? $row->salary : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'picture', 'job']);

            return $table->make(true);
        }

        $jobs = Job::get();

        return view('admin.employes.index', compact('jobs'));
    }

    public function create()
    {
        abort_if(Gate::denies('employe_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobs = Job::all()->pluck('job_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.employes.create', compact('jobs'));
    }

    public function store(StoreEmployeRequest $request)
    {
        $employe = Employe::create($request->all());

        if ($request->input('picture', false)) {
            $employe->addMedia(storage_path('tmp/uploads/' . basename($request->input('picture'))))->toMediaCollection('picture');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $employe->id]);
        }

        return redirect()->route('admin.employes.index');
    }

    public function edit(Employe $employe)
    {
        abort_if(Gate::denies('employe_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobs = Job::all()->pluck('job_title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employe->load('job');

        return view('admin.employes.edit', compact('jobs', 'employe'));
    }

    public function update(UpdateEmployeRequest $request, Employe $employe)
    {
        $employe->update($request->all());

        if ($request->input('picture', false)) {
            if (!$employe->picture || $request->input('picture') !== $employe->picture->file_name) {
                if ($employe->picture) {
                    $employe->picture->delete();
                }
                $employe->addMedia(storage_path('tmp/uploads/' . basename($request->input('picture'))))->toMediaCollection('picture');
            }
        } elseif ($employe->picture) {
            $employe->picture->delete();
        }

        return redirect()->route('admin.employes.index');
    }

    public function show(Employe $employe)
    {
        abort_if(Gate::denies('employe_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employe->load('job');

        return view('admin.employes.show', compact('employe'));
    }

    public function destroy(Employe $employe)
    {
        abort_if(Gate::denies('employe_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employe->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployeRequest $request)
    {
        Employe::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('employe_create') && Gate::denies('employe_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Employe();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
