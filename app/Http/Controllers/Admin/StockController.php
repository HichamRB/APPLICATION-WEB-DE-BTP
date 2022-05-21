<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStockRequest;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\ContactCompany;
use App\Models\Product;
use App\Models\Project;
use App\Models\Site;
use App\Models\Stock;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StockController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('stock_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Stock::with(['product', 'supplier', 'project', 'site', 'validate_by'])->select(sprintf('%s.*', (new Stock())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'stock_show';
                $editGate = 'stock_edit';
                $deleteGate = 'stock_delete';
                $crudRoutePart = 'stocks';

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
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->editColumn('product.ref', function ($row) {
                return $row->product ? (is_string($row->product) ? $row->product : $row->product->ref) : '';
            });
            $table->editColumn('quantity_in', function ($row) {
                return $row->quantity_in ? $row->quantity_in : '';
            });
            $table->editColumn('quantity_out', function ($row) {
                return $row->quantity_out ? $row->quantity_out : '';
            });

            $table->addColumn('project_order_date', function ($row) {
                return $row->project ? $row->project->reference : '';
            });

            $table->editColumn('project.reference', function ($row) {
                return $row->project ? (is_string($row->project) ? $row->project : $row->project->reference) : '';
            });
            $table->editColumn('created_by', function ($row) {
                return $row->created_by ? $row->created_by : '';
            });
            $table->addColumn('validate_by_name', function ($row) {
                return $row->validate_by ? $row->validate_by->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product', 'project', 'validate_by']);

            return $table->make(true);
        }

        $products          = Product::get();
        $contact_companies = ContactCompany::get();
        $projects          = Project::get();
        $sites             = Site::get();
        $users             = User::get();

        return view('admin.stocks.index', compact('products', 'contact_companies', 'projects', 'sites', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('stock_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $suppliers = ContactCompany::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('reference', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sites = Site::all()->pluck('reference', 'id')->prepend(trans('global.pleaseSelect'), '');

        $validate_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.stocks.create', compact('products', 'suppliers', 'projects', 'sites', 'validate_bies'));
    }

    public function store(StoreStockRequest $request)
    {
        $stock = Stock::create($request->all());

        return redirect()->route('admin.stocks.index');
    }

    public function edit(Stock $stock)
    {
        abort_if(Gate::denies('stock_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $suppliers = ContactCompany::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $projects = Project::all()->pluck('reference', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sites = Site::all()->pluck('reference', 'id')->prepend(trans('global.pleaseSelect'), '');

        $validate_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stock->load('product', 'supplier', 'project', 'site', 'validate_by');

        return view('admin.stocks.edit', compact('products', 'suppliers', 'projects', 'sites', 'validate_bies', 'stock'));
    }

    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $stock->update($request->all());

        return redirect()->route('admin.stocks.index');
    }

    public function show(Stock $stock)
    {
        abort_if(Gate::denies('stock_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock->load('product', 'supplier', 'project', 'site', 'validate_by');

        return view('admin.stocks.show', compact('stock'));
    }

    public function destroy(Stock $stock)
    {
        abort_if(Gate::denies('stock_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock->delete();

        return back();
    }

    public function massDestroy(MassDestroyStockRequest $request)
    {
        Stock::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
