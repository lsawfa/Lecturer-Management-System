<?php

namespace App\Http\Controllers;

use App\Models\Penguji;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PengujiController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $errorMessage = session('error');
            $successMessage = session('success');
            $penguji = Penguji::where('user_id', Auth::user()->getAuthIdentifier())->paginate(10);
            return view('penguji.penguji', [
                'penguji' => $penguji,
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
                    'jenis_ujian_akhir'      => 'string|required',
                    'posisi_penguji'      => 'string|required',
                    'tahun_ajaran'      => 'required|min:0',
                    'waktu'   => 'date|required',
                    'no_sk'     => 'required|min:0',
                    'path_foto_kegiatan'        => 'required|max:10000|mimes:pdf,jpg,png,doc,docx',
                    'path_lampiran'        => 'required|max:10000|mimes:pdf,jpg,png,doc,docx',
                ]);
                $waktu = Carbon::createFromFormat('d-m-Y', $request->waktu)->format('Y-m-d');                // Upload image
                $files = $request->file('path_lampiran');
                $files->storeAs('public', $files->hashName());
                $files2 = $request->file('path_foto_kegiatan');
                $files2->storeAs('public', $files2->hashName());
    
                // Create post
                Penguji::create([
                    'mahasiswa_nim'           => $request->mahasiswa_nim,
                    'mahasiswa_nama'             => $request->mahasiswa_nama,
                    'jenis_ujian_akhir'                => $request->jenis_ujian_akhir,
                    'tahun_ajaran'                => $request->tahun_ajaran,
                    'posisi_penguji'                => $request->posisi_penguji,
                    'waktu'                          => $waktu,
                    'no_sk'                          => $request->no_sk,
                    'path_lampiran'           => $files->hashName(),
                    'path_foto_kegiatan'            => $files2->hashName(),
                    'user_id'                  => Auth::user()->getAuthIdentifier(),
                ]);
    
                // Redirect to index
                return redirect('/penguji')->with(['success' => 'Data Berhasil Disimpan!']);
            }
        } catch (ValidationException $e) {
            dd($e->errors());
            return redirect()->back()->with('error',$e->errors());
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
}
