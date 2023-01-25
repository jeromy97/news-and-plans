@include('header')

<div class="container">
    <div class="card">
        <h2 class="card-header">
            New item
        </h2>
        <div class="card-body">
            <form action="{{route('newsCreate')}}" method="post">
                @csrf

                <label for="title" class="form-label">Title <small>*</small></label>
                <input type="text" class="form-control" id="title" name="title" required autofocus>
                <br>

                <label for="text" class="form-label">Body <small>*</small></label>
                <textarea name="text" id="text" class="form-control" required></textarea>
                <br>

                <div class="form-check">
                    <input type="checkbox" name="special" id="special" class="form-check-input">
                    <label for="special" class="form-check-label">Is special?</label>
                </div>
                <br>

                <input type="submit" value="Inloggen" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

@include('footer')