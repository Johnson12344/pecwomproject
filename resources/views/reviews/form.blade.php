


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('reviews.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="rating">Rating (1-5):</label>
        <input type="number" name="rating" min="1" max="5" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="comment">Review:</label>
        <textarea name="comment" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Review</button>
</form>
