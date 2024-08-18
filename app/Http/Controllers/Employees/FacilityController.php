<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\FacilityRequest;
use App\Models\Facility;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    use ApiResponse;
    public function store(FacilityRequest $request){
        $sports_id=$request->input('sport_id');
        $facility=Facility::create($request->except('sport_id'));
        $facility->sports()->attach($sports_id);
        return self::sendResponse(201,'the facility is added successfully');
    
    }
}
