<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SubscriptController extends Controller
{

    public function index()
    {
        $intent = Auth::user()->createSetupIntent();

        return view('subscript.index', compact('intent'));
    }

    public function register(Request $request){
        $request->validate([
            'card-holder-name' => 'required',
        ]);

        $request->user()->newSubscription(
            'main',env('STRIPE_ID')
        )->create($request->payment_method);
        return redirect()->route('mypage')->with('message', '有料会員に登録されました');
    }

    public function cancel_confirm() {
        return view('subscript.cancel');
    }

    public function cancel() {
        Auth::user()->subscription('main')->delete();
        return redirect()->route('mypage')->with('message', '有料会員を終了しました');
    }

    public function edit() {
        $user= Auth::user();
        $intent = Auth::user()->createSetupIntent();
        return view('subscript.edit',compact('intent','user'));
    }

    public function update(Request $request) {
        $request->user()->updateDefaultPaymentMethod($request->payment_method);
        return redirect()->route('subscript.edit')->with('message', 'カードを変更しました');
    }
}
