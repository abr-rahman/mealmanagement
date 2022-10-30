<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Meal;
use App\Models\Member;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Member::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<div class="dropdown table-dropdown" id="accordion">';
                    $html .= '<a href=" ' . route('member.edit', [$row->id]) . '" id="edit" class="action-btn p-2"><i class="fa-solid fa-pen-to-square text-success"></i></a>';
                    $html .= '<a href="' . route('member.destroy', $row->id) . '" id="delete" class=" action-btn p-2" title="Delete"><i class="fa-solid fa-trash-can text-danger"></i></a>';
                    $html .= '</div>';
                    return $html;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $all_names = Member::all();
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

        Member::create([
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
        $members = Member::all();
        $newmember = Member::where('id', $id)->first();

        return view('partials.ajax_view.edit_member', compact('newmember', 'members'));
    }
    public function destroy($id)
    {
        // $member = Member::find($id);

        $member = Member::with(['meal'])->where('id', $id)->first();

        if(count($member->meal) > 0) {
            return response()->json(['errorMsg' => 'Can not delete member']);
        }

        $member->delete();
        return response()->json('Member deleted successfully!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $members = Member::find($id);
        $members->name = $request->name;
        $members->email = $request->email;
        $members->phone = $request->phone;
        $members->address = $request->address;
        $members->save();
        return response()->json('Member update successfully!');
    }

    public function recycle(){
        $members = Member::onlyTrashed()->get();
        return view('partials.ajax_view.recycle', compact('members'));
    }
    public function restore($id){
        Member::onlyTrashed()->where('id', $id)->restore();
        return response()->json('Member restore successfully!');
    }
    public function force_delete($id){
        Member::onlyTrashed()->where('id', $id)->forceDelete();
        return response()->json('Member permanent delete successfully!');
    }
}
