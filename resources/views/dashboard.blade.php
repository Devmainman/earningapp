<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!-- Messages Container -->
<div id="message-container" class="fixed top-0 left-0 w-full z-50"></div>

<body class="bg-white-50">
<div class="lg:hidden bg- p-6  max-w-md mx-auto">
  <!-- User Profile Section -->
  <div class="flex items-center space-x-4">
    <img src="https://via.placeholder.com/50" alt="Profile Picture" class="w-14 h-14 rounded-full">
    <div>
      <p class="text-gray-500">Hello!</p>
      <p class="font-bold text-lg text-black">{{ auth()->user()->name }}</p>
    </div>
    <div class="ml-auto relative">
      <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
      <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">1</span>
    </div>
  </div>

  <!-- Balance Section -->
  <div class="mt-6 bg-black p-3 rounded-lg  text-white flex justify-between items-center">
    <div>
      <p class="text-sm">Total Balance</p>
      <p class="text-4xl font-bold">${{ auth()->user()->balance }}</p>
    </div>
    <div class="flex flex-col items-end">
      <a href="#" class="text-sm underline">Transaction History</a>
      <button style="background-color: #FFB800; color: white;" class="mt-2 px-4 py-2 bg-yellow-600 text-white font-bold rounded-lg">Withdraw</button>
    </div>
  </div>
</div>

<!-- Desktop Version -->
<div class="hidden lg:flex bg-black text-white p-4 w-full max-w-full mx-auto items-center justify-between relative">
  <!-- Button on the Far Right -->
  <div class="absolute right-0 top-1/2 transform -translate-y-1/2 p-4">
  <button style="background-color: #FFB800; color: white;" class="mt-2 px-4 py-2 bg-yellow-600 text-white font-bold rounded-lg">Withdraw</button>
  </div>

  <!-- Logo and Search Bar -->
  <div class="flex items-center space-x-4 flex-grow">
    <p class="text-white">Hello!</p>
    <p class="font-bold text-lg text-white">{{ auth()->user()->name }}</p>
    <p class="text-lg font-bold text-white">${{ auth()->user()->balance }}</p>
    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a7 7 0 110 14 7 7 0 010-14zm0 0l6 6m-6-6l-6 6"></path></svg>
  </div>
</div>







        <!-- Toggle Buttons -->
        <div class="flex justify-center space-x-4 mb-4">
    <button class="toggle-btn flex items-center space-x-2 border-b-4 border-transparent hover:border-yellow-500 text-black-500 py-2 px-4 rounded-lg transition-all duration-300" onclick="showSection('youtube')">
        <!-- YouTube Icon -->
        <i class="fab fa-youtube fa-lg text-red-600"></i>
        <span>YouTube Videos</span>
    </button>
    <button class="toggle-btn flex items-center space-x-2 border-b-4 border-transparent hover:border-yellow-500 text-black-500 py-2 px-4 rounded-lg transition-all duration-300" onclick="showSection('linkedin')">
        <!-- LinkedIn Icon -->
        <i class="fab fa-linkedin fa-lg text-blue-600"></i>
        <span>LinkedIn Posts</span>
    </button>
