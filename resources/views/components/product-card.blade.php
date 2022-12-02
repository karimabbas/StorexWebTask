<!-- Start Single movie -->

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    @stack('styles')
</head>
<div class="single-movie">
    <div class="movie-image">
        <img src="{{ $movie->image_url }}" alt="#">
        @if ($movie->id)
            <span class="sale-tag">{{ $movie->rate }}%</span>
        @endif

        <div class="button">
            <a href="{{ route('dashboard.movies.show', $movie->id) }}" class="btn btn-warning"><i
                    class="fas fa-film"></i>Show Movie</a>

        </div>
    </div>
    <div class="movie-info">
        <span class="category"><span class="text-danger bold">Category</span> : {{ $movie->category->title }}</span>
        <h5 class="title">
         <span class="text-warning">Movie : </span><a href="{{ route('dashboard.movies.show', $movie->title) }}">{{ $movie->title }}</a>
        </h5>
        <ul class="review">
            @for ($i = 1; $i <= 5; $i++)
                <i class="lni lni-star{{ $i <= $movie->rate ? '-filled' : '' }}"></i>
            @endfor
            <li><span>{{ $movie->rate }} Review(s)</span></li>
        </ul>

    </div>
</div>
<!-- End Single movie -->
