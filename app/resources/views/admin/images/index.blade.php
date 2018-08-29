@extends('admin.template.main')

@section('title', 'Listado de imagenes')

@section('content')
    <div class="row">
      @foreach ($images as $image)
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <img src="/images/articles/{{ $image->name }}" class="img-fluid">
              </div>
              <div class="card-footer">
                {{ $image->article->title }}
              </div>
            </div>
          </div>
      @endforeach
    </div>
@endsection