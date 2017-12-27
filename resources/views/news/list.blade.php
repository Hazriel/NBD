@foreach($newsList as $news)
    <div class="news">
        <div class="news-header">
            <h2>{{ $news->title }}</h2>
            <i>by <a href="#">{{ $news->owner->username }}</a>, on {{ date_format($news->created_at, 'd/m/Y') }} at {{ date_format($news->created_at, 'H:i') }}</i>
        </div>
        <div class="news-body">
            {!! $news->content !!}
        </div>
    </div>
@endforeach