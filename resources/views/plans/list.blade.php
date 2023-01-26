@include('header')

<div class="container">
    <div class="row">
        <div class="col-auto ms-auto">
            <a href="{{route('plansAdd')}}" class="btn btn-primary mb-3">New plan</a>
        </div>
    </div>
    <h2>Plans</h2>
    @if (!$plans->isEmpty())
        <div class="row plans">
            @foreach ($plans as $plan)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="{{$plan->special === '1' ? 'text-danger' : ''}} mb-2">
                                <h3 class="card-title"><a href="{{url("plans/$plan->id")}}">{{$plan->title}}</a></h3>
                                <div class="card-subtitle mb-2 text-{{$plan->special === '1' ? 'danger-emphasis' : 'muted'}}"><small>Created by {{$plan->user->name}} on {{$plan->created_at}}</small></div>
                                <p class="card-text">{{$plan->description}}</p>
                            </div>
                            <div class="btn-group" role="group">
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