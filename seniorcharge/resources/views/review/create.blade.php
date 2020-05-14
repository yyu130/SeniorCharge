@extends('cmsLayout')
@section('mycontent')
<body style="background-color: #f0efef">
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Add Review</h3>
        <br />

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif

        <form method="post" action="{{url('review')}}">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="station_id" class="form-control" placeholder="Enter Station ID" />
            </div>
            <div class="form-group">
                <input type="text" name="is_working" class="form-control" placeholder="Enter Is Working" />
            </div>
            <div class="form-group">
                <input type="text" name="rating" class="form-control" placeholder="Enter Rating" />
            </div>
<!--            <div class="form-group">-->
<!--                <input type="text" name="comments" class="form-control" placeholder="Enter comments" />-->
<!--            </div>-->

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add</button>
                <a href="{{route('review.index')}}" class="btn btn-primary">Back</a>
            </div>
        </form>
    </div>
</div>
</body>
@endsection
