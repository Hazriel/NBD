@foreach($newsList as $news)
    <div class="admin-news">
        <div class="admin-news-header">
            <div class="admin-news-title">
                <h1>{{ $news->title }}</h1>
            </div>
            <div class="admin-news-actions">
                <a href="#"><button class="btn btn-info">Edit <span class="glyphicon glyphicon-wrench"></span></button></a>
                <a href="#"><button class="btn btn-danger">Delete <span class="glyphicon glyphicon-trash"></span></button></a>
            </div>
        </div>
        <div class="admin-news-body">
            <p><i>by <a href="{{ route('user.profile', $news->owner->id) }}">{{ $news->owner->username }}</a>, {{ date_format($news->created_at, 'd/m/Y') }}</i></p>
            <br>
            {!! $news->content !!}
        </div>
    </div>
@endforeach
