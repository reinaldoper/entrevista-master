<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::with(['driver', 'vehicle'])->get();
        return view('trips.index', compact('trips'));
    }

    public function create()
    {
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        return view('trips.create', compact('drivers', 'vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'km_start' => 'required|integer',
            'km_end' => 'required|integer|gte:km_start',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
        ]);

        Trip::create([
            'driver_id' => $request->input('driver_id'),
            'vehicle_id' => $request->input('vehicle_id'),
            'km_start' => (int) $request->input('km_start'),
            'km_end' => (int) $request->input('km_end'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ]);
        return redirect()->route('trips.index')->with('success', 'Viagem criada com sucesso.');
    }

    public function show(Trip $trip)
    {
        return view('trips.show', compact('trip'));
    }

    public function edit(Trip $trip)
    {
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        return view('trips.edit', compact('trip', 'drivers', 'vehicles'));
    }

    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'km_start' => 'required|integer',
            'km_end' => 'required|integer|gte:km_start',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
        ]);

        $trip->update([
            'driver_id' => $request->input('driver_id'),
            'vehicle_id' => $request->input('vehicle_id'),
            'km_start' => (int) $request->input('km_start'),
            'km_end' => (int) $request->input('km_end'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ]);
        return redirect()->route('trips.index')->with('success', 'Viagem atualizada com sucesso.');
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('trips.index')->with('success', 'Viagem deletada com sucesso.');
    }
}
