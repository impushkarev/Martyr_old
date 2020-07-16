@extends('layouts.admin')

{{-- TITLE --}}
@section('title', 'Изменить новость | ')

{{-- SCRIPTS --}}
@section('scripts')

    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/Sortable-master/Sortable.min.js') }}"></script>
    <script src="{{ asset('js/Sortable-master/jquery-sortable.js') }}"></script>

@endsection

@section('admin_section_title', 'Добавить товар')

{{-- HTML --}}
@section('admin_panels')
    <div class="panel item_panel">
        <h2>Новость</h2>

        <form enctype="multipart/form-data" method="POST" action="{{ route($form.'_news', $news ?? '') }}" class="form">
            @csrf
            @method('POST')

            {{-- ITEM IMAGES --}}
            <div class="form-group">
                <input id="input_photo" 
                    type="file" 
                    name="photo"
                    accept="image/*,image/jpeg"
                    hidden
                />
                <input 
                    id="photo_names" 
                    type="text" 
                    name="photo_names"
                    value=""
                    hidden
                />
                <label for="file" class="form-label">Изображения</label>
                <div class="add" id="add_photo">
                    +
                </div>
                <div class="images news_preview" id="images_list">
                    @isset($news)
                        <div class="item" data-id="{{ $news->preview_photo }}">
                            <img src="{{ asset('img/news/' . $news->title . '/' . $news->preview_photo) }}">
                            <span class="delete_item">x</span>
                        </div>
                    @endisset
                </div>
            </div>

            {{-- ITEM TITLE --}}
            <div class="form-group">
                <label for="title" class="form-label">Название новости</label>
                <input id="title" 
                    type="text" 
                    class="form-input @error('title') is-invalid @enderror" 
                    name="title" 
                    value="{{ old('title') ?? $news->title ?? '' }}" 
                    required 
                    autocomplete="title" 
                />
            </div>

            {{-- ITEM TEXT --}}
            <div class="form-group">
                <label for="news" class="form-label">Новость</label>
                <textarea id="news" 
                    type="text" 
                    class="form-input @error('news') is-invalid @enderror" 
                    name="news" 
                    required 
                    autocomplete="news">{{ old('news') ?? $news->text ?? '' }}</textarea>
            </div>

            <div class="button-container">
                <button type="submit" class="button">
                    Сохранить
                </button>
            </div>
        </form>
    </div>

@endsection