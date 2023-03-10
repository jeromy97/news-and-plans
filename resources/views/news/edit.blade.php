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
            @include('modules/errors')

            <form action="{{ route('news.update', ['news' => $news->id]) }}" method="post">
                @csrf

                <label for="title" class="form-label">Title <small>*</small></label>
                <input type="text" class="form-control" id="title" name="title" value="{{$news->title}}" required autofocus>
                <br>

                <label for="text" class="form-label">Body <small>*</small></label>
                <textarea name="text" id="text" class="form-control" rows="6" required>{{$news->text}}</textarea>
                <br>

                @if ($news->image !== null)
                    <div id="existing-image">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{$news->image}}" alt="image" class="img-fluid">
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger" id="remove-image">Verwijder afbeelding</button>
                    </div>
                @endif

                <div id="new-image" class="{{$news->image === null ? '' : 'd-none'}}">
                    <label for="files" class="form-label">Afbeeldingen</label>
                    <input type="file" name="file" id="file" class="form-control">
                    <br>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="special" id="special" class="form-check-input" {{$news->special === '1' ? 'checked' : ''}}>
                    <label for="special" class="form-check-label">Is special?</label>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(() => {
        $('button#remove-image').on('click', removeImage);
    });

    /**
     * Append a hidden input to the form which indicates that the existing image should be removed from the news item.
     * Hide the example image.
     * Show the file input.
     */
    function removeImage() {
        $('form').append('<input type="hidden" name="remove_image" value="true">');
        $('#existing-image').hide();
        $('#new-image').show();
    }
</script>

@include('footer')