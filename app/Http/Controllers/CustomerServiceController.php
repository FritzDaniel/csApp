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
        $this->validate($request, [
            'nama' => [
                'required',
                'string',
                'regex:/^[a-zA-Z\s]+$/',
                function ($attribute, $value, $fail) {
                    $forbiddenWords = ['profesor', 'haji', 'dr', 'dokter', 'ir'];
                    foreach ($forbiddenWords as $word) {
                        if (stripos($value, $word) !== false) {
                            return $fail("Nama tidak boleh mengandung kata '{$word}'.");
                        }
                    }
                },
            ],
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
            'nominal_setor' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $store = new DataNasabah();
            $store->nama = $request->input('nama');
            $store->tempat_lahir = $request->input('tempat_lahir');
            $store->tanggal_lahir = $request->input('tanggal_lahir');
            $store->jenis_kelamin = $request->input('jenis_kelamin');
            $store->pekerjaan = $request->input('pekerjaan');
            $store->provinsi = $request->input('provinsi');
            $store->kota = $request->input('kota');
            $store->kecamatan = $request->input('kecamatan');
            $store->kelurahan = $request->input('kelurahan');
            $store->nama_jalan = $request->input('nama_jalan');
            $store->rt = $request->input('rt');
            $store->rw = $request->input('rw');
            $store->nominal_setor = $request->input('nominal_setor');
            $store->created_by = $request->user()->id;
            $store->save();

            DB::commit();

            return redirect()->route('dataNasabah')->with('message', 'Success');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('message', 'Failed');
        }
    }
}
