<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySlipRequest;
use App\Http\Requests\MassDestroySlipItemsRequest;
use App\Http\Requests\StoreSlipRequest;
use App\Http\Requests\UpdateSlipRequest;
use App\Models\Project;
use App\Models\Slip;
use App\Models\SlipItem;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SlipController extends Controller
{
    protected $items;
    public function __construct(SlipItem $items)
    {
        
        $this->items   = $items;
    }
    public function index()
    {
        abort_if(Gate::denies('slip_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slips = Slip::with(['project', 'created_by','slipitems'])->get();

        $projects = Project::get();

        $users = User::get();

        return view('admin.slips.index', compact('slips', 'projects', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('slip_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('reference', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.slips.create', compact('projects', 'created_bies'));
    }

    public function store(StoreSlipRequest $request)
    {
        $slip = Slip::create($request->all()+ ['created_by_id'=> auth()->user()->id]);
        if($slip)
        {
              $items = json_decode($request->get('items'));
                foreach($items as $item){
                    $itemsData = array(
                        'slip_id'         => $slip->id,
                        'reference_item'  => $item->reference_item,
                        'description'     => $item->description,
                        'unit'            => $item->unit,
                        'unit_price'      => $item->unit_price,
                        'qte_min'         => $item->qte_min,
                        'qte_max'         => $item->qte_max,
                        'total_price_min' => $item->total_price_min,
                        'total_price_max' => $item->total_price_max,
                    );
                  
                  $items=SlipItem::create($itemsData);
        }
        return redirect()->route('admin.slips.index');
    }
    
    }

    public function edit(Slip $slip)
    {
        abort_if(Gate::denies('slip_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('reference', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $slip->load('project', 'created_by');

        $slip_items=SlipItem::all();

        return view('admin.slips.edit', compact('projects', 'created_bies', 'slip','slip_items'));
    }

    public function update(UpdateSlipRequest $request,Slip $slip)
    {
      //  $items =SlipItem::find($id);
      //  $slip =Slip::find($id);
        $slip->update($request->all()+ ['created_by_id'=> auth()->user()->id]);
        if($slip)
        {
              $items = json_decode($request->get('items'));
                foreach($items as $item){
                    $itemsData = array(
                        'slip_id'         => $slip->id,
                        'reference_item'  => $item->reference_item,
                        'description'     => $item->description,
                        'unit'            => $item->unit,
                        'unit_price'      => $item->unit_price,
                        'qte_min'         => $item->qte_min,
                        'qte_max'         => $item->qte_max,
                        'total_price_min' => $item->total_price_min,
                        'total_price_max' => $item->total_price_max,
                    );
                   $items=SlipItem::find($item->item_id);
                    if($items)
                   $items->update($itemsData);
                   else
                   $items=SlipItem::create($itemsData);
       }
      
    } ;
        return redirect()->route('admin.slips.index');
    }

    public function show(Slip $slip)
    {
        abort_if(Gate::denies('slip_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slip->load('project', 'created_by');

        return view('admin.slips.show', compact('slip'));
    }

    public function destroy(Slip $slip)
    {
        abort_if(Gate::denies('slip_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slip->delete();

        return back();
    }

    public function massDestroy(MassDestroySlipRequest $request)
    {
        Slip::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function deleteItem($id)
    {
        
        SlipItem::find($id)->delete();
        session()->flash('success', 'bien Supprimée!');
        return redirect()->back();

    return response(null, Response::HTTP_NO_CONTENT);
    }
}
