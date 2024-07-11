<?php

namespace App\Http\Controllers;

use App\Models\OperatorTransaction;
use Illuminate\Http\Request;

class OperatorTransactionController extends Controller
{
    public function index()
    {
        return view('operator-transaction');
    }

    public function filter(Request $request)
    {
        $query = OperatorTransaction::query();

        if ($request->mesin_id) {
            $query->where('mesin_id', $request->mesin_id);
        }

        if ($request->month) {
            $query->whereMonth('submitted_when', $request->month);
        }

        if ($request->site) {
            $query->where('site_code', $request->site);
        }

        if ($request->operator) {
            $query->where('check_by', $request->operator);
        }

        if ($request->activity) {
            $query->where('activity', $request->activity);
        }

        $data = $query->get();

        return response()->json(['data' => $data]);
    }
}