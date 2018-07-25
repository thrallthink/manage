@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center">
                <h2>Team</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('team.create') }}"> Create Team</a>
            </div>
        </div>
    </div>


<div class="row mt-25 " >
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>

         @if(count($teams)==0)
        <tr>
            <td colspan="4" align="center">No Teams added yet. </td>
        </tr>
        @else
	    @foreach ($teams as $team)

	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $team['name'] }}</td>
	        <td>{{ $team['description'] }}</td>
	        <td>
                <form action="{{ route('team.destroy',$team['id']) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('team.show',$team['id']) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('team.edit',$team['id']) }}">Edit</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
	        </td>
	    </tr>
	    @endforeach

        @endif
    </table>

</div>

   

@endsection