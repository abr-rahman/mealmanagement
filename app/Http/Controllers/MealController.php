<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Meal;
use App\Models\Market;
use App\Models\Count_meals;
use App\Models\Deposite;
use App\Models\Details;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class MealController extends Controller
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
                    // $html .= '<a href="" id="edit" class="action-btn p-2"><i class="fa-solid fa-pen-to-square text-success"></i></a>';
                    $html .= '<a href="'. route('meal.destroy', $row->id) .'" id="delete" data-original-title="Delete" class=" action-btn p-2" title="Delete"><i class="fa-solid fa-trash-can text-danger"></i></a>';
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
    public function detailsIndex(Request $request){
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
                // ->editColumn('total', function ($row) {
                //     return $row->breakfast + $row->lunch + $row->dinner;
                // })
                // ->setRowData([
                //     'total' => function ($row) {
                //         return 'row-' . $row->id;
                //     },
                // ])
                ->editColumn('name', function ($row) {
                    // Log::info($row->relatioToMeal);
                    return $row->relatioToMeal->name ?? 'N/A';
                })
                ->rawColumns(['action', 'name'])
                ->make(true);
        }
    }
    public function mealsDatatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Count_meals::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<div class="dropdown table-dropdown" id="accordion">';
                    $html .= '<a href="" id="edit" class="action-btn p-3" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>';
                    $html .= '</div>';
                    return $html;
                })
                ->editColumn('total', function($row){
                   return $row->breakfast + $row->lunch + $row->dinner;

                })
                ->setRowData([
                    'total' => function ($row) {
                        return 'row-' . $row->id;
                    },
                ])
                ->editColumn('name', function($row){
                    // Log::info($row->relatioToMeal);
                    return $row->relatioToMeal->name ?? 'N/A';
                })
                ->rawColumns(['action', 'name'])
                ->make(true);
        }
    }
    public function marketIndex(Request $request)
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
                ->editColumn('name', function($row){
                    return $row->relatioToMeal->name ?? 'N/A';
                })
                ->rawColumns(['action', 'name'])
                ->make(true);
        }
    }
    public function depositeIndex(Request $request)
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
                ->editColumn('name', function($row){
                    return $row->relatioToMeal->name ?? 'N/A';
                })
                ->rawColumns(['action', 'name'])
                ->make(true);
        }
    }

    public function mealStore(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $meal = new Count_meals();
        $meal->name = $request->name;
        $meal->breakfast = $request->breakfast;
        $meal->lunch = $request->lunch;
        $meal->dinner = $request->dinner;
        $meal->date = $request->date;
        $meal->save();
        // session()->flash('success', 'created successfully');
        return back();
    }
    public function depositeStore(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $deposite = new Deposite();
        $deposite->name = $request->name;
        $deposite->amount = $request->amount;
        $deposite->date = $request->date;
        $deposite->save();
        // session()->flash('success', 'created successfully');
        return back();
    }
    public function marketStore(Request $request)
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

        return back();
    }
    public function create()
    {
        //
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
        // return response()->json('success','Added successfully!');
        // return ['success'=>true,'message'=>'data insert success'];
        return back();
    }

    public function show(Request $request, $id)
    {

    }

    public function edit($id)
    {
        // $newmembers = Meal::find($id)->get();

        return view('meal.ajax_view.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Meal::find($id)->delete($id);
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
