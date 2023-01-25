@include('header')

<div class="container">
    <div class="row">
        <div class="col-auto">
            <a href="{{url("news/$news->id")}}" class="btn btn-secondary mb-3">Back</a>
        </div>
    </div>
    <div class="card">
        <h2 class="card-header">
            Edit item
        </h2>
        <div class="card-body">
            <form action="{{url("news/update")}}" method="post">
                @csrf

                <input type="hidden" name="id" value="{{$news->id}}">

                <label for="title" class="form-label">Title <small>*</small></label>
                <input type="text" class="form-control" id="title" name="title" value="{{$news->title}}" required autofocus>
                <br>

                <label for="text" class="form-label">Body <small>*</small></label>
                <textarea name="text" id="text" class="form-control" required>{{$news->text}}</textarea>
                <br>

                <div class="form-check">
                    <input type="checkbox" name="special" id="special" class="form-check-input" {{$news->special === '1' ? 'checked' : ''}}>
                    <label for="special" class="form-check-label">Is special?</label>
                </div>
                <br>

                <input type="submit" value="Inloggen" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

@include('footer')