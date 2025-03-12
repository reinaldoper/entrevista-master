@extends('layout')

@section('content')
<div class="container">
    <h1>Adicionar Motorista</h1>
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
    <form action="{{ route('drivers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="birth_date">Data de Nascimento</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" required>
        </div>
        <div class="form-group">
            <label for="cnh_number">N°_CNH</label>
            <input type="number" class="form-control" id="cnh_number" name="cnh_number" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
