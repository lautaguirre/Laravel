@extends('admin.template.main')

@section('title', $article->title)

@section('content')
  <h3 class="title-front left">{{ $article->title }}</h3>
  @foreach ($article->tags as $tag)
      {{ $tag->name }}
  @endforeach
  <hr>
  <div class="row">
    <div class="col-md-9">
      {!! $article->content !!}
    </div>
    <div class="col-md-3 aside">
        @include('aside')
    </div>
  </div>
@endsection