<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\family;
use Illuminate\Http\Request;

class familyController extends Controller
{
    public function index()
    {
        $data = family::orderBy('created_at', 'desc')->get();
        return response()->json($data, 200);
    }
    public function anak()
    {
        $data = family::with('child')->first();
        $data = $data->child;
        return response()->json($data, 200);
    }
    public function cucuPerempuan()
    {
        $data = family::with('child')->first();
        foreach ($data->child as $key => $value) {
            foreach ($value->child->where('jenis_kelamin', 'P') as $key => $value) {
                $temp[] = $value;
            }
        }
        return response()->json($temp, 200);
    }
    public function cucuLaki()
    {
        $data = family::with('child')->first();
        foreach ($data->child as $key => $value) {
            foreach ($value->child->where('jenis_kelamin', 'L') as $key => $value) {
                $temp[] = $value;
            }
        }
        return response()->json($temp, 200);
    }
}
