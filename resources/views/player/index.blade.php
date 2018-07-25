


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>SNo</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @if(count($players)==0)
        <tr>
            <td colspan="4" align="center">No Players added yet. </td>
        </tr>
        @else
	    @foreach ($players as $key=>$player)
	    <tr>
	        <td>{{$key+1}}</td>
	        <td>{{ $player['name'] }}</td>
	        <td>{{ $player['about'] }}</td>
	        <td>
                <form action="{{ route('player.destroy',$player['id']) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('player.show',$player['id']) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('player.edit',$player['id']) }}">Edit</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
	        </td>
	    </tr>
	    @endforeach

        @endif
    </table>

   

