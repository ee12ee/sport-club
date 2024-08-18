<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\DayRequest;
use App\Models\Day;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class DayController extends Controller
{
    use ApiResponse;
    public function store(DayRequest $request){
        $sports_id=$request->input('sport_id');
        $day=Day::create($request->except($request->sport_id));
        $day->sports()->attach($sports_id);
        return self::sendResponse(201,'the day with sports are added successfully');
    
    }
}
