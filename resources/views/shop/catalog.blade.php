@extends('layouts.app')

@section('title', 'Каталог | ')

{{-- STYLES --}}
@section('styles')

    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}">

@endsection

@section('scripts')
    <script>

        $(document).ready(function() {
            $(document).on('click', '.pagination', function(event) {
                event.preventDefault();
                var myurl = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];
                getData(page);
            });
        });

        function getData(page) {
            $.ajax({
                url: '?page=' + page,
                type: "get",
                cache: false,
                dataType: "html"
            }).done(function(data) {
                $(data).insertBefore($('.product-list .button-container'));
                if($('.product-list').data('pages') == page)
                    $(".pagination").remove();
                else 
                    $(".pagination")[0].href = window.location.origin + '/' + window.location.pathname + '?page=' + (parseInt(page) + 1);

                history.replaceState(null, null, '?page=' + page);
            }).fail(function() {
                alert('Не удалось загрузить страницу');
            })
        }
    </script>
@endsection

{{-- HTML --}}
@section('content')

    <section class="preview" style="background-image: url('{{ asset('img/shop/catalog/'.$settings->background) }}')">
        <h1>{{ $settings->page_title }}</h1>
    </section>

    <section class="product-list content-section" data-pages="{{ $items->lastPage() }}">
        <div class="container">
            @each('shop._item', $items, 'item')
                <div class="button-container">
                    @if ($items->currentPage() != $items->lastPage())
                        <a href="{{ $items->nextPageUrl() }}" class="pagination button">
                            Загрузить еще
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection