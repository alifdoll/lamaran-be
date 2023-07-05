<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends ApiController
{
    public function index(Request $request)
    {
        try {
            $skills = Skill::all();
            return $this->responseSuccess('success', SkillResource::collection($skills));
        } catch (\Throwable $th) {
            return $this->responseInternalError($th->getMessage());
        }
    }
}
