@include('header')

<div class="container">
    <div class="row">
        <div class="col-auto">
            <a href="{{url("plans/$plan->id")}}" class="btn btn-secondary mb-3">Cancel</a>
        </div>
    </div>
    <div class="card">
        <h2 class="card-header">
            Publish as news item
        </h2>
        <div class="card-body">
            <form action="{{url("plans/publish")}}" method="post">
                @csrf

                <input type="hidden" name="id" value="{{$plan->id}}">

                <label for="title" class="form-label">Title <small>*</small></label>
                <input type="text" class="form-control" id="title" name="title" value="{{$plan->title}}" required autofocus>
                <br>

                <label for="text" class="form-label">Body <small>*</small></label>
                <textarea name="text" id="text" class="form-control" required>{{$plan->description}}</textarea>
                <br>

                <div class="form-check">
                    <input type="checkbox" name="special" id="special" class="form-check-input" {{$plan->special === '1' ? 'checked' : ''}}>
                    <label for="special" class="form-check-label">Is special?</label>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Publish</button>
            </form>
        </div>
    </div>
</div>

@include('footer')