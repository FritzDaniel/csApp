<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelurahan;
use App\Http\Controllers\BaseController;
use Validator;

class KelurahanController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kelurahan::all();
        return $this->sendResponse($data,'Success', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kecamatan_id' => 'required',
            'kelurahan' => 'required',
        ]);

        if($validator->fails()) {
            return $this->sendError($validator->errors(),'Error',400);
        }

        $store = [
            'kecamatan_id' => $request['kecamatan_id'],
            'kelurahan' => $request['kelurahan']
        ];
        $data = Kelurahan::create($store);

        return $this->sendResponse($data, 'Success', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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

    public function getKelurahanByKecamantan($id)
    {
        $data = Kelurahan::where('kecamatan_id','=',$id)->get();
        return $this->sendResponse($data,'Success', 200);
    }
}
