@extends('admin.template.main')

@section('title', 'Listado de Articulos')

@section('content')
  <a href="{{ route('articles.create') }}" class="btn btn-primary">Crear nuevo Articulo</a>

  <hr>

  {!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="search"><span class="fa fa-search"></span></span>
      </div>
      {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Buscar...', 'aria-describedby' => 'search']) !!}
    </div>

  {!! Form::close() !!}

  <table class="table table-striped">
    <thead>
      <th>ID</th>
      <th>Titulo</th>
      <th>Categoria</th>
      <th>User</th>
      <th>Accion</th>
    </thead>
    <tbody>
      @foreach ($articles as $article)
          <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->category->name }}</td>
            <td>{{ $article->user->name }}</td>
            <td>
              <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">
                <span class="fa fa-wrench"></span>
              </a>
              <a href="{{ route('admin.articles.destroy', $article->id) }}" onclick="return confirm('Seguro?');" class="btn btn-danger">
                <span class="fa fa-times"></span>
              </a>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>

  {!! $articles->render() !!}
@endsection