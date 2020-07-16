<li class="item">
    <div class="thumbnail">
        <span class="id">{{ $item->id }}</span>
        <a href="{{ route('item', $item) }}">
            <img src="{{ asset('img/shop/items/'.$item->title.'/'.$item->preview_photo) }}" alt="">
        </a>
    </div>
    <div class="desc">
        <div class="edit_menu">
            <a href="{{ route('edit_item', $item) }}" class="button">
                <i class="fas fa-pen"></i>
            </a>
            <form method="POST" action="{{ route('delete_item', $item) }}">
                @csrf
                @method('DELETE')
                <button class="button" onClick="return confirm('Удалить')">
                    <i class="fas fa-times"></i>
                </button>
            </form>
        </div>
        <h4>{{ $item->name }}</h4>
        <p>{{ $item->description }}</p>
        <p class="price">
            @if($item->discount != 0)
                {{ $item->price - $item->discount }} ₽
                <span class="strike">{{ $item->price }} ₽</span>
            @else
                {{ $item->price }}
            @endif
        </p>
        <div class="tags">
            @forelse($item->tags->pluck('tag') as $tag)
                <div>{{ $tag }}</div>
            @empty
                <div>Добавьте теги</div>
            @endforelse
        </div>
        <div class="statistic">
            <div class="stat views">
                <i class="far fa-eye"></i>
                100
            </div>
            <div class="stat  sold">
                <i class="fas fa-dollar-sign"></i>
                100
            </div>
            <div class="stat stock">
                <i class="fas fa-archive"></i>
                100
            </div>
        </div>
    </div>
</li>