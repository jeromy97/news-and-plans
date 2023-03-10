@include('header')

<div class="container">
    <div class="row">
        <div class="col-auto ms-auto">
            <a href="{{route('newsAdd')}}" class="btn btn-primary mb-3">New item</a>
        </div>
    </div>
    <div class="card news">
        <h2 class="card-header">
            News
        </h2>
        <div class="card-body">
            @if (!$news->isEmpty())
                @foreach ($news as $item)
                    <div class="row">
                        <div class="{{$item->image === null ? 'col-12' : 'col-md-8'}}">
                            <div class="{{$item->special === '1' ? 'text-danger' : ''}} mb-2">
                                <h3 class="card-title"><a href="{{url("news/$item->id")}}">{{$item->title}}</a></h3>
                                <div class="card-subtitle mb-2 text-{{$item->special === '1' ? 'danger-emphasis' : 'muted'}}"><small>Created by {{$item->user->name}} on {{$item->created_at}}</small></div>
                                <p class="card-text">{{$item->text}}</p>
                            </div>
                            <div class="btn-group" role="group">
                                <a href="{{url("news/$item->id/edit")}}" class="btn btn-outline-warning btn-sm ms-auto mb-3">Edit</a>
                            </div>
                        </div>
                        @if ($item->image !== null)
                            <div class="col-md-4">
                                <img src="{{$item->image}}" alt="image" class="img-fluid">
                            </div>
                        @endif
                    </div>
                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach
                {{$news->links()}}
            @else
                <div class="col-12 text-center">No news items were found</div>
            @endif
        </div>
    </div>
</div>

@include('footer')