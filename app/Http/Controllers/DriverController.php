<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Exception;

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
            'cnh_number' => 'required',
        ]);

        try {
            Driver::create($request->all());
            return redirect()->route('drivers.index')->with('success', 'Motorista criado com sucesso.');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Erro ao criar motorista. Por favor, tente novamente.');
        }
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
            'cnh_number' => 'required',
        ]);

        try {
            $driver->update($request->all());
            return redirect()->route('drivers.index')->with('success', 'Motorista atualizado com sucesso.');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Erro ao atualizar motorista. Por favor, tente novamente.');
        }
    }

    public function destroy(Driver $driver)
    {
        try {
            $driver->delete();
            return redirect()->route('drivers.index')->with('success', 'Motorista deletado com sucesso.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao deletar motorista. Por favor, tente novamente.');
        }
    }
}
