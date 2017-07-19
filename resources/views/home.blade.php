@extends('layouts.layout')

@section('content')
    <div class="container">
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
    </div>
@endsection
