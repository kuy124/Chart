<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JabatanDataController extends Controller
{
    public function index()
    {
        $data = DB::table('jabatan_data')
            ->select('id', 'jabatan', 'laki_laki', 'perempuan')
            ->get();

        return response()->json($data);
    }

    public function addData(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string',
            'laki_laki' => 'required|integer',
            'perempuan' => 'required|integer',
        ]);

        DB::table('jabatan_data')->insert([
            'jabatan' => $request->jabatan,
            'laki_laki' => $request->laki_laki,
            'perempuan' => $request->perempuan,
        ]);

        return response()->json(['success' => 'Data added successfully!']);
    }

    public function updateData(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'jabatan' => 'required|string',
            'laki_laki' => 'required|integer',
            'perempuan' => 'required|integer',
        ]);

        DB::table('jabatan_data')
            ->where('id', $request->id)
            ->update([
                'jabatan' => $request->jabatan,
                'laki_laki' => $request->laki_laki,
                'perempuan' => $request->perempuan,
            ]);

        return response()->json(['success' => 'Data updated successfully!']);
    }

    public function deleteData(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        DB::table('jabatan_data')
            ->where('id', $request->id)
            ->delete();

        return response()->json(['success' => 'Data deleted successfully!']);
    }
}
