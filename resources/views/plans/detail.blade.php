@include('header')

<div class="container">
    <div class="row">
        <div class="col-auto">
            <a href="{{route('plans')}}" class="btn btn-secondary mb-3">Back</a>
        </div>
        <div class="col-auto ms-auto">
            <div class="btn-group" role="group">
                <a href="{{url("plans/$plan->id/edit")}}" class="btn btn-warning">Edit</a>
                <a href="{{url("plans/$plan->id/publish")}}" class="btn btn-success">Publish</a>
            </div>
        </div>
    </div>
    <div class="card {{$plan->special === '1' ? 'text-danger' : ''}}">
        <h2 class="card-header">
            {{$plan->title}}
        </h2>
        <div class="card-body">
            <div class="card-subtitle mb-2 text-{{$plan->special === '1' ? 'danger-emphasis' : 'muted'}}">Created by {{$plan->user->name}} on {{$plan->created_at}}</div>
            <p class="card-text">{{$plan->description}}</p>
        </div>
    </div>
</div>

@include('footer')