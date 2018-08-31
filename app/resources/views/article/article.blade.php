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

      <h3>Comentarios</h3>
      <hr>
      <div id="disqus_thread"></div>
        <script>
        (function() {
        var d = document, s = d.createElement('script');
        s.src = 'https://lautaguirre.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>
    <div class="col-md-3 aside">
        @include('aside')
    </div>
  </div>
@endsection