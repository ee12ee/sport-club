<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\Room;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    use ApiResponse;
    public function store(RoomRequest $request){
        Room::create($request->all());
        return self::sendResponse(201,'the room is added successfully');
    }
}
