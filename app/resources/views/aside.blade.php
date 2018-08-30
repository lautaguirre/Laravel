<div class="card">
  <h5 class="card-header">
    Categorias
  </h5>
  <div class="card-body">
    <ul class="list-group">
      @foreach ($categories as $category)
        <li class="list-group-item">
          <span class="badge badge-secondary">{{ $category->articles->count() }}</span>
          {{ $category->name }}
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
        <span class="badge badge-primary">{{ $tag->name }}</span>
      @endforeach
    </div>
  </div>