<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    // public function store(Request $request)
    // {
    //     $reservation = new Reservation();
    //     $reservation->user_id = Auth::id();
    //     $reservation->shop_id = $request->shop_id;
    //     $reservation->reservationDateTime = $request->reservationDateTime;

    //     $reservation->numberOfPeople = $request->numberOfPeople;
    //     $reservation->save();

    //     return redirect('/thanks')->with('success', '予約が完了しました。');
    // }
    public function store(ReservationRequest $request)
    {
        Reservation::create([
            'user_id' => auth()->id(),
            'shop_id' => $request->shop_id,
            'reservationDateTime' => $request->reservationDateTime,
            'numberOfPeople' => $request->numberOfPeople,
        ]);

        return redirect()->route('mypage');
    }

    public function update(ReservationRequest $request, Reservation $reservation)
    {
        $reservation->update([
            'reservationDateTime' => $request->reservationDateTime,
            'numberOfPeople' => $request->numberOfPeople,
        ]);
        return redirect()->route('mypage');
    }

    public function destroy($id)
    {
        $reservation = Reservation::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        $reservation->delete();

        return redirect()->route('mypage');
    }
}
