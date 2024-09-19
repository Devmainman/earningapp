<form action="{{ route('client.videos.store') }}" method="POST">
    @csrf
    <label for="youtube_url">YouTube Video URL:</label>
    <input type="url" id="youtube_url" name="youtube_url" required>
    <button type="submit">Upload Video</button>
</form>
