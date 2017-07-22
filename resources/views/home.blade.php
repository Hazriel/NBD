@extends('layouts.layout')

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
                                <i>by <a href="#">wappa</a>, 11/09/2001</i>
                            </div>
                        </div>
                        <div class="news-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut aliquet nibh in cursus sodales. Morbi pellentesque mollis felis ac aliquet. In non neque est. Proin ultricies urna quis iaculis molestie. Nulla elit nisi, viverra eu dui et, pellentesque finibus risus. Fusce eros velit, sollicitudin dignissim metus viverra, dignissim iaculis arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam mollis justo nisi, at suscipit risus aliquet in. Suspendisse at nulla pellentesque lacus sagittis bibendum. Aliquam sodales, urna et tempor ultricies, quam dolor interdum ipsum, ut ultricies diam mi rutrum tortor.</p>
                            <p>Aenean commodo laoreet pretium. Donec imperdiet tortor lorem, blandit elementum risus cursus eget. Maecenas feugiat leo in sollicitudin pharetra. Fusce egestas leo eu pellentesque posuere. Aliquam a ligula eu metus porttitor ultrices sed id nunc. Sed sodales sollicitudin neque eu facilisis. Nunc mollis, arcu sed condimentum egestas, elit ante porta dui, non egestas ante elit ut tellus. Etiam imperdiet ex ac turpis vehicula, a maximus lacus posuere. Donec dictum augue non vulputate scelerisque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed interdum magna lectus, in molestie nisi efficitur faucibus. Integer auctor augue eget vestibulum tempus.</p>
                            <p>Morbi tempus iaculis mi vitae bibendum. Aenean risus dui, tempus eget lorem sed, bibendum dapibus sem. Sed ac rhoncus nibh, ut interdum justo. Vestibulum et urna sapien. Nulla et libero in magna eleifend venenatis. Donec finibus euismod neque, vel consequat mauris posuere at. Maecenas ullamcorper libero sit amet velit semper, eget imperdiet urna tincidunt. Sed vitae nisi porta, euismod sapien sodales, interdum nunc. </p>
                        </div>
                    </div>

                    <div class="news">
                        <div class="news-header">
                            <h2>French guy fucked in ass by norwegian water</h2>
                            <div class="news-info">
                                <i>by <a href="#">wappa</a>, 22/07/2001</i>
                            </div>
                        </div>
                        <div class="news-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut aliquet nibh in cursus sodales. Morbi pellentesque mollis felis ac aliquet. In non neque est. Proin ultricies urna quis iaculis molestie. Nulla elit nisi, viverra eu dui et, pellentesque finibus risus. Fusce eros velit, sollicitudin dignissim metus viverra, dignissim iaculis arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam mollis justo nisi, at suscipit risus aliquet in. Suspendisse at nulla pellentesque lacus sagittis bibendum. Aliquam sodales, urna et tempor ultricies, quam dolor interdum ipsum, ut ultricies diam mi rutrum tortor.</p>
                            <p>Aenean commodo laoreet pretium. Donec imperdiet tortor lorem, blandit elementum risus cursus eget. Maecenas feugiat leo in sollicitudin pharetra. Fusce egestas leo eu pellentesque posuere. Aliquam a ligula eu metus porttitor ultrices sed id nunc. Sed sodales sollicitudin neque eu facilisis. Nunc mollis, arcu sed condimentum egestas, elit ante porta dui, non egestas ante elit ut tellus. Etiam imperdiet ex ac turpis vehicula, a maximus lacus posuere. Donec dictum augue non vulputate scelerisque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed interdum magna lectus, in molestie nisi efficitur faucibus. Integer auctor augue eget vestibulum tempus.</p>
                            <p>Morbi tempus iaculis mi vitae bibendum. Aenean risus dui, tempus eget lorem sed, bibendum dapibus sem. Sed ac rhoncus nibh, ut interdum justo. Vestibulum et urna sapien. Nulla et libero in magna eleifend venenatis. Donec finibus euismod neque, vel consequat mauris posuere at. Maecenas ullamcorper libero sit amet velit semper, eget imperdiet urna tincidunt. Sed vitae nisi porta, euismod sapien sodales, interdum nunc. </p>
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