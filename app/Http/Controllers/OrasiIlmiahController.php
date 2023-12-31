<?php

namespace App\Http\Controllers;

use App\Models\OrasiIlmiah;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class OrasiIlmiahController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $errorMessage = session('error');
            $successMessage = session('success');
            $orasi = OrasiIlmiah::where('user_id', Auth::user()->getAuthIdentifier())->paginate(10);
            return view('orasi.orasi', [
                'orasi' => $orasi,
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
                    'tema_orasi'    => 'string|required',
                    'waktu'   => 'date|required',
                    'path_lampiran'        => 'required|max:10000|mimes:pdf,jpg,png,doc,docx',
                ]);
                $waktu = Carbon::createFromFormat('d-m-Y', $request->waktu)->format('Y-m-d');                // Upload image
                $files = $request->file('path_lampiran');
                $files->storeAs('public', $files->hashName());
    
                // Create post
                OrasiIlmiah::create([
                    'tema_orasi'           => $request->tema_orasi,
                    'waktu'             => $waktu,
                    'lampiran_orasi'           => $files->hashName(),
                    'user_id'                  => Auth::user()->getAuthIdentifier(),
                ]);
    
                // Redirect to index
                return redirect('/orasi')->with(['success' => 'Data Berhasil Disimpan!']);
            }
        } catch (ValidationException $e) {
            return redirect()->back()->with('error',$e->errors());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
}
