<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date|after_or_equal:today',
        ]);

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'service_id' => $validated['service_id'],
            'booking_date' => $validated['booking_date'],
            'status' => 'pending',
        ]);

        return response()->json($booking, 201);
    }

    public function userBookings()
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $bookings = Booking::with('service')
            ->where('user_id', auth()->id())
            ->get();

        return response()->json(BookingResource::collection($bookings));
    }

    public function allBookings()
    {
        if (!auth()->user() || !auth()->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $bookings = Booking::with(['user', 'service'])->get();
        return response()->json(BookingResource::collection($bookings));
    }
}
