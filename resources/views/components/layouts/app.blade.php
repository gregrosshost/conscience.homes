<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">

  <meta name="application-name" content="{{ config('app.name') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

  @filamentStyles
  @vite('resources/css/app.css')
</head>

<body class="antialiased">
<div class="min-h-screen bg-gray-100 mx-auto">
  @guest
    <!-- Content container -->
    <div class="container mx-auto font-rubik bg-gray-200 xl:px-32 lg:px-24 md:px-16 px-4 py-6  shadow-lg">
      <header>
        <nav class="flex items-center justify-between">
          <!-- Logo on the left -->
          <a href="/" class="flex items-center space-x-4">
            <img src="/assets/logos/Logo.svg" alt="Logo" class="h-8">
            <h1 class="text-2xl lg:text-3xl font-bold text-gray-800 font-logo">Conscience Homes</h1>
          </a>
          <!-- Menu in the middle -->
          <ul class="hidden lg:flex items-center space-x-6 text-lg">
            <li><a href="#about" class="text-gray-700 hover:text-gray-900 font-medium">About</a></li>
            <li><a href="#contact" class="text-gray-700 hover:text-gray-900 font-medium">Contact Us</a></li>
          </ul>
          <!-- Action buttons on the right -->
          <div class="lg:flex space-x-2 hidden">
            <a href="/admin/login" class="block w-max">
              <button class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-semibold font-button">
                Admin Login
              </button>
            </a>
            <a href="/member/login" class="block w-max">
              <button class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-semibold font-button">
                Member Login
              </button>
            </a>
          </div>
          <div id="showMenu" class="lg:hidden">
            <img src='/assets/animations/Menu.svg' alt="Menu icon"/>
          </div>
        </nav>

        {{--MOBILE--}}
        <nav id='mobileNav' class="hidden px-4 py-6 fixed top-0 left-0 h-full w-full bg-gray-300 z-20 animate-fade-in-down">
          <div id="hideMenu" class="flex justify-end">
            <img src='assets/animations/Cross.svg' alt="" class="h-16 w-16" />
          </div>
          <ul class="flex flex-col mx-8 my-24 items-center text-3xl">
            <li class="my-6">
              <a href="#about">About</a>
            </li>
            <li class="my-6">
              <a href="#contact">Contact</a>
            </li>
            <li class="my-6 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-semibold font-button p-4">
              <a href="/admin/login">Admin Login</a>
            </li>
            <li class="my-6 bg-gray-500 text-white rounded-lg hover:bg-gray-600 font-semibold font-button p-4">
              <a href="/member/login">Member Login</a>
            </li>
          </ul>
        </nav>
      </header>
    </div>
    <!-- Content container -->
    <div class="container mx-auto">
      {{ $slot }}
    </div>
  @endguest

  @auth
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
      <header class="flex items-center justify-between py-4 md:py-8">

        <a href="/" class="inline-flex items-center gap-2.5 text-2xl font-bold text-black md:text-3xl"
           aria-label="logo">
          <svg xmlns="http://www.w3.org/2000/svg" width="67" height="78" viewBox="0 0 67 78" fill="none">
            <rect x="0.744141" width="66.2617" height="77.667" rx="9.88156" fill="white"/>
            <path
              d="M39.6516 26.2354C41.4238 26.237 43.1758 26.6108 44.7932 27.3323C46.4107 28.0539 47.8573 29.1071 49.0388 30.4231L52.7376 27.1009C50.37 24.4777 47.2639 22.6265 43.8244 21.7888C40.385 20.951 36.772 21.1657 33.4567 22.4048C30.1416 23.6438 27.2782 25.8497 25.2404 28.7345C23.2025 31.6195 22.0847 35.0493 22.0329 38.5767C21.9811 42.104 22.9976 45.5651 24.9498 48.5081C26.9021 51.4512 29.6994 53.7396 32.9768 55.0748C36.2541 56.4099 39.8593 56.7299 43.322 55.9929C46.7845 55.2558 49.9437 53.496 52.3873 50.943L48.7726 47.523C47.3326 49.0233 45.5419 50.1447 43.5607 50.787C41.5795 51.4293 39.4694 51.5725 37.4191 51.2037C35.3687 50.8349 33.4421 49.9658 31.8113 48.6738C30.1805 47.3819 28.8964 45.7075 28.074 43.8002C27.2514 41.893 26.916 39.8124 27.0977 37.7446C27.2795 35.6766 27.9726 33.6858 29.1153 31.95C30.258 30.2142 31.8146 28.7876 33.6459 27.7977C35.4772 26.8077 37.5262 26.2854 39.6097 26.2772L39.6516 26.2354Z"
              fill="black"/>
            <path
              d="M22.9083 22.0846L19.3634 18.6549C16.5941 21.3002 14.3966 24.4446 12.8971 27.9075C11.3976 31.3703 10.6257 35.0834 10.6257 38.8335C10.6257 42.5835 11.3976 46.2967 12.8971 49.7595C14.3966 53.2224 16.5941 56.3668 19.3634 59.0121L22.9083 55.5823C20.5994 53.3923 18.7663 50.7841 17.5152 47.909C16.2641 45.034 15.6199 41.9492 15.6199 38.8335C15.6199 35.7177 16.2641 32.6329 17.5152 29.7579C18.7663 26.8828 20.5994 24.2747 22.9083 22.0846Z"
              fill="black"/>
            <path
              d="M57.1243 15.5625C52.0364 11.8645 45.8885 9.87404 39.5777 9.88158V14.8612C44.7849 14.8565 49.8587 16.4923 54.0654 19.5322L57.1243 15.5625Z"
              fill="black"/>
            <path
              d="M39.5777 62.8729V67.7854C45.4973 67.7917 51.2904 66.1566 56.247 63.0805L53.3353 59.0121C49.2394 61.5379 44.4601 62.8792 39.5777 62.8729Z"
              fill="black"/>
            <path
              d="M39.5776 56.8055C35.7785 56.803 32.072 55.6669 28.9597 53.5508C25.8474 51.4348 23.4797 48.441 22.1768 44.9748L17.6443 47.0193C19.3511 51.3238 22.3604 55.0252 26.2756 57.6358C30.1909 60.2464 34.8285 61.6438 39.5776 61.6441V56.8055Z"
              fill="black"/>
            <path
              d="M21.6073 37.9562C21.9015 33.341 23.9224 29.0117 27.2596 25.8467C30.5969 22.6818 35.0008 20.9182 39.5776 20.9137V16.0229C33.7164 16.0227 28.0796 18.2996 23.8336 22.3822C19.5876 26.465 17.0574 32.0409 16.767 37.9562H21.6073Z"
              fill="black"/>
          </svg>

          Conscience Homes
        </a>

        @guest
          <div class="-ml-8 flex-col gap-2.5 sm:flex-row sm:justify-center lg:flex lg:justify-start">
            <a href="/member/login"
               class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Sign
              in</a>
          </div>
        @endguest
        @auth
          <form method="post" action="{{ route('filament.member.auth.logout') }}"
                class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">
            @csrf
            <button type="submit">
              Sign out
            </button>
          </form>
        @endauth


      </header>
      {{ $slot }}
    </div>
  @endauth
</div>
@filamentScripts
@vite('resources/js/app.js')
</body>
</html>
