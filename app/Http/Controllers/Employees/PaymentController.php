<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $payments= Payment::with('subscriptions')->get();
        return self::sendResponse(200,'the payments with subscriptions are',$payments);
    }

    public function store(PaymentRequest $request)
    {
      Payment::create($request->all());
      return self::sendResponse(201,'the payment is added successfully');
    }
    public function show(Payment $payment)
    {
        $entity=$payment->with('subscriptions')->first();
        return self::sendResponse(200,'the payment is',$entity);
    }
    public function update(PaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());
        return self::sendResponse(201,'the payment is updated successfully');

    }
    public function destroy( Payment $payment)
    {
        $payment->delete();
        return self::sendResponse(200,'the offer is deleted');
    }
}
