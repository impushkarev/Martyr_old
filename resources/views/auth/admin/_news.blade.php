<li class="item">
    <div class="thumbnail">
        <span class="id">{{ $news->id }}</span>
        <a href="">
            <img src="{{ asset('img/news/'.$news->title.'/'.$news->preview_photo) }}" alt="">
        </a>
    </div>
    <div class="desc">
        <div class="edit_menu">
            <a href="{{ route('edit_news', $news) }}" class="button">
                <i class="fas fa-pen"></i>
            </a>
            <form method="POST" action="">
                @csrf
                @method('DELETE')
                <button class="button" onClick="return confirm('Удалить')">
                    <i class="fas fa-times"></i>
                </button>
            </form>
        </div>
        <h4>{{ $news->title }}</h4>
        <p>{{ str_limit($news->text, 300) }}</p>
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