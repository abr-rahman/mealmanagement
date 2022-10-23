<?php

namespace App\Http\Controllers;

use App\Models\Market;
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
                    $html .= '<a href="" id="edit" class="action-btn p-3" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>';
                    $html .= '</div>';
                    return $html;
                })
                ->editColumn('name', function ($row) {
                    return $row->relatioToMeal->name ?? 'N/A';
                })
                ->rawColumns(['action', 'name'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required'
        ]);
        $meal = new Market();
        $meal->name = $request->name;
        $meal->amount = $request->amount;
        $meal->formDate = $request->formDate;
        $meal->toDate = $request->toDate;
        $meal->save();

        return response()->json('Market list created successfully!');
    }
}
