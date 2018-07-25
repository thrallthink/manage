@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Player: {{$player['name']}}</h2>
            </div>
          
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix below suggested input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



     <form action="{{ route('player.update',$player['id']) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">

        <!--@method('PUT')-->
        @csrf


  


        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif


        <div class="row">
            <div class="col-md-5">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{$player['name']}}" placeholder="Title">
            </div>
            <div class="col-md-5">
                <strong>code:</strong>
                <input type="text" name="code" class="form-control" value="{{$player['code']}}" placeholder="Title" readonly>
            </div>
            
        </div>

       <div class="row">
            <div class="col-md-5">
                <strong>About:</strong>
                <textarea name="about"  class="form-control"> {{$player['about']}}</textarea>
            </div>
            <div class="col-md-5">
                
               <strong> <label for="files" class="btn">Click to Change Image:</label></strong>
               <input type="file" name="image" id="files" onchange="document.getElementById('image_url').src = window.URL.createObjectURL(this.files[0])" value="{{$player['image_uri']}}" class="form-control" style="display: none;" >

                <img id="image_url"  src="{{URL::asset(config('constants.PLAYER_IMAGE_PATH').$player['image_uri'])}}" width="200" height="100" />


            </div>
           
        </div>

        <div class="row">
            <div class="col-md-10">
                <strong>Change Team :</strong>
                  <select class="form-control" name="team_change_id">
                    @foreach($teams as $team)
                      <option value="{{$team['id']}}" @if($team['id']==$player['team_id']) {{'selected'}} @endif>{{$team['name']}}</option>
                    @endforeach
                  </select>
            </div>
            
        </div>



          <div class="row">
          
            <div class="col-md-2">
                <br/>
                <input type="hidden" name="team_id" value="{{$player['team_id']}}">
                <input type="hidden" name='id' value="{{$player['id']}}">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>



    </form> 

@endsection