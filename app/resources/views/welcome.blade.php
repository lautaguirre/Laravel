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
                          <h5 class="card-title"><a href="{{ route('index.article', $article->slug) }}">{{ $article->title }}</a></h5>
                          <p class="card-text">{!! $article->content !!}</p>
                          <i class="fa fa-folder-open-o"></i>
                          <a href="{{ route('index.searchCategory', $article->category->name) }}">{{ $article->category->name }}</a>
                          <div class="pull-right">
                            <i class="fa fa-clock-o"> {{ $article->created_at->diffForHumans() }}</i>
                          </div>
                        </div>
                      </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4 aside">
            @include('aside')
        </div>
    </div>

    {!! $articles->render() !!}
@endsection