@extends("admin.layout")

@section("title", "Park")

@section("content")
<div>
    <h1>{{ $item->name }}</h1>
    <p>{{ $item->street }}, {{ $item->city }}, {{ $item->country }}</p>
    <p>{{ $item->area }} m<sup>2</sup></p>
    <p>{{ $item->opens_at }}</p>
    <p>{{ $item->closes_at }}</p>
    <a href="{{ $item->google_maps_url }}" target="_blank">Google Maps</a>
    <div>
        @foreach ($item->images as $image)
            <img src="{{ asset('storage/' . $image->filename) }}" alt="Image">
        @endforeach
    </div>
    <div>
        <h2>Activities</h2>
        @foreach ($item->activities as $activity)
            <p>{{ $activity->activity->name }}</p>
        @endforeach
    </div>
</div>
@endsection