<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birth_date' => 'required|date|before:-18 years',
            'cnh_number' => 'required|unique:drivers',
        ]);

        Driver::create($request->all());
        return redirect()->route('drivers.index')->with('success', 'Motorista criado com sucesso.');
    }

    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name' => 'required',
            'birth_date' => 'required|date|before:-18 years',
            'cnh_number' => 'required|unique:drivers,cnh_number,' . $driver->id,
        ]);

        $driver->update($request->all());
        return redirect()->route('drivers.index')->with('success', 'Motorista atualizado com sucesso.');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'Motorista deletado com sucesso.');
    }
}
