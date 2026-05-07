@extends("layouts.yield")
{{-- Note: Removed the extra quotes around the title variable --}}
@section("title", $news->title)

@section("content")
    @include("layouts.header")

    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">

                @if(session()->has("updated"))
                    <div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert">
                        {{session()->get("updated")}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow-sm border-0 bg-body-tertiary overflow-hidden">

                    <img src="{{asset('storage/images/news/'.$news->image)}}"
                         class="card-img-top"
                         alt="{{$news->title}}"
                         style="max-height: 450px; object-fit: cover;">

                    <div class="card-body p-4 p-md-5">

                        <h1 class="card-title fw-bold mb-3">{{$news->title}}</h1>

                        <div class="d-flex flex-wrap gap-3 text-muted border-bottom pb-3 mb-4 small">
                            <div><span class="fw-bold text-secondary">Author:</span> {{$news->user->name}}</div>
                            <div><span class="fw-bold text-secondary">Published:</span> {{ \Carbon\Carbon::parse($news->created_at)->format('F j, Y') }}</div>
                            @if($news->created_at != $news->updated_at)
                                <div><span class="fw-bold text-secondary">Updated:</span> {{ \Carbon\Carbon::parse($news->updated_at)->format('F j, Y') }}</div>
                            @endif
                        </div>

                        <div class="card-text fs-6 fs-md-5 text-wrap" style="line-height: 1.8;">
                            {{-- nl2br allows line breaks from the database to render properly on the page --}}
                            {!! nl2br(e($news->content)) !!}
                        </div>

                        <div class="mt-5 pt-3 border-top">
                            <a class="btn btn-outline-secondary px-4" href="{{route('news.index')}}">
                                &larr; Back to all news
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("layouts.footer")
@endsection
