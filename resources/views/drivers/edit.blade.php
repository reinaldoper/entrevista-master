@extends('layout')

@section('content')
<div class="container">
    <h1>Editar Motorista</h1>
    <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $driver->name }}" required>
        </div>
        <div class="form-group">
            <label for="birth_date">Data de Nascimento</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $driver->birth_date }}" required>
        </div>
        <div class="form-group">
            <label for="cnh_number">CNH</label>
            <select class="form-control" id="cnh_number" name="cnh_number" required>
                <option value="A" {{ $driver->cnh_number == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ $driver->cnh_number == 'B' ? 'selected' : '' }}>B</option>
                <option value="C" {{ $driver->cnh_number == 'C' ? 'selected' : '' }}>C</option>
                <option value="D" {{ $driver->cnh_number == 'D' ? 'selected' : '' }}>D</option>
                <option value="E" {{ $driver->cnh_number == 'E' ? 'selected' : '' }}>E</option>
                <option value="AB" {{ $driver->cnh_number == 'AB' ? 'selected' : '' }}>AB</option>
                <option value="AC" {{ $driver->cnh_number == 'AC' ? 'selected' : '' }}>AC</option>
                <option value="AD" {{ $driver->cnh_number == 'AD' ? 'selected' : '' }}>AD</option>
                <option value="AE" {{ $driver->cnh_number == 'AE' ? 'selected' : '' }}>AE</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
