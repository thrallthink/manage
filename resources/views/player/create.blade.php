@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Player</h2>
            </div>
           
        </div>
    </div>



    <form action="{{ route('player.store') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">


       @csrf


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif


        <div class="row">
            <div class="col-md-5">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Title" value="{{old('name')}}">
            </div>
            <div class="col-md-5">
                <strong>Code:</strong>
                <input type="text" name="code" class="form-control" placeholder="Title" value="{{$playercode}}" readonly>
            </div>
            
        </div>

       <div class="row">
            <div class="col-md-5">
                <strong>About:</strong>
                <textarea name="about" class="form-control" >{{old('about')}}</textarea>
            </div>
            <div class="col-md-5">
                <strong>Players Image:</strong>
                <input type="file" name="image" class="form-control">
            </div>
            <input type="hidden" name="team_id" value="{{$teamid}}">
           
        </div>

          <div class="row">
          
            <div class="col-md-2">
                <br/>
                <button type="submit" class="btn btn-success">Create Player</button>
            </div>
        </div>



    </form> 


@endsection