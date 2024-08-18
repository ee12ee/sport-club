<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\SportRequest;
use App\Models\Sport;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;


class SportController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sports=Sport::with(['images','videos','days','rooms','facilities'])->get();
        return self::sendResponse(200,'the sports are',$sports);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(SportRequest $request)
    {
        Sport::create($request->all());
        return self::sendResponse(201,'the sports are added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        $entity=$sport->with(['images','videos','days','rooms','facilities'])->get();
        return self::sendResponse(200, 'the sport is',$entity);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SportRequest $request, Sport $sport)
    {
        $sport->update($request->all());
        return self::sendResponse(201,'sport is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        $sport->delete();
        return self::sendResponse(200,'the category is deleted');
    }
}
