<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Alat;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null) {

        if($id != null) {
            $alats = Alat::where('kategori_id','=',$id)->get();
        }
        else {
            $alats = Alat::with(['category'])->get();
        }

        if(request('search')) {
            $key = request('search');
            $alats =  Alat::with(['category'])->where('nama_alat','LIKE','%'.$key.'%')->get();
        }

        return view('dashboard.admin.alat',[
            'alats' => $alats,
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'kategori' => 'required',
            'harga24' => 'required|numeric',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $alat = new Alat();
        $alat->nama_alat = $request['nama'];
        $alat->deskripsi = $request['deskripsi'];
        $alat->kategori_id = $request['kategori'];
        $alat->harga24 = $request['harga24'];

        if($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time().'-'.$gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $filename);
            $alat->gambar = $filename;
        }

        $alat->save();
        return redirect()->back()->with('message', 'Alat berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alat = Alat::with(['category'])->find($id);

        return view('dashboard.admin.editalat',[
            'alat' => $alat,
            'kategori' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'kategori' => 'required',
            'harga24' => 'required|numeric',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $alat = Alat::find($id);
        $alat->nama_alat = $request['nama'];
        $alat->deskripsi = $request['deskripsi'];
        $alat->kategori_id = $request['kategori'];
        $alat->harga24 = $request['harga24'];

        if($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time().'-'.$gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $filename);
            $alat->gambar = $filename;
        }

        $alat->save();

        // Agar harga pada cart mengikuti saat harga alat di-update oleh Admin
        // $cart = new Carts();
        // $cart->where('alat_id',$id)->where('durasi',24)->update(['harga' => $alat->harga24]);

        return redirect(route('admin.alat.index'))->with('message', 'Alat berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alat = Alat::find($id);
        if($alat->gambar != 'noimage.jpg') {
            $filepath = public_path('images'). '/' . $alat->gambar;
            unlink($filepath);
        }
        $alat->delete();
        return redirect(route('admin.alat.index'))->with('message', 'Alat berhasil dihapus!');
    }
}
