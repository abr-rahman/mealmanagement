<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Meal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Meal::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<div class="dropdown table-dropdown" id="accordion">';
                    // $html .= '<a href=" ' . route('meal.edit', [$row->id]) . ' " id="edit"  data-toggle="modal" data-target="#editModalmember" class="action-btn p-2" title="Edit"><i class="fa-solid fa-pen-to-square text-succss"></i></a>';
                    $html .= '<a href=" ' . route('meal.edit', [$row->id]) . '" id="edit" class="action-btn p-2"><i class="fa-solid fa-pen-to-square text-success"></i></a>';
                    $html .= '<a href="' . route('meal.destroy', $row->id) . '" id="delete" class=" action-btn p-2" title="Delete"><i class="fa-solid fa-trash-can text-danger"></i></a>';
                    $html .= '</div>';
                    return $html;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $all_names = Meal::all();
        // $all_names = DB::table('meals')->where('id', 'name')->first();
        return view('meal.index', compact('all_names'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        Meal::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);
        // session()->flash('success', 'created successfully');
        return response()->json('New member created successfully!');
    }
    public function edit($id)
    {
        $members = Meal::all();
        $newmember = Meal::where('id', $id)->first();

        return view('partials.ajax_view.edit_member', compact('newmember', 'members'));
    }
    public function destroy($id)
    {
        $mem = Meal::find($id);
        $mem->delete();
        return response()->json('Member deleted successfully!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $members = Meal::find($id);
        $members->name = $request->name;
        $members->email = $request->email;
        $members->phone = $request->phone;
        $members->address = $request->address;
        $members->save();
        return response()->json('Member update successfully!');
    }
}
