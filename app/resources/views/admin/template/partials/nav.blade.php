<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="{{ asset('images/laravel.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
            Laravel
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          @if(Auth::user())

          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('welcome') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            @if (Auth::user()->admin())
              <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
              </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">Categorias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tags.index') }}">Tags</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('articles.index') }}">Articulos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('images.index') }}">Imagenes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"> {{ Auth::user()->name }} </a>
            </li>
            <li>
              {!! Form::open(['route' => ['logout'], 'method' => 'POST']) !!}
                {!! Form::submit('Salir', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </li>
          </ul>

          @endif
        </div>
      </nav>