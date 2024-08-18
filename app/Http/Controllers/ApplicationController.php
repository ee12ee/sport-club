<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Sport;
use App\Models\Subscription;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(){
        $sports=Sport::all();
        return view('front/application',compact('sports'));
    }
    public function store(ApplicationRequest $request){
        $subscription=Subscription::query()->create($request->except('sports'));
        $subscription->sports()->attach($request->sports);
        return redirect()->back();
    }
}
