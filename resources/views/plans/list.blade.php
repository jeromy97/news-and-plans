@include('header')

<div class="container">
    <div class="row">
        <div class="col-auto ms-auto">
            <a href="{{route('plansAdd')}}" class="btn btn-primary mb-3">New plan</a>
        </div>
    </div>
    <h2>Plans</h2>
    @if (!$plans->isEmpty())
        <div class="row">
            @foreach ($plans as $plan)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">{{$plan->title}}</h3>
                            <div class="card-subtitle mb-2 text-muted"><small>Created by {{$plan->user->name}} on {{$plan->created_at}}</small></div>
                            <p class="card-text">{{$plan->description}}</p>
                            <div class="btn-group" role="group">
                                <a href="{{url("plans/$plan->id")}}" class="btn btn-outline-primary btn-sm ms-auto mb-3">View</a>
                                <a href="{{url("plans/$plan->id/edit")}}" class="btn btn-outline-warning btn-sm ms-auto mb-3">Edit</a>
                                <a href="{{url("plans/$plan->id/publish")}}" class="btn btn-outline-success btn-sm ms-auto mb-3">Publish</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center">No plans were found</div>
    @endif
</div>

@include('footer')