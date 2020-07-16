@extends('layouts.app')

@section('title', $item->title.' | ')

{{-- SCRIPTS --}}
@section('scripts')

    <script src="{{ asset('js/item.js') }}"></script>

@endsection

{{-- STYLES --}}
@section('styles')

    <link rel="stylesheet" href="{{ asset('css/item.css') }}">
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">

@endsection

{{-- HTML --}}
@section('content')

<section class="product">
    <div class="images">
        @foreach ($item->images->pluck('photo') as $image)
            <div class="image">
                <img src="{{ asset('img/shop/items/'.$item->title.'/'.$image) }}" alt="">
            </div>
        @endforeach
    </div>
    <div class="container">
        <div class="product-info">
            <div class="product-info-container"> 
                <div id="like">
                    <form method="POST" action="">
                        @csrf
                        @method('POST')
                        <button class="like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </form>
                    {{--
                    @else
                        <form method="POST" action="{{ route('like_item', $item->id) }}">
                            @csrf
                            @method('POST')
                            <button class="like">
                                <i class="far fa-heart"></i>
                            </button>
                        </form>
                    @endif
                    --}}
                </div>           
                <h2>{{ $item->title }}</h2>
                <p>{{ $item->description }}</p>
                <ul>
                    @foreach ($item->filters->pluck('filter') as $filter)
                        <li>{{ $filter }}</li>
                    @endforeach
                </ul>
                <div class="add-to-cart">
                    <form method="POST" action="" id="cart">
                        @csrf
                        @method('POST')
                        <button class="abtn">Купить</button>
                    </form>
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
    </div>
</section>

<section class="recommendation">
    <h1>Может вам понравится</h1>
    <div class="container">
        @each('shop._item', $recommended, 'item')
    </div>
</section>

@endsection