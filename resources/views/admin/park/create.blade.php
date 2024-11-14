@extends("admin.layout")

@section("title", "Add park")

@section("content")
<form action="{{ route('park.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <label for="street">Street:</label>
    <input type="text" id="street" name="street">
    <label for="city">City:</label>
    <input type="text" id="city" name="city">
    <label for="country">Country:</label>
    <input type="text" id="country" name="country">
    <label for="area">Area:</label>
    <input type="text" id="area" name="area">
    <label for="opens_at">Opens at:</label>
    <input type="text" id="opens_at" name="opens_at">
    <label for="closes_at">Closes at:</label>
    <input type="text" id="closes_at" name="closes_at">
    <label for="google_maps_url">Google maps url:</label>
    <input type="text" id="google_maps_url" name="google_maps_url">
    <label for="images">Images:</label>
    <input type="file" name="images[]" multiple accept=".jpeg,.jpg,.png,.webp">
    <p>Activities:</p>
    @foreach ($activities as $activity)
        <label for="activity_{{ $activity->name }}">{{ $activity->name }}</label>
        <input type="checkbox" name="activities[]" id="activity_{{ $activity->name }}" value="{{ $activity->id }}">
    @endforeach
    <button>Add park</button>
</form>
@endsection