<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function getData()
    {
        $data = DB::table('performances')
            ->select('id', 'year', 'sales', 'expenses')
            ->get();

        return response()->json($data);
    }

    public function addData(Request $request)
    {
        $request->validate([
            'year' => 'required|string',
            'sales' => 'required|integer',
            'expenses' => 'required|integer',
        ]);

        DB::table('performances')->insert([
            'year' => $request->year,
            'sales' => $request->sales,
            'expenses' => $request->expenses,
        ]);

        DB::statement('SET @num := 0;');
        DB::statement('UPDATE performances SET id = @num := (@num + 1);');
        DB::statement('ALTER TABLE performances AUTO_INCREMENT = 1;');

        return response()->json(['success' => 'Data added successfully!']);
    }

    public function updateData(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'year' => 'required|string',
            'sales' => 'required|integer',
            'expenses' => 'required|integer',
        ]);

        $id = $request->input('id');
        $newYear = $request->input('year');
        $sales = $request->input('sales');
        $expenses = $request->input('expenses');

        $existingRecord = DB::table('performances')->where('year', $newYear)->where('id', '<>', $id)->first();
        if ($existingRecord) {
            return response()->json(['error' => 'The year already exists. Please choose a different year.'], 400);
        }

        DB::table('performances')
            ->where('id', $id)
            ->update([
                'year' => $newYear,
                'sales' => $sales,
                'expenses' => $expenses,
            ]);

        return response()->json(['success' => 'Data updated successfully!']);
    }

    public function deleteData(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        DB::table('performances')
            ->where('id', $request->id)
            ->delete();

        DB::statement('SET @num := 0;');
        DB::statement('UPDATE performances SET id = @num := (@num + 1);');
        DB::statement('ALTER TABLE performances AUTO_INCREMENT = 1;');

        return response()->json(['success' => 'Data deleted successfully!']);
    }
}
