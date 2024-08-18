<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $offers= Offer::with('subscriptions')->get();
        return self::sendResponse(200,'the offers with subscriptions are',$offers);
    }

    public function store(OfferRequest $request)
    {
      Offer::create($request->all());
      return self::sendResponse(201,'the offer is added successfully');
    }
    public function show(Offer $offer)
    {
        $entity=$offer->with('subscriptions')->first();
        return self::sendResponse(200,'the offer is',$entity);
    }
    public function update(OfferRequest $request, Offer $offer)
    {
        $offer->update($request->all());
        return self::sendResponse(201,'the offer is updated successfully');

    }
    public function destroy( Offer $offer)
    {
        $offer->delete();
        return self::sendResponse(200,'the offer is deleted');
    }
}
