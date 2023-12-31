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
    <title>Perkuliahan</title>
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
    $tahun = $tanggalArray[0];
    
    return $tanggalIndex . ' ' . $bulan[$bulanIndex] . ' ' . $tahun;
}
$i=0;
@endphp
<body >
    @include('sidebar')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    @if($successMessage != null)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Data berhasil disimpan"
            });
        });
    </script>
@endif
@if($errorMessage != null)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "Data tidak berhasil disimpan"
            });
        });
    </script>
@endif
    <!-- Body Sidebar -->
    <div class="flex ms-72 mt-5 class font-inter flex-col">
        <div class="bg-white  w-11/12 h-32 ps-5 pt-5">
            <h1>Seluruh aktivitas</h1>
            <div class="grid grid-cols-3  w-2/3 mt-2">
                <div>
                    <p>Total Aktivitas</p>
                    <span class="flex items-center mt-3">{{$total_aktivitas}}</span>
                </div>
                <div>
                    <p>Jumlash SKS</p>
                    <span class="flex items-center mt-3">{{$jumlah_sks}}</span>
                </div>
                <div>
                    <p>Jumlah Angka Kredit</p>
                    <span class="flex items-center mt-3">{{$jumlah_angka_kredit}}</span>
                </div>
            </div>
        </div>
        
        <div class="relative overflow-x-auto  mt-10 font-inter">
            <div class="grid grid-cols-2 bg-white  w-11/12 h-16 ps-5 items-center">
                <h1>Aktivitas</h1>
                <div class="flex justify-end ">
                    <button data-modal-target="modal-add" data-modal-toggle="modal-add" type="button" class="text-white bg-[#10A760] hover:bg-[#12B76A] focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">
                        Tambahkan Aktivitas
                        </button>
                    <button type="button" class="text-gray-600 bg-[#FFFFFF] hover:bg-gray-200  border-2 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                            <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                          </svg>
                        Filter
                        </button>
                        <button type="button" class="text-gray-600 bg-[#FFFFFF] hover:bg-gray-200  border-2 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 me-2 mb-2">
                            Tahun Ajaran
                            </button>
                </div>
            </div>
            <table class="w-11/12 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aktivitas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tahun Ajaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Satuan Hasil
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Angka Kredit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No. Penugasan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lampiran
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aktivitas as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ (($aktivitas->currentPage() * 10) - 10) + $loop->iteration  }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('detail-aktivitas', $item->id) }}"> {{$item->nama_aktivitas}}</a>
                        </th>
                        <td class="px-6 py-4">
                            {{$item->tahun_ajaran}}
                        </td>
                        <td class="px-6 py-4">
                            {{ubahFormatTanggal($item->tanggal_mulai)}} - {{ubahFormatTanggal($item->tanggal_berakhir)}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->sks_hasil}} SKS
                        </td>
                        <td class="px-6 py-4">
                            {{$item->angka_kredit*$item->jumlah_volume_kegiatan}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->no_penugasan}}
                        </td>
                        <td class="px-6 py-4">
                            <a target="_blank" href="storage/{{$item->path_lampiran}}" class="hover:text-gray-700 hover:underline text-blue-600 font-semibold">{{$item->jenis_lampiran}}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex flex-col w-11/12">
                {{ $aktivitas->links('pagination::tailwind') }}
            </div>
            
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
                <form action="/add-aktivitas" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 mb-5">
                        <div class="flex w-full h-full  ps-5 items-center text-sm">Aktivitas</div>
                        <input type="text" id="aktivitas" name="nama_aktivitas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="Masukkan Aktivitas" required>
                    </div>
                    <div class="grid grid-cols-2 mb-5">
                        <div class="flex w-full h-full  ps-5 items-center text-sm">Tahun Ajaran</div>
                        <select id="tahun-ajaran" name="tahun_ajaran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected value="Ganjil 2023/2024">Ganjil 2023/2024</option>
                            <option value="Genap 2023/2024">Genap 2023/2024</option>
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
                            <input type="text" id="datepicker" name="tanggal_dimulai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 px-10"placeholder="Tanggal Dimulai" required> </div>
                    </div>
                    <div class="grid grid-cols-2 mb-5">
                        <div class="flex w-full h-full  ps-5 items-center text-sm">Tanggal Berakhir</div>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week text-gray-600" viewBox="0 0 16 16">
                                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                  </svg>
                            </div>
                            <input type="text" id="datepicker" name="tanggal_berakhir"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 px-10"placeholder="Tanggal Berakhir" required> </div>
                    </div>
                    <div class="grid grid-cols-2 mb-5">
                        <div class="flex w-full h-full  ps-5 items-center text-sm">Satuan Hasil</div>
                        <input type="number" id="aktivitas" name="satuan_hasil" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="Masukkan SKS" required>
                    </div>
              <div class="grid grid-cols-2 mb-5">
                <div class="flex w-full h-full  ps-5 items-center text-sm">Jumlah Volume Kegiatan</div>
                <input type="number" id="aktivitas" name="jumlah_volume" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="Jumlah Volume Kegiatan" required>
            </div>
            <div class="grid grid-cols-2 mb-5">
                <div class="flex w-full h-full  ps-5 items-center text-sm">Angka Kredit</div>
                <input type="number" id="aktivitas" step=0.1 name="angka_kredit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="Angka Kredit" required>
            </div>
            <div class="grid grid-cols-2 mb-5">
                <div class="flex w-full h-full  ps-5 items-center text-sm">Jenis Lampiran</div>
                <select id="countries" name="jenis_lampiran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="SK">SK</option>
                    <option value="Foto Kegiatan">Foto Kegiatan</option>
                    <option value="Surat Tugas">Surat Tugas</option>
                  </select>
            </div>
            <div class="grid grid-cols-2 mb-5">
                <div class="flex w-full h-full  ps-5 items-center text-sm"></div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                    <input name="file_input" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                </div>
            </div>
            <div class="grid grid-cols-2 mb-5">
                <div class="flex w-full h-full  ps-5 items-center text-sm">No. Penugasan</div>
                <input type="text" id="aktivitas" name="no_tugas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-green-200 block w-full p-2.5 "placeholder="XX/XXX/XXXX" required>
            </div>
        
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
    </div>
    <script>
        flatpickr("#datepicker", {
            dateFormat: "d-m-Y",
        });
    </script>
</body>
</html>