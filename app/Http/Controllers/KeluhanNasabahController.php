<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\KeluhanNasabah;

class KeluhanNasabahController extends Controller
{
    public function index() {
        $keluhanNasabah = KeluhanNasabah::all();
        $response = [
            'status' => 'Success',
            'data' => $keluhanNasabah
        ];
        return response()->json($response, 200);
    }

    public function tambah(Request $request)
    {
        $keluhanNasabah = new KeluhanNasabah;

        $keluhanNasabah->asal_keluhan = $request['asal_keluhan'];
        $keluhanNasabah->procedure = $request['procedure'];
        $keluhanNasabah->card_number = $request['card_number'];
        $keluhanNasabah->account_name = $request['account_name'];
        $keluhanNasabah->problem_solution = $request['problem_solution'];
        $keluhanNasabah->operator = $request['operator'];
        $keluhanNasabah->corrector = $request['corrector'];
        $keluhanNasabah->supervisor = $request['supervisor'];
        $keluhanNasabah->created_at = Carbon::now();
        $keluhanNasabah->updated_at = Carbon::now();

        try {
            $success = $keluhanNasabah->save();
            $status = 200;
            $response = [
                'status' => 'Success',
                'data' => $keluhanNasabah
            ];
        }catch (\Illuminate\Database\QueryException $e) {
            $status = 500;
            $response = [
                'status' => 'Error',
                'data' => [],
                'message' => $e
            ];
        }
        return response()->json($response, $status);
    }

    public function edit(Request $request, $id_keluhan)
    {
        $keluhanNasabah = KeluhanNasabah::find($id_keluhan);

        if($keluhanNasabah == NULL ) {
            $status = 404;
            $response = [
                'status' => 'Data Not Found',
                'data' => []
            ];
        } else {
            $keluhanNasabah->asal_keluhan = $request['asal_keluhan'];
            $keluhanNasabah->procedure = $request['procedure'];
            $keluhanNasabah->card_number = $request['card_number'];
            $keluhanNasabah->account_name = $request['account_name'];
            $keluhanNasabah->problem_solution = $request['problem_solution'];
            $keluhanNasabah->operator = $request['operator'];
            $keluhanNasabah->corrector = $request['corrector'];
            $keluhanNasabah->supervisor = $request['supervisor'];

            try {
                $success = $keluhanNasabah->save();
                $status = 200;
                $response = [
                    'message' => 'Success',
                    'data' => $keluhanNasabah
                ];
            } catch (\Illuminate\Database\QueryException $e) {
                $status = 500;
                $response = [
                    'status' => 'Error',
                    'data' => [],
                    'message' => $e
                ];
            }
        }
        return response()->json($response, $status);
    }

    public function hapus($id_keluhan)
    {
        $keluhanNasabah = KeluhanNasabah::findOrFail($id_keluhan);

        if ($keluhanNasabah == NULL || $keluhanNasabah->deleted_at != NULL) {
            $status = 404;
            $response = [
                'status' => 'Data Not Found',
                'data' => []
            ];
        } else {
            $keluhanNasabah->delete();
            $status = 200;
            $response = [
                'status' => 'Success',
                'data' => $keluhanNasabah
            ];
        }
        return response()->json($response, $status);
    }
}
