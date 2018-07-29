@extends('admin.template.main')

@section('title', 'Categorias')

@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Crear nueva categoria</a>

    <hr>

    <table class="table table-hover">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Accion</th>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">
                                <span class="fa fa-wrench"></span>
                            </a>
                            <a href="{{ route('admin.categories.destroy', $category->id) }}" onclick="return confirm('Seguro?');" class="btn btn-danger">
                                <span class="fa fa-times"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection