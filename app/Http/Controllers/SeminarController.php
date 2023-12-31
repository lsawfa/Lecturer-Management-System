<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SeminarController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $errorMessage = session('error');
            $successMessage = session('success');
            $seminar = Seminar::where('user_id', Auth::user()->getAuthIdentifier())->paginate(10);
            return view('seminar.seminar', [
                'seminar' => $seminar,
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
                    'waktu_seminar'   => 'date|required',
                    'tahun_ajaran'      => 'required|min:0',
                    'no_berita_acara'     => 'required|min:0',
                    'path_foto_kegiatan'        => 'required|max:10000|mimes:pdf,jpg,png,doc,docx',
                    'path_lampiran'        => 'required|max:10000|mimes:pdf,jpg,png,doc,docx',
                ]);
                $waktu = Carbon::createFromFormat('d-m-Y', $request->waktu_seminar)->format('Y-m-d');                // Upload image
                $files = $request->file('path_lampiran');
                $files->storeAs('public', $files->hashName());
                $files2 = $request->file('path_foto_kegiatan');
                $files2->storeAs('public', $files2->hashName());
    
                // Create post
                Seminar::create([
                    'mahasiswa_nim'           => $request->mahasiswa_nim,
                    'mahasiswa_nama'             => $request->mahasiswa_nama,
                    'tahun_ajaran'                => $request->tahun_ajaran,
                    'waktu_seminar'   => $waktu,
                    'no_berita_acara'             => $request->no_berita_acara,
                    'path_lampiran'           => $files->hashName(),
                    'path_foto_kegiatan'            => $files2->hashName(),
                    'user_id'                  => Auth::user()->getAuthIdentifier(),
                ]);
    
                // Redirect to index
                return redirect('/seminar')->with(['success' => 'Data Berhasil Disimpan!']);
            }
        } catch (ValidationException $e) {
            return redirect()->back()->with('error',$e->errors());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function delete($id)
    {
        try {
            $seminar = Seminar::find($id);
            if ($seminar) {
                $seminar->delete();
                return redirect('/seminar')->with(['success' => 'Data berhasil dihapus']);
            } else {
                return redirect('/seminar')->with(['error' => 'Data tidak ditemukan']);
            }
        } catch (\Exception $e) {
            return redirect('/seminar')->with(['error' => 'Terjadi kesalahan saat menghapus data']);
        }
    }
}
