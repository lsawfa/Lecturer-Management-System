<?php

namespace App\Http\Controllers;

use App\Models\PengembanganPK;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PengembanganPKController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $errorMessage = session('error');
            $successMessage = session('success');
            $pengembangan = PengembanganPK::where('user_id', Auth::user()->getAuthIdentifier())->paginate(10);
            return view('pengembanganpk.pengembanganpk', [
                'pengembangan' => $pengembangan,
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
                    'matkul_pengembangan'    => 'string|required',
                    'deskripsi_pengembangan'      => 'string|required',
                    'path_lampiran'        => 'required|max:10000|mimes:pdf,jpg,png,doc,docx',
                ]);                // Upload image
                $files = $request->file('path_lampiran');
                $files->storeAs('public', $files->hashName());
    
                // Create post
                PengembanganPK::create([
                    'matkul_pengembangan'           => $request->matkul_pengembangan,
                    'deskripsi_pengembangan'             => $request->deskripsi_pengembangan,
                    'hasil_pengembangan'           => $files->hashName(),
                    'user_id'                  => Auth::user()->getAuthIdentifier()
                ]);
    
                // Redirect to index
                return redirect('/pengembangan-pk')->with(['success' => 'Data Berhasil Disimpan!']);
            }
        } catch (ValidationException $e) {
            dd($e->errors());
            return redirect()->back()->with('error',$e->errors());
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
    public function delete($id)
    {
        try {
            $pengembanganpk = PengembanganPK::find($id);
            if ($pengembanganpk) {
                $pengembanganpk->delete();
                return redirect('/pengembangan-pk')->with(['success' => 'Data berhasil dihapus']);
            } else {
                return redirect('/pengembangan-pk')->with(['error' => 'Data tidak ditemukan']);
            }
        } catch (\Exception $e) {
            return redirect('/pengembangan-pk')->with(['error' => 'Terjadi kesalahan saat menghapus data']);
        }
    }
}
