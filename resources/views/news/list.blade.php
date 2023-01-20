@include('header')

<div class="container">
    <div class="row">
        @if (!$news->isEmpty())
            @foreach ($news as $item)
                <div class="col-12">
                    <h2>{{$item->title}}</h2>
                    <div class="subtitle">{{$item->created_at}} | {{$item->user}}</div>
                    <div>{{$item->text}}</div>
                </div>
            @endforeach
        @else
            <div class="col-12 text-center">No news items were found</div>
        @endif
    </div>
</div>

@include('footer')