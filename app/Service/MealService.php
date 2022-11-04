<?php

namespace App\Service;

use App\Models\Meal;
use App\Models\Market;
use App\Models\Member;
use App\Models\Deposite;
use App\Utils\Formatter;

class MealService implements MealServiceInterface
{
    public function getReportByDateRange($startDate, $endDate): iterable
    {
        $startDate = date('Y-m-d', strtotime($startDate));
        $endDate = date('Y-m-d', strtotime($endDate));

        $members = Member::all();
        $meals = Meal::where('date', '>=', $startDate)->where('date', '<=', $endDate)->get();
        $deposits = Deposite::where('date', '>=', $startDate)->where('date', '<=', $endDate)->get();
        $markets = Market::where('formDate', '>=', $startDate)->where('formDate', '<=', $endDate)->get();

        $totalMeals = $meals->reduce(function($sum, $meal) {
            return $sum + ($meal->breakfast * 0.5 + $meal->lunch + $meal->dinner);
        }, 0);


        $totalMarkets = $markets->sum('amount');
        $mealRate = $totalMarkets / $totalMeals;

        $report = $members->map(function($member) use($mealRate, $meals, $deposits) {
            $memberMealCount = $meals->where('member_id', $member->id)->reduce(function($sum, $meal) {
                return $sum + ($meal->breakfast * 0.5 + $meal->lunch + $meal->dinner);
            }, 0);

            $memberMealCost = $memberMealCount * $mealRate;

            $memberDeposit = $deposits->where('member_id', $member->id)->sum('amount');

            $member->paid = $memberDeposit;
            $member->total_meal = $memberMealCount;
            $member->meal_cost = Formatter::formatMoney($memberMealCost);
            $member->status = Formatter::formatMoney($memberDeposit - $memberMealCost);
            return $member;
        });

        return compact('report', 'mealRate', 'totalMarkets', 'totalMeals');

    }
}
