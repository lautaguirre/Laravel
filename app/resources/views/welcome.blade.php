@extends('admin.main')

@section('title', 'Inicio')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-6">
                      <div class="card">
                        <a href="">
                          <img class="card-img-top" src="{{ asset('images/articles/' . $article->images[0]->name) }}" alt="Card image cap">
                        </a>
                        <div class="card-body">
                          <h5 class="card-title">{{ $article->title }}</h5>
                          <p class="card-text">{!! $article->content !!}</p>
                          <p class="card-text">{{ $article->category->name }}</p>
                          <a href="" class="btn btn-primary">Go to the article</a>
                            <i class="fa fa-clock-o"> {{ $article->created_at->diffForHumans() }}</i>
                        </div>
                      </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {!! $articles->render() !!}
@endsection