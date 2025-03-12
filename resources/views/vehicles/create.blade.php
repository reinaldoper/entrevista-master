@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Adicionar Veículo</h1>
    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" class="form-control" id="model" name="model" required>
        </div>
        <div class="form-group">
            <label for="year">Ano</label>
            <input type="number" class="form-control" id="year" name="year" required>
        </div>
        <div class="form-group">
            <label for="acquisition_date">Data de Aquisição</label>
            <input type="date" class="form-control" id="acquisition_date" name="acquisition_date" required>
        </div>
        <div class="form-group">
            <label for="km_acquisition">KMs Rodados</label>
            <input type="number" class="form-control" id="km_acquisition" name="km_acquisition" required>
        </div>
        <div class="form-group">
            <label for="renavam">Renavam</label>
            <input type="text" class="form-control" id="renavam" name="renavam" required>
        </div>
        <div class="form-group">
            <label for="plate">Placa</label>
            <input type="text" class="form-control" id="plate" name="plate" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection