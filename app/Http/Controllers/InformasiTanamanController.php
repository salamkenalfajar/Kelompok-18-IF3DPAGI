<?php

namespace App\Http\Controllers;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class InformasiTanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pencarian = $request->input('cari');
        if($pencarian) {
            $tanamans = Tanaman::where('nama', 'like', '%'. $pencarian . '%')->get();
        } else {
            $tanamans = Tanaman::all();
        }
        
        return view('user/informasitanaman', compact('tanamans','pencarian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
