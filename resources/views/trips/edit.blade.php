@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Editar Viagem</h1>

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
    <form action="{{ route('trips.update', $trip->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="driver_id">Motorista</label>
            <select class="form-control" id="driver_id" name="driver_id" required>
                @foreach($drivers as $driver)
                <option value="{{ $driver->id }}" {{ $driver->id == $trip->driver_id ? 'selected' : '' }}>{{ $driver->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="vehicle_id">Veículo</label>
            <select class="form-control" id="vehicle_id" name="vehicle_id" required>
                @foreach($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}" {{ $vehicle->id == $trip->vehicle_id ? 'selected' : '' }}>{{ $vehicle->model }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="km_start">KM_Inicial</label>
            <input type="number" class="form-control" id="km_start" name="km_start" value="{{ $trip->km_start }}" required>
        </div>
        <div class="form-group">
            <label for="km_end">KM_Final</label>
            <input type="number" class="form-control" id="km_end" name="km_end" value="{{ $trip->km_end }}" required>
        </div>
        <div class="form-group">
            <label for="start_time">Data/hora_inicio</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ $trip->start_time }}" required>
        </div>
        <div class="form-group">
            <label for="end_time">Data/hora_fim</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ $trip->end_time }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
