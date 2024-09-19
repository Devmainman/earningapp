<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<title>Profile UI</title>
  <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white-100">




  
<body class="bg-gray-100">

  <!-- Profile Section -->
  <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 mt-8">
    <!-- Back Button and Profile Title -->
    <div class="flex items-center justify-between">
      <button class="text-black focus:outline-none">
        <!-- Back Arrow Icon -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
      </button>
      <h2 class="text-xl font-bold">Profile</h2>
      <span></span> <!-- Placeholder for alignment -->
    </div>

    <!-- Account Section -->
    <div class="mt-6">
      <h3 class="text-lg font-semibold">Account</h3>
      <div class="bg-black text-white rounded-lg mt-4 p-4 space-y-3">
        <!-- Edit Profile -->
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-2">
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Edit Profile</span>
          </div>
        </div>
        <!-- Notification -->
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-2">
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405C18.407 15.57 18 14.805 18 14V11a6 6 0 00-5-5.917V5a3 3 0 10-6 0v.083A6 6 0 002 11v3c0 .805-.407 1.57-1.595 2.595L0 17h5m5 0v2a3 3 0 006 0v-2m-6 0h6"></path>
            </svg>
            <span>Notification</span>
          </div>
        </div>
        <!-- Privacy -->
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-2">
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 .728-.195 1.405-.533 2H8.533A3.987 3.987 0 018 11V8c0-.728.195-1.405.533-2h3.934A3.987 3.987 0 0112 8v3zm9 7v-1a4 4 0 00-3-3.874M7 18v-1a4 4 0 013-3.874M5 15a2 2 0 10-4 0v1h4v-1zm14 0a2 2 0 10-4 0v1h4v-1zM15 10V7m0 0a2 2 0 114 0v3m-4 0a2 2 0 104 0z"></path>
            </svg>
            <span>Privacy</span>
          </div>
        </div>
        <!-- Order Reach -->
        <div class="flex items-center justify-between bg-yellow-500 rounded-lg p-2 mt-2">
          <div class="flex items-center space-x-2">
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v1a3 3 0 006 0v-1M6 10h12"></path>
            </svg>
            <span>Order Reach</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Support and About Section -->
    <div class="mt-8">
      <h3 class="text-lg font-semibold">Support and About</h3>
      <div class="bg-black text-white rounded-lg mt-4 p-4 space-y-3">
        <!-- Help and Support -->
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-2">
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M7.834 15.732a3 3 0 010-5.464l.908-.454a3 3 0 00-3.64-4.77l-1.78.89m6.52 0h.01m5.464-3.608l-.908.454a3 3 0 003.64 4.77l1.78-.89m-6.52 0h-.01"></path>
            </svg>
            <span>Help and Support</span>
          </div>
        </div>
        <!-- Terms and Policies -->
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-2">
            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5h7m-7 4h4m-4 4h7m-7 4h4"></path>
            </svg>
            <span>Terms and Policies</span>
          </div>
        </div>
       <!-- Log Out -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
  @csrf
  <div class="flex items-center justify-between bg-yellow-500 rounded-lg p-2 mt-2">
    <div class="flex items-center space-x-2">
      <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m5 4v1a3 3 0 11-6 0v-1m6-10V7a3 3 0 11-6 0v1"></path>
      </svg>
      <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span>Log Out</span>
      </a>
    </div>
  </div>
</form>

      </div>
    </div>
  </div>





<div class="fixed inset-x-0 bottom-0 z-50 w-full h-16 bg-white border-t border-gray-200">
    <div class="grid grid-cols-3 h-full max-w-lg mx-auto text-center">
        <!-- Home Link -->
        <a href="{{ route('dashboard') }}" class="flex flex-col justify-center items-center hover:bg-gray-50">
            <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                <path d="M19.707 9.293l-2-2-7-7a1 1 0 00-1.414 0l-7 7-2 2a1 1 0 101.414 1.414L2 10.414V18a2 2 0 002 2h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a2 2 0 002-2v-7.586l.293.293a1 1 0 001.414-1.414z"></path>
            </svg>
            <span class="text-xs text-gray-500">Home</span>
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

</body>
</html>
