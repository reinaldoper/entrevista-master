@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Motoristas</h1>
    <a href="{{ route('drivers.create') }}" class="btn btn-primary mb-3">Adicionar Motorista</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>CNH</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drivers as $driver)
            <tr>
                <td>{{ $driver->name }}</td>
                <td>{{ $driver->birth_date }}</td>
                <td>{{ $driver->cnh_number }}</td>
                <td>
                    <a href="{{ route('drivers.show', $driver->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection