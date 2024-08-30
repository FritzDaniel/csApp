<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kota;
use App\Http\Controllers\BaseController;
use Validator;

class KotaController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kota::all();
        return $this->sendResponse($data,'Success', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provinsi_id' => 'required',
            'kota' => 'required',
        ]);

        if($validator->fails()) {
            return $this->sendError($validator->errors(),'Error',400);
        }

        $store = [
            'provinsi_id' => $request['provinsi_id'],
            'kota' => $request['kota']
        ];
        $data = Kota::create($store);

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
}
