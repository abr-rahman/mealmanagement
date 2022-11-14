<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Member;
use App\Models\Details;
use App\Models\Deposite;
use App\Models\Meal;
use App\Service\MealServiceInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MealController extends Controller
{
    private MealServiceInterface $mealService;
    public function __construct(MealServiceInterface $mealService)
    {
        $this->mealService = $mealService;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Meal::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<div class="dropdown table-dropdown" id="accordion">';
                    $html .= '<a href=" ' . route('meal.edit', $row->id) . '" id="EditMeal" class="action-btn p-2"><i class="fa-solid fa-pen-to-square text-success"></i></a>';
                    $html .= '</div>';
                    return $html;
                })
                ->editColumn('total', function ($row) {
                    return $row->breakfast + $row->lunch + $row->dinner;
                })
                ->editColumn('member_id', function ($row) {
                    return $row->member->name ?? 'N/A';
                })
                ->setRowData([
                    'total' => function ($row) {
                        return 'row' . $row->id;
                    },
                ])
                ->rawColumns(['action', 'name', 'member_id'])
                ->make(true);
        }
    }
    public function store(Request $request)
    {


        // $request->validate([
        //     'member_id' => 'required'
        // ]);


        foreach($request->member_id as $key => $value){
            $data = new Meal();
            $data->member_id = $request->member_id[$key];
            $data->breakfast = (isset($request->breakfast[$key]) && $request->breakfast[$key]) ? 1 : 0;
            $data->lunch = (isset($request->lunch[$key]) && $request->lunch[$key]) ? 1 : 0;
            $data->dinner = (isset($request->dinner[$key]) && $request->dinner[$key]) ? 1 : 0;
            $data->save();
        }



        // $total = count($request->member_id);
        // for($i = 0; $i < $total; $i++) {
        //     $meal = new Meal();
        //     $meal->member_id = isset($request->member_id[$i]) ? $request->member_id[$i] : 0;
        //     $meal->breakfast = isset($request->breakfast[$i]) && $request->breakfast[$i] == 'on' ? 1 : 0;
        //     $meal->lunch = isset($request->lunch[$i]) && $request->lunch[$i] == 'on' ? 1 : 0;
        //     $meal->dinner = isset($request->dinner[$i]) && $request->dinner[$i] == 'on' ? 1 : 0;

        //     $meal->date = isset($request->date[$i]) ? $request->date[$i] : 0;
        //     \Log::info('For member id: ' . $meal->member_id . PHP_EOL);
        //     \Log::info($meal);
        //     $meal->save();
        // }
        return response()->json('Meal added successfully!');

        // foreach ($enroll_no as $key => $no) {
        //     $input['no'] = $no;
        //     $input['breakfast'] = $breakfast[$key];
        //     $input['lunch'] = $lunch[$key];
        //     $input['dinner'] = $dinner[$key];
        //     $input['date'] = $lunch[$date];

        //     Meal::create($input);
        // }

    }
    public function edit($id){
        $members = Member::all();
        $newmember = Meal::where('id', $id)->first();
        return view('partials.ajax_view.edit_meal', compact('members', 'newmember'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'member_id' => 'required'
        ]);
        $meal = Meal::find($id);
        $meal->member_id = $request->member_id;
        $meal->breakfast = $request->breakfast;
        $meal->lunch = $request->lunch;
        $meal->dinner = $request->dinner;
        $meal->date = $request->date;
        $meal->save();
        return response()->json('Meal updated successfully!');
    }
    public function detailsIndex(Request $request){

        $startDate = '2022-10-01';
        $endDate = '2022-11-10';

        [
            'report' => $data,
        ] = $this->mealService->getReportByDateRange($startDate, $endDate);

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<div class="dropdown table-dropdown" id="accordion">';
                    $html .= '<a href=" ' . route('meal.edit', $row->id) . '" id="EditMeal" class="action-btn p-2"><i class="fa-solid fa-pen-to-square text-success"></i></a>';
                    $html .= '</div>';
                    return $html;
                })
                ->editColumn('name', function ($row) {
                    return $row->name ?? 'N/A';
                })
                ->addColumn('paid', function($row) {
                    return $row->paid;
                })
                ->addColumn('total_meal', function($row) {
                    return $row->total_meal;
                })
                ->addColumn('meal_cost', function($row) {
                    return $row->meal_cost;
                })
                ->addColumn('status', function($row) {
                    return $row->status;
                })
                ->rawColumns(['action', 'name', 'paid', 'total_meal', 'meal_cost', 'status'])
                ->make(true);
        }
    }

    public function report(Request $request)
    {
        $startDate = '2022-10-01';
        $endDate = '2022-11-10';

        [
            'totalMeals' => $totalMeals,
            'totalMarkets' => $totalMarkets,
            'mealRate' => $mealRate,

        ] = $this->mealService->getReportByDateRange($startDate, $endDate);

        return view('meal.index',compact('totalMeals', 'totalMarkets', 'mealRate')) ;
    }


}
