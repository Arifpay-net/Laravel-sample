<?php

use Arifpay\Arifpay\Arifpay;
use Arifpay\Arifpay\Helper\ArifpaySupport;
use Arifpay\Arifpay\Interface\ArifpayBeneficary;
use Arifpay\Arifpay\Interface\ArifpayCheckoutItem;
use Arifpay\Arifpay\Interface\ArifpayCheckoutRequest;
use Arifpay\Arifpay\Interface\ArifpayOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test/create', function (Request $request) {
    $arifpay = new Arifpay('your-api-key');
    $d = new  Carbon();
    $d->setMonth(10);
    $expired = ArifpaySupport::getExpireDateFromDate($d);
    $data = new ArifpayCheckoutRequest(
        cancel_url: 'https://api.arifpay.com',
        error_url: 'https://api.arifpay.com',
        notify_url: 'https://gateway.arifpay.net/test/callback',
        expireDate: $expired,
        nonce: floor(rand() * 10000) . "",
        beneficiaries: [
            ArifpayBeneficary::fromJson([
                "accountNumber" => '01320811436100',
                "bank" => 'AWINETAA',
                "amount" => 10.0,
            ]),
        ],
        paymentMethods: ["CARD"],
        success_url: 'https://gateway.arifpay.net',
        items: [
            ArifpayCheckoutItem::fromJson([
                "name" => 'Bannana',
                "price" => 10.0,
                "quantity" => 1,
            ]),
        ],
    );
    $session =  $arifpay->checkout()->create($data, new ArifpayOptions(sandbox: true));

    return ["url" => $session->payment_url, "id" => $session->session_id];
});

Route::get('/test/fetch/:id', function (Request $request, $id) {
    $arifpay = new Arifpay('your-api-key');

    $session =  $arifpay->checkout()->fetch($id, new ArifpayOptions(sandbox: true));

    return $session->id;
});
