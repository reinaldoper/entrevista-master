@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Editar Veículo</h1>
    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ $vehicle->model }}" required>
        </div>
        <div class="form-group">
            <label for="year">Ano</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ $vehicle->year }}" required>
        </div>
        <div class="form-group">
            <label for="acquisition_date">Data de Aquisição</label>
            <input type="date" class="form-control" id="acquisition_date" name="acquisition_date" value="{{ $vehicle->acquisition_date }}" required>
        </div>
        <div class="form-group">
            <label for="km_acquisition">KMs Rodados</label>
            <input type="number" class="form-control" id="km_acquisition" name="km_acquisition" value="{{ $vehicle->km_acquisition }}" required>
        </div>
        <div class="form-group">
            <label for="renavam">Renavam</label>
            <input type="text" class="form-control" id="renavam" name="renavam" value="{{ $vehicle->renavam }}" required>
        </div>
        <div class="form-group">
            <label for="plate">Placa</label>
            <input type="text" class="form-control" id="plate" name="plate" value="{{ $vehicle->plate }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection