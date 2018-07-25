@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Team</h2>
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



     <form action="{{ route('team.update',$team['id']) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">

        <!-- @method('POST') -->
        @csrf





        <div class="row">
            <div class="col-md-5">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" value="{{$team['name']}}" placeholder="Title">
            </div>
            <div class="col-md-5">
                <strong>code:</strong>
                <input type="text" name="code" class="form-control" value="{{$team['code']}}" placeholder="Title" readonly>
            </div>
            
        </div>

       <div class="row">
            <div class="col-md-5">
                <strong>Description:</strong>
                <textarea name="description"  class="form-control"> {{$team['description']}}</textarea>
            </div>
            <div class="col-md-5">
                
               <strong> <label for="files" class="btn">Click to Change Image:</label></strong>
               <input type="file" name="image" id="files" onchange="document.getElementById('image_url').src = window.URL.createObjectURL(this.files[0])" value="{{$team['logo_uri']}}" class="form-control" style="display: none;" >

                <img id="image_url"  src="{{URL::asset(config('constants.TEAM_IMAGE_PATH').$team['logo_uri'])}}" width="200" height="100" />


            </div>
           
        </div>

          <div class="row">
          
            <div class="col-md-2">
                <br/>
                <input type="hidden" name='id' value="{{$team['id']}}">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>



    </form> 

@endsection