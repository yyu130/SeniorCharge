@extends('cmsLayout')
@section('mycontent')
@if(isset(Auth::user()->email))
<body style="background-color: #f0efef">
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Review Table</h3>
        <br />
        @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif
<!--        <div align="right">-->
<!--            <a href="{{route('review.create')}}" class="btn btn-primary">Add</a>-->
<!--            <br />-->
<!--            <br />-->
<!--        </div>-->
        <table class="table table-bordered table-striped">
            <tr>
                <th>Station ID</th>
                <th>Working Status</th>
                <th>Rating</th>
<!--                <th>Comments</th>-->
<!--                <th>Edit</th>-->
                <th>Delete</th>
            </tr>
            @foreach($reviews as $row)
            <tr>
                <td>{{$row['station_id']}}</td>
                @if ($row['is_working'] == 1)
                <td>Working</td>
                @else
                <td>Not Working</td>
                @endif
                <td>{{$row['rating']}}</td>
<!--                <td>{{$row['comments']}}</td>-->

<!--                <td><a href="{{action('ReviewController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>-->
                <td>
                    <form method="post" class="delete_form" action="{{action('ReviewController@destroy', $row['id'])}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $reviews->links() }}
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.delete_form').on('submit', function(){
            if(confirm("Are you sure you want to delete it?"))
            {
                return true;
            }
            else
            {
                return false;
            }
        });
    });
</script>
</body>
@else
<script>window.location = "/main";</script>
@endif
@endsection
