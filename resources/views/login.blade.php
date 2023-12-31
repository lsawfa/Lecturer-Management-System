<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>Login Page</title>
</head>
<body>
<!--Main Navigation-->
<header>
    <!-- Section: Split screen -->
    <section class="">
      <!-- Grid -->
      <div class="grid h-screen grid-cols-2">
        <!-- First column -->
        <div class="h-screen flex items-center justify-center font-inter">
            <img src="assets/Logo.png" alt="" class="w-1/3">
        </div>
        <!-- First column -->
  
        <!-- Second column -->
        <div class="h-screen flex flex-col items-center justify-center font-inter ">
            <img src="assets/Logo.png" alt="" class="w-1/12">
            <p class="text-lg font-bold p-4">Login</p>
            @if(Session::has('status'))
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              
              <span class="sr-only">Info</span>
              <div>
                <span class="font-medium">Login Gagal!</span> 
                Email dan Password Salah
              </div>
            </div>
            @endif
            
            <form class="max-w-sm mx-auto w-72" action="{{ route('actionlogin') }}" method="post">
              @csrf
                <div class="mb-5">
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                  <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="email@gmail.com" required>
                  @csrf
                </div>
                <div class="mb-5">
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                  <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  placeholder="●●●●●●●●●" required>

                </div>
                <button type="submit" class="text-white bg-[#34a853] hover:bg-[#4ebe6c] focus:ring-1 focus:outline-none focus:ring-[#317c45] font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
              </form>
              
        </div>
        <!-- Second column -->
      </div>
      <!-- Grid -->
    </section>
    <!-- Section: Split screen -->
  </header>
  <!--Main Navigation-->
    
</body>
</html>