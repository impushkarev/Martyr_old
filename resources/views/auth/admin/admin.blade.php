@extends('layouts.admin')

{{-- TITLE --}}
@section('title', 'Админ панель | ')

{{-- PAGE TITLE --}}
@section('admin_section_title', 'Админ панель')

{{-- SCRIPTS --}}
@section('scripts')

    <script>
        $(document).ready(function() {
            $(".item_list .item .thumbnail img").mousemove(function(e) {
                $(this).css('object-position', '0 '+e.offsetY/2+'%');
            });
            $(".item_list .item .thumbnail img").mouseout(function(e) {
                $(this).css('object-position', '0 center');
            });
        });
    </script>

@endsection

{{-- HTML --}}
@section('admin_panels')

    <div class="panel">
        <div class="item_panel">
            <h2>Товары</h2>
            <div class="button-container">
                <a href="{{ route('create_item') }}" class="button">
                    Добавить товар
                </a>
            </div>
            <ul class="item_list">
                @if($items->count())
                    @each('auth.admin._item', $items, 'item')
                @else
                    <li class="item">
                        <div class="desc">
                            <h4>Ни одного товара еще не создано</h4>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
        <div class="item_panel">
            <h2>Проекты</h2>
            <div class="button-container">
                <a href="{{ route('create_news') }}" class="button">
                    Добавить новость
                </a>
            </div>
            <ul class="item_list">
                @if($news->count())
                    @each('auth.admin._news', $news, 'news')
                @else
                    <li class="item">
                        <div class="desc">
                            <h4>Ни одной новости еще не создано</h4>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>

@endsection