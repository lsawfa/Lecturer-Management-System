<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
    <title>Detail Perkuliahan</title>
</head>
@php
function ubahFormatTanggal($tanggal)
{
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $tanggalArray = explode('-', $tanggal);
    $tanggalIndex = (int)$tanggalArray[2];
    $bulanIndex = (int)$tanggalArray[1];

    return $tanggalIndex . ' ' . $bulan[$bulanIndex];
}
function ubahFormatHari($dayNum){
    $days = [
  1 => 'Minggu',
  2 => 'Senin',
  3 => 'Selasa',
  4 => 'Rabu',
  5 => 'Kamis',
  6 => 'Jumat',
  7 => 'Sabtu'
];
    return $days[$dayNum];
}
@endphp
<body  >
    @include('sidebar')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <div class="flex ms-72 mt-5 h-full flex-col font-inter">
        <div class="flex flex-col bg-white  w-11/12 h-11/12 pb-10 ps-5 pt-5">
            <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700 ">
                <ul class="flex flex-wrap -mb-px">
                    <li class="me-2">
                        <a href="#" id="ringkasan" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 hover:border-b-2 rounded-t-lg hover:text-blue-400 hover:border-blue-400" onclick="eventRingkasan()">Ringkasan</a>
                    </li>
                    @if($aktivitas->nama_aktivitas == "Perkuliahan")
                    <li class="me-2">
                        <a href="#" id="kelas" class="inline-block p-4 hover:text-blue-400 hover:border-b-2 hover:border-blue-400" aria-current="page" onclick="eventKelas()">Kelas</a>
                    </li>
                    @endif
                </ul>
            </div>
            <div id="container-ringkasan">
                <div class="flex justify-end items-end pt-2">
                    <button  data-modal-target="modal-update" data-modal-toggle="modal-update" type="button"  class="text-gray-600 bg-[#FFFFFF] hover:bg-gray-200  border-2 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                          </svg>
                        Edit
                        </button>
                        <a href="/aktivitas/delete/{{$aktivitas->id}}" class="text-gray-600 bg-[#FFFFFF] hover:bg-gray-200  border-2 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                              </svg>
                            Delete
                            </a>
                </div>
                
                <div class="grid grid-cols-2  mt-5 ms-5 text-sm w-2/5 text-gray-600">
                    <p>Aktivitas</p>
                    <p class="text-gray-800">{{$aktivitas->nama_aktivitas}}</p>
                </div>
                <div class="grid grid-cols-2  mt-5 ms-5 text-sm w-2/5 text-gray-600">
                    <p>Tahun Ajaran</p>
                    <p class="text-gray-800">{{$aktivitas->tahun_ajaran}}</p>
                </div>
                <div class="grid grid-cols-2  mt-5 ms-5 text-sm w-2/5 text-gray-600">
                    <p>Periode</p>
                    <p class="text-gray-800">{{ubahFormatTanggal($aktivitas->tanggal_mulai)}} - {{ubahFormatTanggal($aktivitas->tanggal_berakhir)}}</p>
                </div>
                <div class="grid grid-cols-2  mt-5 ms-5 text-sm w-2/5 text-gray-600">
                    <p>Satuan Hasil</p>
                    <p class="text-gray-800">{{$aktivitas->sks_hasil}} SKS</p>
                </div>
                <div class="grid grid-cols-2  mt-5 ms-5 text-sm w-2/5 text-gray-600">
                    <p>Jumlah Volume Kegiatan</p>
                    <p class="text-gray-800">{{$aktivitas->jumlah_volume_kegiatan}} SKS</p>
                </div>
                <div class="grid grid-cols-2  mt-5 ms-5 text-sm w-2/5 text-gray-600">
                    <p>Angka Kredit</p>
                    <p class="text-gray-800">{{$aktivitas->angka_kredit}} SKS</p>
                </div>
                <div class="grid grid-cols-2  mt-5 ms-5 text-sm w-2/5 text-gray-600">
                    <p>Jumlah Angka Kredit</p>
                    <p class="text-gray-800">{{$aktivitas->angka_kredit * $aktivitas->jumlah_volume_kegiatan}} SKS</p>
                </div>
                <div class="grid grid-cols-2  mt-5 ms-5 text-sm w-2/5 text-gray-600">
                    <p>No. Penugasan</p>
                    <p class="text-gray-800">{{$aktivitas->no_penugasan}}</p>
                </div>
                <div class="grid grid-cols-2  mt-5 ms-5 text-sm w-2/5 text-gray-600">
                    <p>Lampiran</p>
                    <a target="_blank" href="/storage/{{$aktivitas->path_lampiran}}" class="hover:text-gray-700 hover:underline text-blue-600 font-semibold">{{$aktivitas->jenis_lampiran}}</a>
                </div>
            </div>
            
            @if($aktivitas->nama_aktivitas == "Perkuliahan")                <!---- Table Body ------>
    <div id="container-kelas" class="w-full hidden">
        <button data-modal-target="modal-add" data-modal-toggle="modal-add" type="button" class="text-white bg-[#10A760] hover:bg-[#12B76A] focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-4 py-2.5 text-center  items-center dark:focus:ring-[#1da1f2]/55 m-5 w-2/12">
            Tambah Kelas
            </button>
        <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Mata Kuliah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Waktu Kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah SKS
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelas_aktivitas as $items)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$items->kelas_matkul}}
                    </th>
                    <td class="px-6 py-4">
                        {{$items->kelas_nama}}
                    </td>
                    <td class="px-6 py-4">
                       {{ubahFormatHari($items->kelas_hari)}} , {{$items->kelas_waktu}}
                    </td>
                    <td class="px-6 py-4">
                        {{$items->kelas_sks}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
        </div>  
  <!-- Main modal -->
  <div id="modal-add" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" >
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Aktivitas
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-add">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
              <form action="/aktivitas/add-kelas" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="grid grid-cols-2 mb-5">
                      <div class="flex w-full h-full  ps-5 items-center text-sm">Nama Matkul</div>
                      <input type="text" id="aktivitas" name="nama_matkul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="Masukkan Nama Mata" required>
                  </div>
                  <div class="grid grid-cols-2 mb-5">
                    <div class="flex w-full h-full  ps-5 items-center text-sm">Nama Kelas</div>
                    <input type="text" id="aktivitas" name="nama_kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="Masukkan Nama Kelas" required>
                </div>
                <div class="grid grid-cols-2 mb-5">
                    <div class="flex w-full h-full  ps-5 items-center text-sm">Hari</div>
                    <select id="countries" name="hari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="2">Senin</option>
                        <option value="3">Selasa</option>
                        <option value="4">Rabu</option>
                        <option value="5">Kamis</option>
                        <option value="6">Jumat</option>
                      </select>                
                    </div>
                <div class="grid grid-cols-2 mb-5">
                    <div class="flex w-full h-full  ps-5 items-center text-sm">Waktu</div>
                    <input type="text" id="timePicker" name="waktu"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5"placeholder="Waktu Kelas" required> 
                </div>
                <div class="grid grid-cols-2 mb-5">
                    <div class="flex w-full h-full  ps-5 items-center text-sm">Jumlah SKS</div>
                    <input type="number" id="aktivitas" name="sks" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="Jumlah SKS" required>
                </div>
                    <input type="hidden" id="aktivitas" name="id_aktivitas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 " value="{{$aktivitas->id}}"required>

    </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah Data</button>
                <button type="reset" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Reset</button>
            </div>
          </form>
        </div>
    </div>

</div>
  <!-- Main modal -->
  <div id="modal-update" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" >
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Aktivitas
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-add">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
              <form action="/aktivitas/update-aktivitas" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="grid grid-cols-2 mb-5">
                      <div class="flex w-full h-full  ps-5 items-center text-sm">Aktivitas</div>
                      <input type="text" id="aktivitas" name="nama_aktivitas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="Masukkan Aktivitas"  value="{{$aktivitas->nama_aktivitas}}" required>
                  </div>
                  <div class="grid grid-cols-2 mb-5">
                      <div class="flex w-full h-full  ps-5 items-center text-sm">Tahun Ajaran</div>
                      <select id="tahun-ajaran" name="tahun_ajaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                          <option value="Ganjil 2023/2024">Ganjil 2023/2024</option>
                          <option @if ($aktivitas->tahun_ajaran=="Genap 2023/2024")
                              @selected(true)
                          @endif value="Genap 2023/2024">Genap 2023/2024</option>
                        </select>
                  </div>
                  <div class="grid grid-cols-2 mb-5">
                      <div class="flex w-full h-full  ps-5 items-center text-sm">Tanggal Dimulai</div>
                      <div class="relative">
                          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week text-gray-600" viewBox="0 0 16 16">
                                  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                </svg>
                          </div>
                          <input type="text" id="datepicker" name="tanggal_dimulai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 px-10"placeholder="Tanggal Dimulai" required value="{{$aktivitas->tanggal_mulai}}"> </div>
                  </div>
                  <div class="grid grid-cols-2 mb-5">
                      <div class="flex w-full h-full  ps-5 items-center text-sm">Tanggal Berakhir</div>
                      <div class="relative">
                          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week text-gray-600" viewBox="0 0 16 16">
                                  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                </svg>
                          </div>
                          <input type="text" id="datepicker" name="tanggal_berakhir"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 px-10"placeholder="Tanggal Berakhir" required value="{{$aktivitas->tanggal_berakhir}}"> </div>
                  </div>
                  <div class="grid grid-cols-2 mb-5">
                      <div class="flex w-full h-full  ps-5 items-center text-sm">Satuan Hasil</div>
                      <input type="number" id="aktivitas" name="satuan_hasil" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="Masukkan SKS" value="{{$aktivitas->sks_hasil}}" required>
                  </div>
            <div class="grid grid-cols-2 mb-5">
              <div class="flex w-full h-full  ps-5 items-center text-sm">Jumlah Volume Kegiatan</div>
              <input type="number" id="aktivitas" name="jumlah_volume" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="Jumlah Volume Kegiatan" value="{{$aktivitas->jumlah_volume_kegiatan}}" required>
          </div>
          <div class="grid grid-cols-2 mb-5">
              <div class="flex w-full h-full  ps-5 items-center text-sm">Angka Kredit</div>
              <input type="number" id="aktivitas" step=0.1 name="angka_kredit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="Angka Kredit" value="{{$aktivitas->angka_kredit}}" required>
          </div>
          <div class="grid grid-cols-2 mb-5">
              <div class="flex w-full h-full  ps-5 items-center text-sm">No. Penugasan</div>
              <input type="text" id="aktivitas" name="no_tugas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="XX/XXX/XXXX" value="{{$aktivitas->no_penugasan}}" required>
          </div>
          <input type="hidden" id="aktivitas" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="XX/XXX/XXXX" value="{{$aktivitas->id}}" required>
    </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Data</button>
                <button type="reset" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Reset</button>
            </div>
          </form>
        </div>
    </div>
</div>
    </div>



</body>
<script>
    var container_ringkasan = document.getElementById("container-ringkasan");
    var container_kelas = document.getElementById("container-kelas");
    function eventKelas(){
        var kelas = document.getElementById("kelas");
        var ringkasan = document.getElementById("ringkasan");
        ringkasan.classList.remove("text-blue-600", "border-b-2", "border-blue-600");
        kelas.classList.add("text-blue-600", "border-b-2", "border-blue-600","hover:text-blue-400","hover:border-blue-400");
        container_ringkasan.classList.remove("grid")
        container_ringkasan.classList.add("hidden")
        container_kelas.classList.remove("hidden")
        container_kelas.classList.add("grid")
    }
    function eventRingkasan(){
        var kelas = document.getElementById("kelas");
        var ringkasan = document.getElementById("ringkasan");
        kelas.classList.remove("text-blue-600", "border-b-2", "border-blue-600");
        ringkasan.classList.add("text-blue-600", "border-b-2", "border-blue-600","hover:text-blue-400","hover:border-blue-400");
        container_kelas.classList.remove("grid")
        container_kelas.classList.add("hidden")
        container_ringkasan.classList.remove("hidden")
        container_ringkasan.classList.add("grid")
    }
    document.addEventListener('DOMContentLoaded', function () {
      flatpickr("#timePicker", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        defaultDate: new Date()
      });
    });
    flatpickr("#datepicker", {
        dateFormat: "d-m-Y",
    });
</script>
</html>