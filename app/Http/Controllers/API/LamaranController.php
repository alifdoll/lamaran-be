<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LamaranController extends ApiController
{
    public function apply(Request $request)
    {
        // return $this->responseSuccess('asd', 'asd');


        try {
            $validate = Validator::make($request->all(), [
                'email'         => 'required|unique:candidates|email',
                'phone'         => 'required|unique:candidates|numeric',
                'name'          => 'required',
                'year'          => 'required|integer',
                'job_id'        => 'required|integer',
                'skill_id'      => 'required|array'
            ], [
                'email.required'        => 'Email wajib diisi',
                'email.unique'          => 'Email Sudah diisi',
                'email.email'           => 'Format Email salah',
                'phone.required'        => 'Nomor Hp Wajib diisi',
                'phone.unique'          => 'Nomor Hp Sudah diambil',
                'phone.numeric'         => 'Nomor Hp Harus angka',
                'name'                  => 'Nama wajib diisi',
                'year.required'         => 'Tahun harus diisi',
                'year.integer'          => 'Tahun harus berupa angka',
                'job_id.required'       => 'Pekerjaan Harus Diisi',
                'job_id.integer'        => 'Id Pekerjaan Harus Berupa Angka',
                'skill_id.required'     => 'Skill Harus Diisi',
                'skill_id.array'        => 'Skill Id harus berupa array'
            ]);

            if ($validate->fails()) {
                $errors = $validate->errors()->messages();
                $data = [];

                foreach ($errors as $k => $err) {
                    $data[$k] = $err[0];
                }

                return $this->responseError(
                    'Error Validasi',
                    $data
                );
            }

            DB::beginTransaction();

            $data = $request->except('skill_id');
            $candidate = Candidate::create($data);

            $candidate->skills()->sync($request->skill_id);

            DB::commit();
            return $this->responseCreated('Success', $candidate->id);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseInternalError($th);
        }
    }
}
