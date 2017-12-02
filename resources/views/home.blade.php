@extends('layouts.app')

@section('content')
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="{{ asset('images/PUB.jpg') }}" alt="PLAYERUNKNOWN\'S BATTLEGROUND'" style="width:100%;">
            </div>
            <div class="item">
                <img src="{{ asset('images/Dirty-Bomb.jpg') }}" alt="Dirty Bomb" style="width:100%;">
            </div>
        </div>

        <a class="left carousel-control" href="#carousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row">
        <div class="col-lg-9">
            <div class="nbd-section news-section">
                <div class="nbd-section-header">
                    <h1>Recent News</h1>
                </div>
                <div class="nbd-section-body">
                    <div class="news">
                        <div class="news-header">
                            <h2>Omg there's a NBD website</h2>
                            <div class="news-info">
                                <i>by <a href="#">Hazriel</a>, 02/12/2017</i>
                            </div>
                        </div>
                        <div class="news-body">
                            <p>Greeting,</p>

                            <p>I would like to welcome you all to the NBD website. It took me a lot of time to create from scratch.
                            For now there are not a lot of features as only a forum is available for normal members. I also created
                            an admin interface, which only can see :D. Still I hope this will allow us to keep some contacts and
                            to plan game sessions.</p>

                            <p>In the future I would also like to include these features to the website :</p>

                            <ul>
                                <li>A quote system, so that you can save the best NBD member quotes.</li>
                                <li>A event calendar, in order to plan team events</li>
                                <li>A file sharing system</li>
                                <li>A vote system, strawpoll-like</li>
                            </ul>

                            <p>My sincerest thanks for all the funny moments I could witness. My sincerest thanks for the friendship
                            I was brought by this team. May all these moments and this athmosphere continue for the upcoming years.</p>

                            <p>May the Camel God guide us...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 server-info">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Teamspeak</h1>
                </div>
                <div class="nbd-section-body">
                    <div id="ts3viewer_1101575" style=""> </div>
                    <script src="https://static.tsviewer.com/short_expire/js/ts3viewer_loader.js"></script>
                    <script>
                        var ts3v_url_1 = "https://www.tsviewer.com/ts3viewer.php?ID=1101575&text=e3e3e3&text_size=12&text_family=1&text_s_color=ffffff&text_s_weight=normal&text_s_style=normal&text_s_variant=normal&text_s_decoration=none&text_i_color=&text_i_weight=normal&text_i_style=normal&text_i_variant=normal&text_i_decoration=none&text_c_color=&text_c_weight=normal&text_c_style=normal&text_c_variant=normal&text_c_decoration=none&text_u_color=ffffff&text_u_weight=normal&text_u_style=normal&text_u_variant=normal&text_u_decoration=none&text_s_color_h=&text_s_weight_h=bold&text_s_style_h=normal&text_s_variant_h=normal&text_s_decoration_h=none&text_i_color_h=ffffff&text_i_weight_h=bold&text_i_style_h=normal&text_i_variant_h=normal&text_i_decoration_h=none&text_c_color_h=&text_c_weight_h=normal&text_c_style_h=normal&text_c_variant_h=normal&text_c_decoration_h=none&text_u_color_h=&text_u_weight_h=bold&text_u_style_h=normal&text_u_variant_h=normal&text_u_decoration_h=none&hideEmptyChannels&iconset=default_mono_2014";
                        ts3v_display.init(ts3v_url_1, 1101575, 100);
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
