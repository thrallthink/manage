@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Team</h2>
            </div>
           
        </div>
    </div>



    <form action="{{ route('team.store') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">


        {!! csrf_field() !!}


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Please fix below suggested input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


<!--         @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif -->


        <div class="row">
            <div class="col-md-5">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{old('name')}}">
            </div>
            <div class="col-md-5">
                <strong>Code:</strong>
                <input type="text" name="code" class="form-control" placeholder="Team Code" value="{{$teamcode}}" readonly>
            </div>
            
        </div>

       <div class="row">
            <div class="col-md-5">
                <strong>Description:</strong>
                <textarea name="description" class="form-control" >{{old('description')}}</textarea>
            </div>
            <div class="col-md-5">
                <strong>Logo:</strong>
                <input type="file" name="image" class="form-control">
            </div>
           
        </div>

          <div class="row">
          
            <div class="col-md-2">
                <br/>
                <button type="submit" class="btn btn-success">Create Team</button>
            </div>
        </div>



    </form> 


@endsection