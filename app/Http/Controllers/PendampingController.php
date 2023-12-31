<?php

namespace App\Http\Controllers;

use App\Models\Pendamping;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class PendampingController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $errorMessage = session('error');
            $successMessage = session('success');
            $pendamping = Pendamping::where('user_id', Auth::user()->getAuthIdentifier())->paginate(10);
            return view('pendamping.pendamping', [
                'pendamping' => $pendamping,
                'errorMessage' => $errorMessage,
                'successMessage' =>  $successMessage,
            ]);
        }else{
            return redirect('/login');
        }
    } 
    public function store(Request $request): RedirectResponse
    {
        try {
            if (Auth::check()) {
                $this->validate($request, [
                    'mahasiswa_nim'    => 'string|required',
                    'mahasiswa_nama'      => 'string|required',
                    'jenis_kegiatan'   => 'required|min:0',
                    'tanggal_dimulai' => 'date|required',
                    'tanggal_berakhir' => 'date|required',
                    'no_sk'      => 'required|min:0',
                    'path_foto_kegiatan'        => 'required|max:10000|mimes:pdf,jpg,png,doc,docx',
                    'path_lampiran'        => 'required|max:10000|mimes:pdf,jpg,png,doc,docx',
                ]);
                $waktuawal = Carbon::createFromFormat('d-m-Y', $request->tanggal_dimulai)->format('Y-m-d');  
                $waktuakhir = Carbon::createFromFormat('d-m-Y', $request->tanggal_berakhir)->format('Y-m-d');               // Upload image
                $files = $request->file('path_lampiran');
                $files->storeAs('public', $files->hashName());
                $files2 = $request->file('path_foto_kegiatan');
                $files2->storeAs('public', $files2->hashName());
    
                // Create post
                Pendamping::create([
                    'mahasiswa_nim'           => $request->mahasiswa_nim,
                    'mahasiswa_nama'             => $request->mahasiswa_nama,
                    'jenis_kegiatan'             => $request->jenis_kegiatan,
                    'tanggal_dimulai'                 => $waktuawal,
                    'tanggal_berakhir'                 => $waktuakhir,
                    'no_sk'             => $request->no_sk,
                    'path_lampiran'           => $files->hashName(),
                    'path_foto_kegiatan'            => $files2->hashName(),
                    'user_id'                  => Auth::user()->getAuthIdentifier(),
                ]);
    
                // Redirect to index
                return redirect('/pendamping')->with(['success' => 'Data Berhasil Disimpan!']);
            }
        } catch (ValidationException $e) {
            return redirect()->back()->with('error',$e->errors());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
}
