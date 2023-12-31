<?php
$koneksi = mysqli_connect("localhost", "root","", "lecture_management");

$query = "SELECT COUNT(*) AS total_aktivitas FROM aktivitas";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$total_aktivitas = $row['total_aktivitas'];

$query = "SELECT COUNT(*) AS seminars FROM seminars";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$seminars = $row['seminars'];

$query = "SELECT COUNT(*) AS total_pendampings FROM pendampings";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$total_pendampings = $row['total_pendampings'];

$query = "SELECT COUNT(*) AS tugas_akhirs FROM tugas_akhirs";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$tugas_akhirs = $row['tugas_akhirs'];

$query = "SELECT COUNT(*) AS pengujis FROM pengujis";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$pengujis = $row['pengujis'];

$query = "SELECT COUNT(*) AS pembimbings FROM pembimbings";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$pembimbings = $row['pembimbings'];

$query = "SELECT COUNT(*) AS pengembangan_p_k_s FROM pengembangan_p_k_s";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$pengembangan_p_k_s = $row['pengembangan_p_k_s'];

$query = "SELECT COUNT(*) AS pengembangan_bahan_ajars FROM pengembangan_bahan_ajars";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$pengembangan_bahan_ajars = $row['pengembangan_bahan_ajars'];

$query = "SELECT COUNT(*) AS orasi_ilmiahs FROM orasi_ilmiahs";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$orasi_ilmiahs = $row['orasi_ilmiahs'];

$query = "SELECT COUNT(*) AS jabatans FROM jabatans";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$jabatans = $row['jabatans'];

?>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <br>
                <br>
                <div class="box bg-white rounded-lg mr-3 col-span-3 pt-5 pb-5 mx-auto" >
                    <div>
                        <h1>Data Keaktifan Dosen</h1>
                        <canvas id="myChart" width="800" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var d1 = <?php echo $total_aktivitas; ?>; 
        var d2 = <?php echo $seminars; ?>; 
        var d3 = <?php echo $total_pendampings; ?>; 
        var d4 = <?php echo $tugas_akhirs; ?>; 
        var d5 = <?php echo $pengujis; ?>; 
        var d6 = <?php echo $pembimbings; ?>; 
        var d7 = <?php echo $pengembangan_p_k_s; ?>; 
        var d8 = <?php echo $pengembangan_bahan_ajars; ?>; 
        var d9 = <?php echo $orasi_ilmiahs; ?>; 
        var d10 = <?php echo $jabatans; ?>; 

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Perkuliahan', 'Seminar', 'KKN/PKN', 'Tugas Akhir', 'Examination Duty', 'Student Activities', 'Curriculum Development', 'Teaching Material Development', 'Scientifict Oration', 'Leadership Position'],
                datasets: [{
                    label: '# of Votes',
                    data: [d1, d2, d3, d4, d5, d6, d7, d8, d9, d10], 
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>