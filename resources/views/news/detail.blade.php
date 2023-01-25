@include('header')

<div class="container">
    <div class="row">
        <div class="col-auto">
            <a href="{{route('news')}}" class="btn btn-secondary mb-3">Back</a>
        </div>
        <div class="col-auto ms-auto">
            <a href="{{url("news/$news->id/edit")}}" class="btn btn-warning">Edit</a>
        </div>
    </div>
    <div class="card {{$news->special === '1' ? 'text-danger' : ''}}">
        <h2 class="card-header">
            {{$news->title}}
        </h2>
        <div class="card-body">
            <div class="card-subtitle mb-2 text-{{$news->special === '1' ? 'danger-emphasis' : 'muted'}}">Created by {{$news->user->name}} on {{$news->created_at}}</div>
            <p class="card-text">{{$news->text}}</p>
        </div>
    </div>
</div>

@include('footer')