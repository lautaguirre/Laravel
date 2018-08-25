@extends('admin.template.main')

@section('title', 'Lista de Tags')

@section('content')

  <a href="{{ route('tags.create') }}" class="btn btn-info">Registrar nuevo tag</a>
  <hr>

  {!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="search"><span class="fa fa-search"></span></span>
      </div>
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar...', 'aria-describedby' => 'search']) !!}
    </div>

  {!! Form::close() !!}

  <table class="table table-striped">
    <thead>
      <th>ID</th>
      <th>Nombre</th>
      <th>Accion</th>
    </thead>
    <tbody>
      @foreach ($tags as $tag)
          <tr>
            <td>{{ $tag->id }}</td>
            <td>{{ $tag->name }}</td>

            <td>
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning">
                    <span class="fa fa-wrench"></span>
                </a>
                <a href="{{ route('admin.tags.destroy', $tag->id) }}" onclick="return confirm('Seguro?');" class="btn btn-danger">
                    <span class="fa fa-times"></span>
                </a>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
  <div class="text-center">
    {!! $tags->render() !!}
  </div>

@endsection