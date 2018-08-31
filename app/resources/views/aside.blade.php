<div class="card">
  <h5 class="card-header">
    Categorias
  </h5>
  <div class="card-body">
    <ul class="list-group">
      @foreach ($categories as $category)
        <li class="list-group-item">
          <span class="badge badge-secondary">{{ $category->articles->count() }}</span>
          <a href="{{ route('index.searchCategory', $category->name) }}">
              {{ $category->name }}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</div>

<div class="card">
    <h5 class="card-header">
      Tags
    </h5>
    <div class="card-body">
      @foreach ($tags as $tag)
        <span class="badge badge-ligth">
          <a href="{{ route('index.searchTag', $tag->name) }}">
            {{ $tag->name }}
          </a>
        </span>
      @endforeach
    </div>
  </div>