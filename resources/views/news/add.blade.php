@include('header')

<div class="container">
    <div class="card">
        <h2 class="card-header">
            New item
        </h2>
        <div class="card-body">
            @include('modules/errors')

            <form action="{{route('newsCreate')}}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="title" class="form-label">Title <small>*</small></label>
                <input type="text" class="form-control" id="title" name="title" required autofocus>
                <br>

                <label for="text" class="form-label">Body <small>*</small></label>
                <textarea name="text" id="text" class="form-control" rows="6" required></textarea>
                <br>

                <label for="files" class="form-label">Afbeeldingen</label>
                <input type="file" name="file" id="file" class="form-control">
                <br>

                <div class="form-check">
                    <input type="checkbox" name="special" id="special" class="form-check-input">
                    <label for="special" class="form-check-label">Is special?</label>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>

@include('footer')