@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Adicionar Veículo</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
            <label for="acquisition_date">Data_Aquisição</label>
            <input type="date" class="form-control" id="acquisition_date" name="acquisition_date" required>
        </div>
        <div class="form-group">
            <label for="km_acquisition">KMs_Rodados</label>
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
