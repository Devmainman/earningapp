<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<title>Wallet UI</title>
  <script src="https://cdn.tailwindcss.com"></script>

    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white-100">


  
  

<body class="bg-gray-100">

  <!-- Wallet Section -->
  <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 mt-8">
    <!-- Total Balance -->
    <div class="flex justify-between items-center">
      <div class="text-lg font-bold">Total Balance</div>
      <div>
        <button class="text-yellow-500 focus:outline-none">
          <!-- Eye icon here -->
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-9 0a9 9 0 0118 0v1a9 9 0 01-18 0v-1z" />
          </svg>
        </button>
      </div>
    </div>
    <!-- Amount Display -->
    <div class="text-4xl font-bold my-4">$7,000.75</div>
    <div class="text-right text-yellow-500 font-semibold">
      Transaction History
    </div>

    <!-- Set Amount -->
    <div class="my-6">
      <h3 class="text-lg font-bold">Set amount</h3>
      <p class="text-gray-500">How much would you like to set up?</p>
      <div class="text-5xl font-bold mt-2">$70</div>
    </div>

    <!-- Withdraw Options -->
    <div class="flex justify-around my-4">
      <button class="bg-gray-100 text-gray-700 font-semibold px-6 py-2 rounded-lg"> $50 </button>
      <button class="bg-yellow-500 text-white font-semibold px-6 py-2 rounded-lg"> $100 </button>
      <button class="bg-gray-100 text-gray-700 font-semibold px-6 py-2 rounded-lg"> $200 </button>
    </div>

    <!-- Withdraw to Options -->
    <div class="my-6">
      <h3 class="font-bold">Withdraw to</h3>
      <div class="flex justify-between mt-4">
        <!-- Bank Option -->
        <button class="flex items-center space-x-2 bg-yellow-500 text-white px-4 py-2 rounded-lg">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6l9-4 9 4M4 10v12h16V10"></path>
          </svg>
          <span>Bank</span>
        </button>
        <!-- Visa Option -->
        <button class="flex items-center space-x-2 border border-gray-300 px-4 py-2 rounded-lg">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 00-1 1v14a1 1 0 001 1h18a1 1 0 001-1V5a1 1 0 00-1-1H3zm0 2h18m-9 4v10"></path>
          </svg>
          <span>Visa</span>
        </button>
        <!-- MasterCard Option -->
        <button class="flex items-center space-x-2 border border-gray-300 px-4 py-2 rounded-lg opacity-50 cursor-not-allowed">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 00-1 1v14a1 1 0 001 1h18a1 1 0 001-1V5a1 1 0 00-1-1H3zm0 2h18m-9 4v10"></path>
          </svg>
          <span>MasterCard</span>
        </button>
      </div>
    </div>

    <!-- Slide to Withdraw -->
    <div class="flex items-center justify-between bg-yellow-500 text-white px-6 py-3 rounded-lg cursor-pointer">
      <span class="font-bold">Slide to withdraw</span>
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
      </svg>
    </div>
  </div>

  <!-- Footer -->
  <div class="fixed bottom-0 w-full bg-white p-4 border-t border-gray-200 flex justify-around">
    <button class="text-gray-700 flex flex-col items-center space-y-1">
      <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18m-9 5h9"></path>
      </svg>
      <span>Dashboard</span>
    </button>
    <button class="text-yellow-500 flex flex-col items-center space-y-1">
      <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm0 4v7m0 0l-3-3m6 3l-3-3"></path>
      </svg>
      <span>Wallet</span>
    </button>
    <button class="text-gray-700 flex flex-col items-center space-y-1">
      <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5V3.5a1.5 1.5 0 113 0v1a1.5 1.5 0 11-3 0z"></path>
      </svg>
      <span>Profile</span>
    </button>
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
            <svg class="w-6 h-6 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M11.074 4L8.442.408A.95.95 0 007.014.254L2.926 4h8.148zM9 13v-1a4 4 0 014-4h6V6a1 1 0 00-1-1H1a1 1 0 00-1 1v13a1 1 0 001 1h17a1 1 0 001-1v-2h-6a4 4 0 01-4-4z"></path>
            </svg>
            <span class="text-xs text-amber-400">Wallet</span>
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
