<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;
use App\Http\Resources\Admin\EmployeResource;
use App\Models\Employe;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('employe_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployeResource(Employe::with(['job'])->get());
    }

    public function store(StoreEmployeRequest $request)
    {
        $employe = Employe::create($request->all());

        if ($request->input('picture', false)) {
            $employe->addMedia(storage_path('tmp/uploads/' . basename($request->input('picture'))))->toMediaCollection('picture');
        }

        return (new EmployeResource($employe))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Employe $employe)
    {
        abort_if(Gate::denies('employe_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployeResource($employe->load(['job']));
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

        return (new EmployeResource($employe))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Employe $employe)
    {
        abort_if(Gate::denies('employe_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employe->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
