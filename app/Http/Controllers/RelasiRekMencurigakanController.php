<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\RelasiRekMencurigakan;

class RelasiRekMencurigakanController extends Controller
{
    public function index() {
        $relasirekMencurigakan = RelasiRekMencurigakan::all();
        $response = [
            'status' => 'Success',
            'data' => $relasirekMencurigakan
        ];
        return response()->json($response, 200);
    }

    public function tambah(Request $request)
    {
        $relasirekMencurigakan = new RelasiRekMencurigakan;

        $relasirekMencurigakan->category = $request['category'];
        $relasirekMencurigakan->card_number_1 = $request['card_number_1'];
        $relasirekMencurigakan->card_number_2 = $request['card_number_2'];
        $relasirekMencurigakan->account_number_1 = $request['account_number_1'];
        $relasirekMencurigakan->account_number_2 = $request['account_number_2'];
        $relasirekMencurigakan->account_name = $request['account_name'];
        $relasirekMencurigakan->description = $request['description'];
        $relasirekMencurigakan->operator = $request['operator'];
        $relasirekMencurigakan->corrector = $request['corrector'];
        $relasirekMencurigakan->supervisor = $request['supervisor'];
        $relasirekMencurigakan->office_code = $request['office_code'];
        $relasirekMencurigakan->section_code = $request['section_code'];
        $relasirekMencurigakan->created_at = Carbon::now();
        $relasirekMencurigakan->updated_at = Carbon::now();

        try {
            $success = $relasirekMencurigakan->save();
            $status = 200;
            $response = [
                'status' => 'Success',
                'data' => $relasirekMencurigakan
            ];
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 500;
            $response = [
                'status' => 'Error',
                'data' => [],
                'message' => $e
            ];
        }
        return response()->json($response, $status);
    }

    public function edit(Request $request, $id_relasi)
    {
        $relasirekMencurigakan = RelasiRekMencurigakan::find($id_relasi);

        if($relasirekMencurigakan == NULL ) {
            $status = 404;
            $response = [
                'status' => 'Data Not Found',
                'data' => []
            ];
        } else {
            $relasirekMencurigakan->category = $request['category'];
            $relasirekMencurigakan->card_number_1 = $request['card_number_1'];
            $relasirekMencurigakan->card_number_2 = $request['card_number_2'];
            $relasirekMencurigakan->account_number_1 = $request['account_number_1'];
            $relasirekMencurigakan->account_number_2 = $request['account_number_2'];
            $relasirekMencurigakan->account_name = $request['account_name'];
            $relasirekMencurigakan->description = $request['description'];
            $relasirekMencurigakan->operator = $request['operator'];
            $relasirekMencurigakan->corrector = $request['corrector'];
            $relasirekMencurigakan->supervisor = $request['supervisor'];

            try {
                $success = $relasirekMencurigakan->save();
                $status = 200;
                $response = [
                    'message' => 'Success',
                    'data' => $relasirekMencurigakan
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

    public function hapus($id_relasi)
    {
        $relasirekMencurigakan = RelasiRekMencurigakan::findOrFail($id_relasi);

        if ($relasirekMencurigakan == NULL || $relasirekMencurigakan->deleted_at != NULL) {
            $status = 404;
            $response = [
                'status' => 'Data Not Found',
                'data' => []
            ];
        } else {
            $relasirekMencurigakan->delete();
            $status = 200;
            $response = [
                'status' => 'Success',
                'data' => $relasirekMencurigakan
            ];
        }
        return response()->json($response, $status);
    }
}
