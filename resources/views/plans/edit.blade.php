@include('header')

<div class="container">
    <div class="row">
        <div class="col-auto">
            <a href="{{url("plans/$plan->id")}}" class="btn btn-secondary mb-3">Back</a>
        </div>
    </div>
    <div class="card">
        <h2 class="card-header">
            Edit plan
        </h2>
        <div class="card-body">
            <form action="{{url("plans/update")}}" method="post">
                @csrf

                <input type="hidden" name="id" value="{{$plan->id}}">

                <label for="title" class="form-label">Title <small>*</small></label>
                <input type="text" class="form-control" id="title" name="title" value="{{$plan->title}}" required autofocus>
                <br>

                <label for="text" class="form-label">Description <small>*</small></label>
                <textarea name="description" id="description" class="form-control" required>{{$plan->description}}</textarea>
                <br>

                <div class="form-check">
                    <input type="checkbox" name="special" id="special" class="form-check-input">
                    <label for="special" class="form-check-label" {{$plan->special === '1' ? 'checked' : ''}}>Is special?</label>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

@include('footer')