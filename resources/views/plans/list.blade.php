@include('header')

<div class="container">
    <div class="row">
        <div class="col-auto ms-auto">
            <a href="{{route('plansAdd')}}" class="btn btn-primary mb-3">New plan</a>
        </div>
    </div>
    <div class="card">
        <h2 class="card-header">
            Plans
        </h2>
        <div class="card-body">
            @if (!$plans->isEmpty())
                @foreach ($plans as $plan)
                    <h3 class="card-title">{{$plan->title}}</h3>
                    <div class="card-subtitle mb-2 text-muted">Created by {{$plan->user->name}} on {{$plan->created_at}}</div>
                    <p class="card-text">{{$plan->description}}</p>
                    <div class="btn-group" role="group">
                        <a href="{{url("plans/$plan->id")}}" class="btn btn-outline-primary btn-sm ms-auto mb-3">View</a>
                        <a href="{{url("plans/$plan->id/edit")}}" class="btn btn-outline-warning btn-sm ms-auto mb-3">Edit</a>
                    </div>
                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach
            @else
                <div class="col-12 text-center">No plans were found</div>
            @endif
        </div>
    </div>
</div>

@include('footer')