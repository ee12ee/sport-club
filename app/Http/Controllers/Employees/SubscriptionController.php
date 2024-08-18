<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignOfferRequest;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\SuspensionRequest;
use App\Models\Offer;
use App\Models\Subscription;
use App\Models\Suspension;
use App\Traits\ApiResponse;
use DB;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    use ApiResponse;
    public function accept(string $id){
        $subscription=Subscription::find($id);
        $subscription->update(['is_active'=>true]);
        return self::sendResponse(201,'the subscription is accepted');
    }
    public function suspend(SuspensionRequest $request){
        DB::transaction(function() use($request ){
            $suspend=Suspension::create($request->all());
            $suspend->subscription()->update(['is_active'=>false]);
        });
        return self::sendResponse(201,'subscription is suspended successfully');

    }
    public function assignOffer(AssignOfferRequest $request,string $id){
        $subscription=Subscription::find($id);
        $subscription->update(['offer_id'=>$request->offer_id]);
        return self::sendResponse(201,'subscription is assigned to offer successfully');

    }
    public function index(){
        $subscriptions=Subscription::with('payment')->get();
        return self::sendResponse(200,'subscriptions wiyh payments are',$subscriptions);
    }
    public function show(string $id){
        $subscription=Subscription::where('id',$id)->with('payment')->first();
        return self::sendResponse(200,'subscription wiyh payment are',$subscription);
    }

}
