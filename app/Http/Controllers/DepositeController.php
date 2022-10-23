<?php

namespace App\Http\Controllers;

use App\Models\Deposite;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepositeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Deposite::latest()->get();
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
            'name' => 'required'
        ]);
        $deposite = new Deposite();
        $deposite->name = $request->name;
        $deposite->amount = $request->amount;
        $deposite->date = $request->date;
        $deposite->save();
        return response()->json('Deposite added successfully!');
    }
}
