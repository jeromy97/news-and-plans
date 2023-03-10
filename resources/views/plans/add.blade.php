@include('header')

<div class="container">
    <div class="card">
        <h2 class="card-header">
            New plan
        </h2>
        <div class="card-body">
            <form action="{{route('plansCreate')}}" method="post">
                @csrf

                <label for="title" class="form-label">Title <small>*</small></label>
                <input type="text" class="form-control" id="title" name="title" required autofocus>
                <br>

                <label for="text" class="form-label">Description <small>*</small></label>
                <textarea name="description" id="description" class="form-control" required></textarea>
                <br>

                <div class="form-check">
                    <input type="checkbox" name="special" id="special" class="form-check-input">
                    <label for="special" class="form-check-label">Is special?</label>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

@include('footer')