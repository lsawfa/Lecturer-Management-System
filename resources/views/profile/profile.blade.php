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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body{
            background-color: #F5F5F5 !important;
        }
        h1, label, input{
            font-family: 'Montserrat', sans-serif !important;
        }
        h1{
            font-weight: bold !important;
            font-size: 30px !important;
            text-align: center !important;
            margin-bottom: 20px !important;
        }
        .box{
            display: flex !important;
            justify-content: center !important;                
            /* align-items: center !important; */
            width: 90% !important;
        }
    </style>
    <title>Dashboard Akademik</title>
</head>
<body >
    @include('sidebar')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <!-- Body Sidebar -->
    <div class="flex ms-72 mt-5 class font-inter flex-col">
        <h1>Dashboard Akademik</h1>
        <div class=" w-11/12 h-32 ps-5 rou">
            <!-- <h1>tes</h1> -->
            <div class="grid grid-cols-1 h-full mx-auto">
                <!-- <h1 class="txt">tes1</h1> -->
                <div class="box bg-white rounded-lg mr-3 col-span-3 pt-5 pb-5 mx-auto" >
                    <!-- <h1>tes2</h1> -->
                    <div class="grid grid-cols-2 h-full w-full mx-auto">
                        <!-- <h1>tes3</h1> -->
                        <div class="flex items-center justify-center">
                            <!-- <h1>Tes 4</h1> -->
                            <div class="aspect-square w-52">
                                <img src="assets/Profile.png" alt="">
                            </div>
                        </div>
                        <div class="pe-2 pb-1 pr-15">
                            <div class="pe-2  pb-1">
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->user_name}}" required>
                            </div>
                            <div class="pe-2 pb-1">
                                <label for="nidn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIDN</label>
                                <input type="text" id="nidn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->user_nidn}}" required>
                            </div>
                            <div class="pe-2 pb-1">
                                <label for="tempat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat</label>
                                <input type="text" id="tempat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->user_tempat_lahir}}" required>
                            </div>
                            <div class="pe-2 pb-1">
                                <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                                <input type="date" id="tgl_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->user_tanggal_lahir}}" required>
                            </div>
                            <div class="pe-2 pb-1">
                                <label for="golongan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan</label>
                                <input type="text" id="golongan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->user_golongan}}" required>
                            </div>
                            <div class="pe-2 pb-1">
                                <label for="pangkat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pangkat</label>
                                <input type="text" id="pangkat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->user_pangkat}}" required>
                            </div>
                            <div class="pe-2 pb-1">
                                <label for="s1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">S1</label>
                                <input type="text" id="s1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->user_pendidikans1}}" required>
                            </div>
                            <div class="pe-2 pb-1">
                                <label for="s2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">S2</label>
                                <input type="text" id="s2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->user_pendidikans2}}" required>
                            </div>
                            <div class="pe-2 pb-1">
                                <label for="s3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">S3</label>
                                <input type="text" id="s3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$profile->user_pendidikans3}}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>