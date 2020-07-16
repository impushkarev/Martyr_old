@extends('layouts.admin')

{{-- TITLE --}}
@section('title', 'Изменить товар | ')

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
        <h2>Товар</h2>

        <form enctype="multipart/form-data" method="POST" action="{{ route($form.'_item', $item ?? '') }}" class="form">
            @csrf
            @method('POST')

            {{-- ITEM IMAGES --}}
            <div class="form-group">
                <input id="input_file" 
                    type="file" 
                    name="photo[]" 
                    multiple="multiple" 
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
                <div class="add" id="add_file">
                    +
                </div>
                <div class="images" id="images_list">
                    @isset($item)
                        <div class="item" data-id="{{ $item->preview_photo }}">
                            <img src="{{ asset('img/shop/items/' . $item->title . '/' . $item->preview_photo) }}">
                            <span class="delete_item">x</span>
                        </div>
                        @foreach($item->images->pluck('photo') as $image)
                            <div class="item" data-id="{{ $image }}">
                                <img src="{{ asset('img/shop/items/' . $item->title . '/' . $image) }}">
                                <span class="delete_item">x</span>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>

            {{-- ITEM TITLE --}}
            <div class="form-group">
                <label for="title" class="form-label">Название товара</label>
                <input id="title" 
                    type="text" 
                    class="form-input @error('title') is-invalid @enderror" 
                    name="title" 
                    value="{{ old('title') ?? $item->title ?? '' }}" 
                    required 
                    autocomplete="title" 
                />
            </div>

            {{-- ITEM CATEGORY --}}
            <div class="form-group">
                <label for="desc" class="form-label">Категория товара</label>
                <select name="cat" class="form-select" >
                    <option value="" disabled selected>Выберите категорию</option>
                    @if (old('cat') !== null)
                        <option value="man" @if (old('cat') == 'man') selected @endif>Мужская</option>
                        <option value="woman" @if (old('cat') == 'woman') selected @endif>Женская</option>
                    @elseif (isset($item)) 
                        <option value="man" @if ($item->filters()->where('filter', 'man')->exists()) selected @endif>Мужская</option>
                        <option value="woman" @if ($item->filters()->where('filter', 'woman')->exists()) selected @endif>Женская</option>
                    @else
                        <option value="man">Мужская</option>
                        <option value="woman">Женская</option>
                    @endif
                </select>
            </div>

            {{-- ITEM DESCRIPTION --}}
            <div class="form-group">
                <label for="desc" class="form-label">Описание товара</label>
                <textarea id="desc" 
                    type="text" 
                    class="form-input @error('desc') is-invalid @enderror" 
                    name="desc" 
                    required 
                    autocomplete="description">{{ old('desc') ?? $item->description ?? '' }}</textarea>
            </div>

            {{-- ITEM FILTERS --}}
            <div class="form-group">
                <label for="list" class="form-label">Описание товара (список)</label>
                <div class="with_btn">
                    <input id="list" 
                        type="text" 
                        class="form-input with_btn list_s"
                    />
                    <div class="button_add" id="list_btn">
                        +
                    </div>
                </div>
                <select class="form-select" name="list_filters[]" multiple>  
                    @if(old('list_filters') !== null)
                        @foreach(old('list_filters') as $filter)
                            <option selected>{{ $filter }}</option>
                        @endforeach              
                    @elseif(isset($item))
                        @foreach($item->filters->pluck('filter')->diff(['man', 'woman']) as $filter)
                            <option selected>{{ $filter }}</option>
                        @endforeach
                    @endif

                    @forelse($filters as $filter)
                        @if(old('list_filters') !== null && in_array($filter, (array)old('list_filters')))
                            @continue
                        @elseif(isset($item) && $item->filters->pluck('filter')->contains($filter))
                            @continue
                        @endif
                        <option>{{ $filter }}</option>
                    @empty
                        <option value="" disabled>Добавьте описание товара</option>
                    @endforelse
                </select>
            </div>

            {{-- ITEM TAGS --}}
            <div class="form-group">
                <label for="list" class="form-label">Теги</label>
                <div class="with_btn">
                    <input id="list"
                        type="text" 
                        class="form-input with_btn list_s" 
                    />
                    <div class="button_add" id="list_btn">
                        +
                    </div>
                </div>                    
                <select class="form-select" name="list_tags[]" multiple>
                    @if(old('list_tags') !== null)
                        @foreach(old('list_tags') as $tag)
                            <option selected>{{ $tag }}</option>
                        @endforeach              
                    @elseif(isset($item))
                        @foreach($item->tags->pluck('tag') as $tag)
                            <option selected>{{ $tag }}</option>
                        @endforeach
                    @endif

                    @forelse($tags as $tag)
                        @if(old('list_tags') !== null && in_array($tag, (array)old('list_tags')))
                            @continue
                        @elseif(isset($item) && $item->tags->pluck('tag')->contains($tag))
                            @continue
                        @endif
                        <option>{{ $tag }}</option>
                    @empty
                        <option value="" disabled>Добавьте теги товару</option>
                    @endforelse
                </select>
            </div>

            {{-- ITEM PRICE --}}
            <div class="form-group hw">
                <label for="price" class="form-label">Цена (₽)</label>
                <input id="price" 
                    type="text" 
                    class="form-input @error('price') is-invalid @enderror" 
                    name="price" 
                    value="{{ old('price') ?? $item->price ?? '' }}" 
                    required 
                    autocomplete="price" 
                />
            </div>

            {{-- ITEM DISCOUNT --}}
            <div class="form-group hw">
                <label for="discount" class="form-label">Скидка (₽)</label>
                <input id="discount" 
                    type="text" 
                    class="form-input @error('discount') is-invalid @enderror" 
                    name="discount" 
                    value="{{ old('discount') ?? $item->discount ?? '' }}" 
                    autocomplete="discount" 
                />
            </div>

            <div class="button-container">
                <button type="submit" class="button">
                    Сохранить
                </button>
            </div>
        </form>
    </div>

@endsection