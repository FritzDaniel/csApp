<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Http\Controllers\BaseController;
use Validator;

class KecamatanController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kecamatan::all();
        return $this->sendResponse($data,'Success', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kota_id' => 'required',
            'kecamatan' => 'required',
        ]);

        if($validator->fails()) {
            return $this->sendError($validator->errors(),'Error',400);
        }

        $store = [
            'kota_id' => $request['kota_id'],
            'kecamatan' => $request['kecamatan']
        ];
        $data = Kecamatan::create($store);

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

    public function getKecamatanByKota($id)
    {
        $data = Kecamatan::where('kota_id','=',$id)->get();
        return $this->sendResponse($data,'Success', 200);
    }
}
