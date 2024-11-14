@extends("admin.layout")

@section("title", "Parks")

@section("content")
<div>
    @foreach ($items as $item)
        <div>
            <p>{{ $item->name }}</p>
            <a href="{{ route('park.details', $item->slug) }}">Details</a>
        </div>
    @endforeach
</div>
@endsection