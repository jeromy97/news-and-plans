@include('header')

<div class="container">
    <div class="row">
        <div class="col-auto ms-auto">
            <a href="{{route('newsAdd')}}" class="btn btn-primary mb-3">New item</a>
        </div>
    </div>
    <div class="card">
        <h2 class="card-header">
            News
        </h2>
        <div class="card-body">
            @if (!$news->isEmpty())
                @foreach ($news as $item)
                    <h3 class="card-title">{{$item->title}}</h3>
                    <div class="card-subtitle mb-2 text-muted">Created by {{$item->user->name}} on {{$item->created_at}}</div>
                    <p class="card-text">{{$item->text}}</p>
                    <div class="btn-group" role="group">
                        <a href="{{url("news/$item->id")}}" class="btn btn-outline-primary btn-sm ms-auto mb-3">View</a>
                        <a href="{{url("news/$item->id/edit")}}" class="btn btn-outline-warning btn-sm ms-auto mb-3">Edit</a>
                    </div>
                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach
            @else
                <div class="col-12 text-center">No news items were found</div>
            @endif
        </div>
    </div>
</div>

@include('footer')