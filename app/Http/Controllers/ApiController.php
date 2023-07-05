<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function response($message = null, $data = null, $status_code = 200)
    {
        $response = compact('data', 'message', 'status_code');
        return response()->json($response, $status_code);
    }

    public function responseSuccess($message = null, $data = null)
    {
        $message = $message ?? 'Success';
        return $this->response($message, $data, 200);
    }

    public function responseCreated($message = null, $data = null)
    {
        $message = $message ?? 'Created';
        return $this->response($message, $data, 201);
    }

    public function responseInvalid($message = null, $error = null)
    {
        $message = $message ?? 'Invalid';
        return $this->response($message, $error, 400);
    }

    public function responseUnauthorized($message = null, $error = null)
    {
        $message = $message ?? 'Unauthorized';
        return $this->response($message, $error, 401);
    }

    public function responseForbidden($error = null)
    {
        $error = $error ?? 'Forbidden';
        return $this->response('Error Forbidden', $error, 403);
    }

    public function responseNotFound($error = null)
    {
        $error = $error ?? 'Not Found';
        return $this->response('Error Not Found', $error, 404);
    }

    public function responseError($message = null, $error = null)
    {
        $message = $message ?? "Error";
        return $this->response($message, $error, 500);
    }

    public function responseInternalError($error = null)
    {
        $error = $error ?? 'Internal Error';
        return $this->response('Internal Error', $error, 500);
    }
}
