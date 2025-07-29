<?php

namespace App\Services;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingService
{
    public function createBooking(array $data): Booking
    {
        return Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $data['service_id'],
            'booking_date' => $data['booking_date'],
            'status' => 'pending',
        ]);
    }

    public function getUserBookings()
    {
        return Booking::with('service')
            ->where('user_id', Auth::id())
            ->get();
    }

    public function getAllBookings()
    {
        return Booking::with(['user', 'service'])->get();
    }
}
