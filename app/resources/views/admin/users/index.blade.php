@extends('admin.template.main')

@section('title', 'Lista de Usuarios')

@section('content')
    <a href="{{ route('users.create') }}" class="btn btn-success">Crear Nuevo Usuario</a><hr>

    <table class="table table-hover">
        <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Accion</th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->type == 'admin')
                            <span class="badge badge-danger">{{ $user->type }}</span>
                        @else
                            <span class="badge badge-primary">{{ $user->type }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="" class="btn btn-warning"></a>
                        <a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('Seguro?');" class="btn btn-danger"></a>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $users->render() !!}

@endsection