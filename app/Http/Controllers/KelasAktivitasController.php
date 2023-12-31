<?php

namespace App\Http\Controllers;

use App\Models\KelasAktivitas;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class KelasAktivitasController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        try {
            if (Auth::check()) {
                $this->validate($request, [
                    'nama_matkul'    => 'string|required',
                    'nama_kelas'      => 'string|required',
                    'hari' => 'numeric|required',
                    'waktu'  => 'date_format:H:i|required',
                    'sks' => 'numeric|required',
                    'id_aktivitas' => 'numeric|required',
                ]);
    
                // Create post
                KelasAktivitas::create([
                    'kelas_matkul'           => $request->nama_matkul,
                    'kelas_nama'             => $request->nama_kelas,
                    'kelas_waktu'            => $request->waktu,
                    'kelas_sks'              => $request->sks,
                    'aktivitas_id'           => $request->id_aktivitas,
                    'kelas_hari'             => $request->hari,
                ]);
    
                
                return redirect('/aktivitas/detail/'.$request->id_aktivitas)->with(['success' => 'Data Berhasil Disimpan!']);
            }
        } catch (ValidationException $e) {
            return redirect()->back()->with('error',$e->errors());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
}
