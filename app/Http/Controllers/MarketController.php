<?php

namespace App\Http\Controllers;

use App\Models\Market;
use App\Models\Member;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MarketController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Market::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<div class="dropdown table-dropdown" id="accordion">';
                    $html .= '<a href="'. route('market.edit', $row->id) .'" id="EditMarket" class="action-btn p-3" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>';
                    $html .= '</div>';
                    return $html;
                })
                ->editColumn('member_id', function ($row) {
                    return $row->member->name ?? 'N/A';
                })
                ->rawColumns(['action', 'member_id'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'amount' => 'required',
            'formDate' => 'required'
        ]);
        $meal = new Market();
        $meal->member_id = $request->member_id;
        $meal->amount = $request->amount;
        $meal->formDate = $request->formDate;
        $meal->toDate = $request->toDate;
        $meal->save();

        return response()->json('Market list created successfully!');
    }
    public function edit($id){
        $members = Member::all();
        $market = Market::find($id);
        $selectedRole = Market::first()->member_id;
        // return $market;
        return view('partials.ajax_view.edit_market', compact('market', 'members', 'selectedRole'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'member_id' => 'required',
            'amount' => 'required'
        ]);
        $meal = Market::find($id);
        $meal->member_id = $request->member_id;
        $meal->amount = $request->amount;
        $meal->formDate = $request->formDate;
        $meal->toDate = $request->toDate;
        $meal->save();

        return response()->json('Market update successfully!');
    }
}