</div>



        <!-- Sections -->
        <div id="youtube-section" class="sections mb-8">
            <div class="section bg-white p-4 rounded-lg">
                <div class="section-header text-2xl font-bold mb-6 text-center md:text-left">YouTube Videos</div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($videos as $video)
                    <div class="video-task bg-white rounded-lg p-4 flex flex-col items-center">
                        <div class="relative w-full pb-56 mb-4">
                            <iframe id="youtube-video-{{ $video->id }}" class="absolute top-0 left-0 w-full h-full rounded-lg" src="https://www.youtube.com/embed/{{ $video->video_id }}?enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                        <div class="video-task-info text-center">
                            <div class="reward text-lg font-bold text-green-500 mb-2">$0.4</div>
                            <div class="video-title text-sm font-medium text-gray-700">{{ $video->title }}</div>
                        </div>
                        <button id="increase-balance-btn-{{ $video->id }}" class="hidden mt-4 bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg" onclick="increaseBalance({{ $video->id }})">
                            Increase Balance
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div id="linkedin-section" class="hidden mb-8">
            <div class="section bg-white p-4 rounded-lg">
                <div class="section-header text-2xl font-bold mb-6">LinkedIn Posts</div>
                @if($linkedinPosts->isNotEmpty())
                @foreach($linkedinPosts as $post)
                <div class="linkedin-post mb-4">
                    <a href="{{ $post->url }}" target="_blank" class="post-thumbnail">
                        <img src="{{ $post->thumbnail_url }}" alt="Post Thumbnail" class="w-full h-auto rounded-lg">
                    </a>
                    <div class="post-content mt-2">
                        <p class="text-gray-700">{{ $post->content }}</p>
                        <a href="{{ $post->url }}" target="_blank" class="read-more-button text-blue-500 hover:underline" data-post-id="{{ $post->id }}">Read More</a>

                    </div>
                </div>
                @endforeach
                @else
                <p class="text-gray-500">No LinkedIn posts available.</p>
                @endif
            </div>
        </div>

        <div class="fixed inset-x-0 bottom-0 z-50 w-full h-16 bg-white border-t border-gray-200">
    <div class="grid grid-cols-3 h-full max-w-lg mx-auto text-center">
        <!-- Home Link -->
        <a href="{{ route('dashboard') }}" class="flex flex-col justify-center items-center hover:bg-gray-50">
            <svg class="w-6 h-6 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M19.707 9.293l-2-2-7-7a1 1 0 00-1.414 0l-7 7-2 2a1 1 0 101.414 1.414L2 10.414V18a2 2 0 002 2h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a2 2 0 002-2v-7.586l.293.293a1 1 0 001.414-1.414z"></path>
            </svg>
            <span class="text-xs text-amber-400">Home</span>
        </a>
        <!-- Wallet Link -->
        <a href="{{ route('wallet') }}" class="flex flex-col justify-center items-center hover:bg-gray-50">
            <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                <path d="M11.074 4L8.442.408A.95.95 0 007.014.254L2.926 4h8.148zM9 13v-1a4 4 0 014-4h6V6a1 1 0 00-1-1H1a1 1 0 00-1 1v13a1 1 0 001 1h17a1 1 0 001-1v-2h-6a4 4 0 01-4-4z"></path>
            </svg>
            <span class="text-xs text-gray-500">Wallet</span>
        </a>
        <!-- Profile Link -->
        <a href="{{ route('profile') }}" class="flex flex-col justify-center items-center hover:bg-gray-50">
            <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zM8 15a1 1 0 110-2h4a1 1 0 110 2H8zm2-11a1.5 1.5 0 00-1 2.707V9.5a1 1 0 002 0V6.707A1.5 1.5 0 0010 4z"></path>
            </svg>
            <span class="text-xs text-gray-500">Profile</span>
        </a>
    </div>
</div>


                



<script>
    var players = {};

    function onYouTubeIframeAPIReady() {
        @foreach($videos as $video)
            players[{{ $video->id }}] = new YT.Player('youtube-video-{{ $video->id }}', {
                events: {
                    'onStateChange': function(event) {
                        onPlayerStateChange(event, {{ $video->id }});
                    }
                }
            });
        @endforeach
    }

    function onPlayerStateChange(event, videoId) {
        if (event.data === YT.PlayerState.ENDED) {
            document.getElementById('increase-balance-btn-' + videoId).style.display = 'block';
            markVideoAsWatched(videoId);
        }
    }

    function increaseBalance(videoId) {
        fetch(`/videos/${videoId}/increase-balance`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showMessage('success', `Balance increased! New balance: $${data.new_balance}`);
                location.reload();  // Reload to update the balance display
            } else {
                showMessage('error', `Error: ${data.message}`);
            }
        })
        .catch(error => showMessage('error', 'An error occurred. Please try again later.'));
    }

    function markVideoAsWatched(videoId) {
        fetch(`/videos/${videoId}/watched`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ videoId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showMessage('success', 'Video watched! Balance updated.');
            } else {
                showMessage('error', `Error: ${data.message}`);
            }
        })
        .catch(error => showMessage('error', 'An error occurred. Please try again later.'));
    }

    function showSection(section) {
        document.getElementById('youtube-section').classList.add('hidden');
        document.getElementById('linkedin-section').classList.add('hidden');

        if (section === 'youtube') {
            document.getElementById('youtube-section').classList.remove('hidden');
        } else if (section === 'linkedin') {
            document.getElementById('linkedin-section').classList.remove('hidden');
        }
    }

    // Function to display styled messages
    function showMessage(type, message) {
        const messageContainer = document.getElementById('message-container');
        const messageDiv = document.createElement('div');
        messageDiv.className = `p-4 mb-4 text-sm ${type === 'success' ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100'} rounded-lg shadow-md`;
        messageDiv.innerHTML = `<span class="font-bold">${type === 'success' ? 'Success' : 'Error'}:</span> ${message}`;
        messageContainer.appendChild(messageDiv);

        // Automatically remove message after 5 seconds
        setTimeout(() => {
            messageDiv.remove();
        }, 5000);
    }

    function updateBalance() {
    fetch('{{ route('balance.update') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showMessage('success', `Balance updated! New balance: $${data.new_balance}`);
        } else {
            showMessage('error', `Error: ${data.message}`);
        }
    })
    .catch(error => showMessage('error', 'An error occurred. Please try again later.'));
}

document.querySelectorAll('.read-more-button').forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();
        updateBalance(); // Update balance on click
        window.open(event.currentTarget.href, '_blank'); // Open LinkedIn post
    });
});

</script>

<!-- Load YouTube iframe API -->
<script src="https://www.youtube.com/iframe_api"></script>



    



</body>
</html>
