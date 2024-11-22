<?php

namespace App\Http\Controllers;
use App\Models\Tanaman;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminTanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pencarian = $request->input('cari');
        if($pencarian){
            $tanamans = Tanaman::where('nama', 'like', '%' . $pencarian . '%')->get();
        } else {
            $tanamans = Tanaman::all();
        }
        
        return view('mengelolatanaman', compact('tanamans', 'pencarian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:infohama,Nama',
            'klasifikasi' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:10000',
            'deskripsi' => 'required|string',
        ]);

        $filepath = public_path('uploads');
        $infotanaman = new Tanaman();
        $infotanaman->Nama= $request->nama;
        $infotanaman->Klasifikasi = $request->klasifikasi;
        $infotanaman->Deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) { 
            $file = $request->file('gambar'); 
            $filename = uniqid() . date('Y-m-d') .  $file->getClientOriginalName();

            $file->move($filepath, $filename);
            $infotanaman->Gambar = $filename;

         }
                $infotanaman->save();
                return redirect()->route('mengelolatanaman.index')->with('success', 'Data tanaman berhasil ditambahkan.');
            }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'klasifikasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:10000',
            'deskripsi' => 'required|string',
        ]);
    
        $tanaman = Tanaman::findOrFail($id);
        $tanaman->Nama = $request->nama;
        $tanaman->Klasifikasi = $request->klasifikasi;
        $tanaman->Deskripsi = $request->deskripsi;
    
        if ($request->hasFile('gambar')) {
            $filepath = public_path('uploads');
            $file = $request->file('gambar');
            $filename = uniqid() . date('Y-m-d') .  $file->getClientOriginalName();
            $file->move($filepath, $filename);
            $tanaman->Gambar = $filename;
        }
    
        $tanaman->save();
        return redirect()->route('mengelolatanaman.index')->with('success', 'Data tanaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Id_Tanaman)
    {
        $del = Tanaman::findorFail($Id_Tanaman);
        $del->delete();
        return redirect()->route('mengelolatanaman.index')->with('success', 'Data tanaman berhasil dihapus.');;
    }
}
