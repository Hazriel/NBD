@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section news-section">
                <div class="nbd-section-header">
                    <h1>Latest News</h1>
                </div>
                <div class="nbd-section-body">
                    <div id="news-container">
                        @include('news.list')
                    </div>
                    <nav aria-label="news-links">
                        <ul class="pagination">
                            <li><a class="page-link" href="#!" onclick="previousNewsPage();">Previous</a></li>
                            @for($i = 1; $i < $newsPageCount; $i++)
                                <li class="news-item"><a class="page-link" href="#!" onclick="getNews({{ $i }});">{{ $i }}</a></li>
                            @endfor
                            <li><a class="page-link" href="#!" onclick="nextNewsPage();">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/news.js') }}"></script>
@endsection