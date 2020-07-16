
<a class="project">
    <div class="project-thumbnail">
        <img src="{{ asset('img/news/'.$news->title.'/'.$news->preview_photo) }}" alt="">
    </div>
    <div class="project-description">
        <div class="project-description-inner">
            <h2 class="project-title">{{ $news->title }}</h2>
            <p class="project-date">{{ $news->created_at->format('H:i d.m.Y') }}</p>
            <p class="project-preview">{{ $news->text }}</p>
        </div>
    </div>
</a>