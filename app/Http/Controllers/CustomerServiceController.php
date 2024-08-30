<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\DataNasabah;
use Illuminate\Support\Facades\DB;

class CustomerServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tambahNasabah()
    {
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        return view('tambahNasabah.index', compact('provinsi','kota','kecamatan','kelurahan'));
    }
    
    public function dataNasabah(Request $request)
    {
        $data = DataNasabah::where('created_by','=',$request->user()->id)->get();
        return view('dataNasabah.index',compact('data'));
    }

    public function detailNasabah($id) 
    {
        $data = DataNasabah::where('id','=',$id)->first();
        return view('dataNasabah.detail',compact('data'));
    }

    public function storeNasabah(Request $request) 
    {
        $this->validate($request,[
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'nama_jalan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'nominal_setor' => 'required'
        ]);

        DB::beginTransaction();

        try{
            $store = new DataNasabah();
            $store->nama = $request['nama'];
            $store->tempat_lahir = $request['tempat_lahir'];
            $store->tanggal_lahir = $request['tanggal_lahir'];
            $store->jenis_kelamin = $request['jenis_kelamin'];
            $store->pekerjaan = $request['pekerjaan'];
            $store->provinsi = $request['provinsi'];
            $store->kota = $request['kota'];
            $store->kecamatan = $request['kecamatan'];
            $store->kelurahan = $request['kelurahan'];
            $store->nama_jalan = $request['nama_jalan'];
            $store->rt = $request['rt'];
            $store->rw = $request['rw'];
            $store->nominal_setor = $request['nominal_setor'];
            $store->created_by = $request->user()->id;
            $store->save();

            DB::commit();

            return redirect()->route('dataNasabah')->with('message','Success');

        }catch(\Exception $ex){
            return redirect()->back()->with('message','Failed');
        }
    }
}
