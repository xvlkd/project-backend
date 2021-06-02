<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProblemRecord;
use Carbon\Carbon;

class ProblemRecordController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $problemRecord = ProblemRecord::all();
        $response = [
            'status' => 'Success',
            'data' => $problemRecord
        ];
        return response()->json($response, 200);
    }

    public function tambah(Request $request)
    {
        $problemRecord = new ProblemRecord;

        $problemRecord->id_category = $request['id_category'];
        $problemRecord->problem = $request['problem'];
        $problemRecord->solution = $request['solution'];
        $problemRecord->description = $request['description'];
        $problemRecord->operator = $request['operator'];
        $problemRecord->corrector = $request['corrector'];
        $problemRecord->supervisor = $request['supervisor'];
        $problemRecord->office_code = $request['office_code'];
        $problemRecord->section_code = $request['section_code'];
        $problemRecord->id_user = $request['id_user'];
        $problemRecord->created_at = Carbon::now();
        $problemRecord->updated_at = Carbon::now();

        try {
            $success = $problemRecord->save();
            $status = 200;
            $response = [
                'status' => 'Success',
                'data' => $problemRecord
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

    public function edit(Request $request, $id_problemrecord)
    {
        $problemRecord = ProblemRecord::find($id_problemrecord);

        if($problemRecord == NULL ) {
            $status = 404;
            $response = [
                'status' => 'Data Not Found',
                'data' => []
            ];
        } else {
            $problemRecord->problem = $request['problem'];
            $problemRecord->solution = $request['solution'];
            $problemRecord->description = $request['description'];
            $problemRecord->operator = $request['operator'];
            $problemRecord->corrector = $request['corrector'];
            $problemRecord->supervisor = $request['supervisor'];
            $problemRecord->office_code = $request['office_code'];
            $problemRecord->section_code = $request['section_code'];

            try {
                $success = $problemRecord->save();
                $status = 200;
                $response = [
                    'message' => 'Success',
                    'data' => $problemRecord
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

    public function hapus($id_problemrecord)
    {
        $problemRecord = ProblemRecord::findOrFail($id_problemrecord);

        if ($problemRecord == NULL || $problemRecord->deleted_at != NULL) {
            $status = 404;
            $response = [
                'status' => 'Data Not Found',
                'data' => []
            ];
        } else {
            $problemRecord->delete();
            $status = 200;
            $response = [
                'status' => 'Success',
                'data' => $problemRecord
            ];
        }
        return response()->json($response, $status);
    }

}
