<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\KelasAktivitas;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
class AktivitasController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $errorMessage = session('error');
            $successMessage = session('success');
            $aktivitas = Aktivitas::where('user_id', Auth::user()->getAuthIdentifier())->paginate(10);
            $total_aktivitas = Aktivitas::where('user_id', Auth::user()->getAuthIdentifier())->count();
            $jumlah_sks = Aktivitas::where('user_id', Auth::user()->getAuthIdentifier())->sum('jumlah_volume_kegiatan');
            $jumlah_angka_kredit = Aktivitas::sum(DB::raw('jumlah_volume_kegiatan * angka_kredit'));
            return view('aktivitas.aktivitas', [
                'aktivitas' => $aktivitas,
                'errorMessage' => $errorMessage,
                'successMessage' =>  $successMessage,
                'total_aktivitas' => $total_aktivitas,
                'jumlah_sks' => $jumlah_sks,
                'jumlah_angka_kredit' => $jumlah_angka_kredit
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
                'nama_aktivitas'    => 'string|required',
                'tahun_ajaran'      => 'string|required',
                'tanggal_dimulai'   => 'date|required',
                'tanggal_berakhir'  => 'date|required',
                'satuan_hasil'      => 'required|min:0',
                'jumlah_volume'     => 'required|min:0',
                'angka_kredit'      => 'required|min:0',
                'jenis_lampiran'    => 'required',
                'file_input'        => 'required|max:10000|mimes:pdf,jpg,png,doc,docx',
                'no_tugas'          => 'string|required'
            ]);
            $tanggalDimulai = Carbon::createFromFormat('d-m-Y', $request->tanggal_dimulai)->format('Y-m-d');
            $tanggalBerakhir = Carbon::createFromFormat('d-m-Y', $request->tanggal_berakhir)->format('Y-m-d');
            // Upload image
            $files = $request->file('file_input');
            $files->storeAs('public', $files->hashName());

            // Create post
            Aktivitas::create([
                'nama_aktivitas'           => $request->nama_aktivitas,
                'tahun_ajaran'             => $request->tahun_ajaran,
                'tanggal_mulai'            => $tanggalDimulai,
                'tanggal_berakhir'         => $tanggalBerakhir,
                'sks_hasil'                => $request->satuan_hasil,
                'jumlah_volume_kegiatan'   => $request->jumlah_volume,
                'angka_kredit'             => $request->angka_kredit,
                'jenis_lampiran'           => $request->jenis_lampiran,
                'path_lampiran'            => $files->hashName(),
                'no_penugasan'             => $request->no_tugas,
                'user_id'                  => Auth::user()->getAuthIdentifier(),
            ]);

            // Redirect to index
            return redirect('/aktivitas')->with(['success' => 'Data Berhasil Disimpan!']);
        }
    } catch (ValidationException $e) {
        return redirect()->back()->with('error',$e->errors());
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
    }
}

public function update(Request $request): RedirectResponse
    {
        try {
            if (Auth::check()) {
                $this->validate($request, [
                    'nama_aktivitas'    => 'string|required',
                    'tahun_ajaran'      => 'string|required',
                    'tanggal_dimulai'   => 'date|required',
                    'tanggal_berakhir'  => 'date|required',
                    'satuan_hasil'      => 'required|min:0',
                    'jumlah_volume'     => 'required|min:0',
                    'angka_kredit'      => 'required|min:0',
                    'no_tugas'          => 'string|required',
                    'id' => 'required'
                ]);
                
                $tanggalDimulai = Carbon::createFromFormat('d-m-Y', $request->tanggal_dimulai)->format('Y-m-d');
                $tanggalBerakhir = Carbon::createFromFormat('d-m-Y', $request->tanggal_berakhir)->format('Y-m-d');
                $existingAktivitas = Aktivitas::where('id', $request->id)->first();
    
                if ($existingAktivitas) {
                    // Update existing Aktivitas
                    $existingAktivitas->update([
                        'nama_aktivitas'           => $request->nama_aktivitas,
                        'tahun_ajaran'             => $request->tahun_ajaran,
                        'tanggal_mulai'            => $tanggalDimulai,
                        'tanggal_berakhir'         => $tanggalBerakhir,
                        'sks_hasil'                => $request->satuan_hasil,
                        'jumlah_volume_kegiatan'   => $request->jumlah_volume,
                        'angka_kredit'             => $request->angka_kredit,
                        'no_penugasan'             => $request->no_tugas,
                    ]);
                } else {
                }
    
                // Redirect to index
                return redirect('/aktivitas/detail/' . $request->id)->with(['success' => 'Data Berhasil Disimpan!']);
            }
        } catch (ValidationException $e) {
            dd($e->errors());
            return redirect()->back()->with('error', $e->errors());
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }


public function detail($id)
{
    if (Auth::check()) {
        $aktivitas = Aktivitas::where('user_id', Auth::user()->getAuthIdentifier())
                                ->where('id', $id)
                                ->exists();
        if ($aktivitas) {
            $aktivitas = Aktivitas::findOrFail($id);
            $kelas_aktivitas = KelasAktivitas::where('aktivitas_id', $id)->get();
            return view('aktivitas.detail',[
                'aktivitas' => $aktivitas,
                'kelas_aktivitas' => $kelas_aktivitas
            ]);
        } else {
            return redirect('/aktivitas');
        }
    } else {
        return redirect('/login');
    }
}
public function delete($id)
{
    if (Auth::check()) {
        $aktivitas = Aktivitas::where('user_id', Auth::user()->getAuthIdentifier())
                                ->where('id', $id)
                                ->first();
        if ($aktivitas) {
            try {
                $kelasAktivitas = KelasAktivitas::where('aktivitas_id', $id)->first();
                if ($kelasAktivitas) {
                    $kelasAktivitas->delete();
                }
                $aktivitas->delete();
                return redirect('/aktivitas');
            } catch (\Exception $e) {
                dd($e);
            }
        } else {
            return redirect('/aktivitas');
        }
    } else {
        return redirect('/login');
    }
}
}
