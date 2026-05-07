@extends("layouts.yield")
@section("title", "All news")

@section("content")
    @include("layouts.header")

    <div class="container-fluid px-0 mt-4">
        @if(session()->has("created"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get("created")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has("deleted"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session()->get("deleted")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="my-4">
            @if($news->isEmpty())
                <div class="text-center py-5">
                    <h3 class="text-secondary fw-bold">No news available</h3>
                    <p class="text-muted">Check back later for updates.</p>
                </div>
            @else
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-lg-10">
                        @foreach($news as $one)
                            <div class="card mb-4 shadow-sm border-0 bg-body-tertiary">
                                <div class="row g-0 align-items-stretch">

                                    <div class="col-md-4 col-lg-3">
                                        <img alt="{{$one->title}}"
                                             class="img-fluid h-100 w-100 rounded-top rounded-md-start"
                                             style="object-fit: cover; min-height: 200px;"
                                             src="{{asset('storage/images/news/'.$one->image)}}">
                                    </div>

                                    <div class="col-md-8 col-lg-9">
                                        <div class="card-body d-flex flex-column h-100 py-3">

                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h4 class="card-title fw-bold mb-0">{{$one->title}}</h4>
                                            </div>

                                            <div class="text-muted small mb-3">
                                                <span class="me-3"><i class="bi bi-person-fill"></i> {{$one->user->name}}</span>
                                                <span class="me-3"><i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($one->created_at)->format('M d, Y') }}</span>
                                                @if($one->created_at != $one->updated_at)
                                                    <span><i class="bi bi-pencil-square"></i> Edited: {{ \Carbon\Carbon::parse($one->updated_at)->format('M d, Y') }}</span>
                                                @endif
                                            </div>

                                            <p class="card-text flex-grow-1">
                                                {{\Illuminate\Support\Str::limit($one->content, 500)}}
                                            </p>

                                            <div class="mt-3 d-flex flex-wrap gap-2 align-items-center border-top pt-3">
                                                <a href="{{route('news.show', $one->id)}}" class="btn btn-primary">More details</a>

                                                @can("update", $one)
                                                    <a href="{{route('news.edit', $one->id)}}" class="btn btn-warning">Edit</a>
                                                @endcan

                                                @can("delete", $one)
                                                    <form class="d-inline m-0" method="post" action="{{route('news.destroy', $one->id)}}" onsubmit="return onDelete('news')">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                @endcan
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    @include("layouts.footer")
@endsection
