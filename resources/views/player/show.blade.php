@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> {{ $player['name'] }} Details</h2>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $player['name'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                {{ $player['code'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>About:</strong>
                {{ $player['about'] }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Logo:</strong>
                 <img src="{{URL::asset(config('constants.PLAYER_IMAGE_PATH').$player['image_uri'])}}">
            </div>
        </div>
    </div>

     <div class="row">
        <div class="col-lg-12 margin-tb">
           
            <div class="text-center">
                <a class="btn btn-success" href="{{ route('team.show',$player['team_id']) }}"> Go Back</a>
            </div>
        </div>
    </div>
@endsection