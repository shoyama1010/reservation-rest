<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->shop_id = $request->shop_id;
        $reservation->reservationDateTime = $request->reservationDateTime;
        // $reservation->reservationDate = $request->reservationDate;
        // $reservation->reservationTime = $request->reservationTime;
        $reservation->numberOfPeople = $request->numberOfPeople;
        $reservation->save();

        return redirect('/thanks')->with('success', '予約が完了しました。');
    }

    public function destroy($id)
    {
        $reservation = Reservation::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        $reservation->delete();

        return back()->with('success', '予約をキャンセルしました。');
    }
}
