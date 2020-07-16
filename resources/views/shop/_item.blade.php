<a href="{{ route('item', $item) }}" class="item">
    <div class="item-container">
        <div class="thumbnail">
            <img src="{{ asset('img/shop/items/'.$item->title.'/'.$item->preview_photo) }}" alt="">
        </div>
        <div class="desc">
            <div class="desc-inner">
                <h4>First {{ $item->title }}</h4>
                <p class="price">
                    @if($item->discount != 0)
                        {{ $item->price - $item->discount }} ₽
                        <span class="strike">{{ $item->price }} ₽</span>
                    @else
                        {{ $item->price }}
                    @endif
                </p>
            </div>
        </div>
    </div>
</a>