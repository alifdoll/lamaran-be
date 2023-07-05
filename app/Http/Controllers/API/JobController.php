<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends ApiController
{
    public function index(Request $request)
    {
        try {
            $jobs = Job::all();
            return $this->responseSuccess('success', JobResource::collection($jobs));
        } catch (\Throwable $th) {
            return $this->responseInternalError($th->getMessage());
        }
    }
}
