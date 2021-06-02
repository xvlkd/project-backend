<?php

namespace App\Http\Controllers;

use App\Models\AktivasiATM;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AktivasiATMController extends Controller
{
    public function index()
    {
        $aktivasiATM = AktivasiATM::all();
        $response = [
            'status' => 'Success',
            'data' => $aktivasiATM
        ];
        return response()->json($response, 200);
    }

    public function tambah(Request $request)
    {
        $aktivasiATM = new AktivasiATM;

        $aktivasiATM->card_number = $request['card_number'];
        $aktivasiATM->account_name = $request['account_name'];
        $aktivasiATM->procedure = $request['procedure'];
        $aktivasiATM->operator = $request['operator'];
        $aktivasiATM->corrector = $request['corrector'];
        $aktivasiATM->supervisor = $request['supervisor'];
        $aktivasiATM->office_code = $request['office_code'];
        $aktivasiATM->section_code = $request['section_code'];
        $aktivasiATM->id_user = $request['id_user'];
        $aktivasiATM->created_at = Carbon::now();
        $aktivasiATM->updated_at = Carbon::now();

        try {
            $success = $aktivasiATM->save();
            $status = 200;
            $response = [
                'status' => 'Success',
                'data' => $aktivasiATM
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

    public function edit(Request $request, $id_aktivasi)
    {
        $aktivasiATM = AktivasiATM::find($id_aktivasi);

        if($aktivasiATM == NULL ) {
            $status = 404;
            $response = [
                'status' => 'Data Not Found',
                'data' => []
            ];
        } else {
            $aktivasiATM->card_number = $request['card_number'];
            $aktivasiATM->account_name = $request['account_name'];
            $aktivasiATM->procedure = $request['procedure'];
            $aktivasiATM->operator = $request['operator'];
            $aktivasiATM->corrector = $request['corrector'];
            $aktivasiATM->supervisor = $request['supervisor'];
            $aktivasiATM->office_code = $request['office_code'];
            $aktivasiATM->section_code = $request['section_code'];
            $aktivasiATM->id_user = $request['id_user'];

            try {
                $success = $aktivasiATM->save();
                $status = 200;
                $response = [
                    'message' => 'Success',
                    'data' => $aktivasiATM
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

    public function hapus($id_aktivasi)
    {
        $aktivasiATM = AktivasiATM::findOrFail($id_aktivasi);

        if ($aktivasiATM == NULL || $aktivasiATM->deleted_at != NULL) {
            $status = 404;
            $response = [
                'status' => 'Data Not Found',
                'data' => []
            ];
        } else {
            $aktivasiATM->delete();
            $status = 200;
            $response = [
                'status' => 'Success',
                'data' => $aktivasiATM
            ];
        }
        return response()->json($response, $status);
    }
}