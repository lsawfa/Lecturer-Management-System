<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
    <title>Dashboard Akademik</title>
</head>
<body >
    @include('sidebar')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <!-- Body Sidebar -->
    <div class="flex ms-72 mt-5 class font-inter flex-col">
        
        <div class=" w-11/12 h-32 ps-5 rou">
            <div class="grid grid-cols-5 h-full">
                <div class="bg-white rounded-lg mr-3 col-span-3 pt-5 pb-5" >
                    <div class="grid grid-cols-2 h-full">
                        <div class="flex items-center justify-center">
                            <div class="aspect-square w-52">
                                <img src="assets/Profile.png" alt="">
                            </div>
                        </div>
                        <div>
                            <div class="pe-2  pb-1">
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->user_name}}" required>
                            </div>
                            <div class="pe-2 pb-1">
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->user_nidn}}" required>
                            </div>
                            <div class="pe-2 pb-1">
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->user_pangkat}}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg col-span-2">
                    <p>Pengumuman</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>