<?php

namespace App\Http\Controllers;

use App\Models\PengembanganBahanAjar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PengembanganBahanAjarController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $errorMessage = session('error');
            $successMessage = session('success');
            $pengembangan = PengembanganBahanAjar::where('user_id', Auth::user()->getAuthIdentifier())->paginate(10);
            return view('pengembanganba.pengembanganba', [
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
                    'jenis_bahan_ajar'    => 'string|required',
                    'deskripsi_bahan_ajar'      => 'string|required',
                    'path_lampiran'        => 'required|max:10000|mimes:pdf,jpg,png,doc,docx',
                ]);                // Upload image
                $files = $request->file('path_lampiran');
                $files->storeAs('public', $files->hashName());
    
                // Create post
                PengembanganBahanAjar::create([
                    'jenis_bahan_ajar'           => $request->jenis_bahan_ajar,
                    'deskripsi_bahan_ajar'             => $request->deskripsi_bahan_ajar,
                    'hasil_pengembangan'           => $files->hashName(),
                    'user_id'                  => Auth::user()->getAuthIdentifier()
                ]);
    
                // Redirect to index
                return redirect('/pengembangan-ba')->with(['success' => 'Data Berhasil Disimpan!']);
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
            $pengembanganbahanajar = PengembanganBahanAjar::find($id);
            if ($pengembanganbahanajar) {
                $pengembanganbahanajar->delete();
                return redirect('/pengembangan-ba')->with(['success' => 'Data berhasil dihapus']);
            } else {
                return redirect('/pengembangan-ba')->with(['error' => 'Data tidak ditemukan']);
            }
        } catch (\Exception $e) {
            return redirect('/pengembangan-ba')->with(['error' => 'Terjadi kesalahan saat menghapus data']);
        }
    }
}
