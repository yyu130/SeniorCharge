@extends('cmsLayout')
@section('mycontent')
@if(isset(Auth::user()->email))

<body style="background-color: #f0efef">

<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Edit Review</h3>
        <br />
        @if(count($errors) > 0)

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            <form method="post" action="{{action('ReviewController@update', $id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH" />
                <div class="form-group">
                    <input type="text" name="station_id" class="form-control" value="{{$review->station_id}}" placeholder="Enter Station ID" />
                </div>
                <div class="form-group">
                    <input type="text" name="is_working" class="form-control" value="{{$review->is_working}}" placeholder="Enter Working Status" />
                </div>
                <div class="form-group">
                    <input type="text" name="rating" class="form-control" value="{{$review->rating}}" placeholder="Enter Rating" />
                </div>
<!--                <div class="form-group">-->
<!--                    <input type="text" name="comments" class="form-control" value="{{$review->comments}}" placeholder="Enter Comments" />-->
<!--                </div>-->
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Edit" />
                    <a href="{{route('review.index')}}" class="btn btn-primary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
@else
<script>window.location = "/main";</script>
@endif
@endsection
