<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Http\Controllers\BaseController;
use Validator;
use Illuminate\Support\Facades\DB;

class ProvinsiController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Provinsi::all();
        return $this->sendResponse($data,'Success', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provinsi' => 'required',
        ]);

        DB::beginTransaction();

        if($validator->fails()) {
            return $this->sendError($validator->errors(),'Error',400);
        } else {
            $store = [
                'provinsi' => $request['provinsi']
            ];
            $data = Provinsi::create($store);
            DB::commit();
        }

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
