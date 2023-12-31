<?php

namespace App\Http\Controllers;


use App\Models\TugasAkhir;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class TugasAkhirController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $errorMessage = session('error');
            $successMessage = session('success');
            $tugasakhir = TugasAkhir::where('user_id', Auth::user()->getAuthIdentifier())->paginate(10);
            return view('tugasakhir.tugasakhir', [
                'tugasakhir' => $tugasakhir,
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
                    'jenis_bimbingan'      => 'string|required',
                    'tahun_ajaran'      => 'string|required',
                    'tanggal_dimulai'   => 'date|required',
                    'tanggal_berakhir'   => 'date|required',
                    'jenis_pembimbing'      => 'string|required',
                    'no_sk'      => 'required|min:0',
                    'path_foto_kegiatan'        => 'required|max:10000|mimes:pdf,jpg,png,doc,docx',
                    'path_lampiran'        => 'required|max:10000|mimes:pdf,jpg,png,doc,docx',
                ]);
                $waktu = Carbon::createFromFormat('d-m-Y', $request->tanggal_dimulai)->format('Y-m-d');                // Upload image
                $waktu_berakhir = Carbon::createFromFormat('d-m-Y', $request->tanggal_berakhir)->format('Y-m-d');  
                $files = $request->file('path_lampiran');
                $files->storeAs('public', $files->hashName());
                $files2 = $request->file('path_foto_kegiatan');
                $files2->storeAs('public', $files2->hashName());
    
                // Create post
                TugasAkhir::create([
                    'mahasiswa_nim'           => $request->mahasiswa_nim,
                    'mahasiswa_nama'             => $request->mahasiswa_nama,
                    'jenis_bimbingan'                => $request->jenis_bimbingan,
                    'tahun_ajaran'                => $request->tahun_ajaran,
                    'tanggal_dimulai'                 => $waktu,
                    'tanggal_berakhir'                 => $waktu_berakhir,
                    'jenis_pembimbing'                => $request->jenis_pembimbing,
                    'no_sk'             => $request->no_sk,
                    'path_lampiran'           => $files->hashName(),
                    'path_foto_kegiatan'            => $files2->hashName(),
                    'user_id'                  => Auth::user()->getAuthIdentifier(),
                ]);
                
                // Redirect to index
                return redirect('/tugas-akhir')->with(['success' => 'Data Berhasil Disimpan!']);
            }
        } catch (ValidationException $e) {
            
            return redirect()->back()->with('error',$e->errors());
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
    public function delete($id)
    {
        try {
            $tugasakhir = TugasAkhir::find($id);
            if ($tugasakhir) {
                $tugasakhir->delete();
                return redirect('/tugas-akhir')->with(['success' => 'Data berhasil dihapus']);
            } else {
                return redirect('/tugas-akhir')->with(['error' => 'Data tidak ditemukan']);
            }
        } catch (\Exception $e) {
            return redirect('/tugas-akhir')->with(['error' => 'Terjadi kesalahan saat menghapus data']);
        }
    }
}
