<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class JabatanController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $errorMessage = session('error');
            $successMessage = session('success');
            $jabatan = Jabatan::where('user_id', Auth::user()->getAuthIdentifier())->paginate(10);
            return view('jabatan.jabatan', [
                'jabatan' => $jabatan,
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
                    'jabatan'    => 'string|required',
                    'periode_awal'      => 'date|required',
                    'periode_akhir'   => 'date|required',
                    'no_sk'     => 'required|min:0',
                    'lampiran_jabatan'        => 'required|max:10000|mimes:pdf,jpg,png,doc,docx',
                ]);
                $awal = Carbon::createFromFormat('d-m-Y', $request->periode_awal)->format('Y-m-d');
                $akhir = Carbon::createFromFormat('d-m-Y', $request->periode_akhir)->format('Y-m-d');           
                $files = $request->file('lampiran_jabatan');
                $files->storeAs('public', $files->hashName());
    
                // Create post
                Jabatan::create([
                    'jabatan'           => $request->jabatan,
                    'periode_awal'                => $awal,
                    'periode_akhir'   => $akhir,
                    'no_sk'             => $request->no_sk,
                    'lampiran_jabatan'           => $files->hashName(),
                    'user_id'                  => Auth::user()->getAuthIdentifier(),
                ]);
    
                // Redirect to index
                return redirect('/jabatan')->with(['success' => 'Data Berhasil Disimpan!']);
            }
        } catch (ValidationException $e) {
            return redirect()->back()->with('error',$e->errors());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
}
