<x-client-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h1 class="text-2xl font-bold mb-4">Order Reach</h1>
                    <p class="text-gray-500">Fill in the details below to get engagements</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-md mx-auto sm:px-6 lg:px-8 mt-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
            <form id="upload-form" action="{{ route('client.videos.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="url_type" class="block text-lg font-medium text-gray-700">Number of Engagement</label>
                    <select id="url_type" name="url_type" class="mt-2 block w-full p-3 bg-gray-100 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
                        <option value="youtube">YouTube Video URL</option>
                        <option value="linkedin">LinkedIn Post URL</option>
                    </select>
                </div>

                <div id="youtube_url_section" class="url-section mb-6">
                    <label for="youtube_url" class="block text-lg font-medium text-gray-700">YouTube Video URL</label>
                    <input type="url" id="youtube_url" name="youtube_url" class="mt-2 block w-full p-3 bg-gray-100 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <div id="linkedin_url_section" class="url-section hidden mb-6">
                    <label for="linkedin_url" class="block text-lg font-medium text-gray-700">LinkedIn Post URL</label>
                    <input type="url" id="linkedin_url" name="linkedin_url" class="mt-2 block w-full p-3 bg-gray-100 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <div class="mb-6">
                    <label for="price" class="block text-lg font-medium text-gray-700">Price</label>
                    <input type="text" id="price" name="price" value="$0.00" class="mt-2 block w-full p-3 bg-gray-100 border border-gray-300 rounded-lg focus:ring-yellow-500 focus:border-yellow-500" disabled>
                </div>

                <button type="submit" class="w-full bg-yellow-500 text-white text-lg font-bold p-3 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-400 transition">
                    Submit
                </button>
            </form>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="success-modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-2xl font-bold mb-4">Success!</h2>
            <p>Your form has been submitted successfully.</p>
            <button id="close-modal" class="mt-4 bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">
                Close
            </button>
        </div>
    </div>

    <script>
        document.getElementById('upload-form').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Simulate form submission
            setTimeout(function() {
                document.getElementById('success-modal').classList.remove('hidden');
            }, 500); // Adjust timing as needed
        });

        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('success-modal').classList.add('hidden');
        });

        document.getElementById('url_type').addEventListener('change', function() {
            const youtubeSection = document.getElementById('youtube_url_section');
            const linkedinSection = document.getElementById('linkedin_url_section');
            const form = document.getElementById('upload-form');

            if (this.value === 'youtube') {
                youtubeSection.classList.remove('hidden');
                linkedinSection.classList.add('hidden');
                form.action = "{{ route('client.videos.store') }}"; // Action for YouTube video submission
            } else {
                youtubeSection.classList.add('hidden');
                linkedinSection.classList.remove('hidden');
                form.action = "{{ route('linkedin.store') }}"; // Action for LinkedIn post submission
            }
        });
    </script>

    <style>
        .hidden {
            display: none;
        }
    </style>
</x-client-app-layout>
