<?php

namespace App\Service;


interface MealServiceInterface
{
    public function getReportByDateRange($startDate, $endDate): iterable;
}
