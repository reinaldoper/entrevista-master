<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'year' => 'required|integer',
            'acquisition_date' => 'required|date',
            'km_acquisition' => 'required|integer',
            'renavam' => 'required|unique:vehicles',
            'plate' => 'required|unique:vehicles',
        ]);

        Vehicle::create($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Veículo criado com sucesso.');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'model' => 'required',
            'year' => 'required|integer',
            'acquisition_date' => 'required|date',
            'km_acquisition' => 'required|integer',
            'renavam' => 'required|unique:vehicles,renavam,' . $vehicle->id,
            'plate' => 'required|unique:vehicles,plate,' . $vehicle->id,
        ]);

        $vehicle->update($request->all());
        return redirect()->route('vehicles.index')->with('success', 'Veículo atualizado com sucesso.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Veículo deletado com sucesso.');
    }
}