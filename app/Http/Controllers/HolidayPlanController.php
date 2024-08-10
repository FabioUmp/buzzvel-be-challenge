<?php

namespace App\Http\Controllers;

use App\Models\HolidayPlan;
use Illuminate\Http\Request;
use PDF;

class HolidayPlanController extends Controller
{
    public function index()
    {
        $plans = HolidayPlan::all();
        return response()->json($plans);
    }

    public function show($id)
    {
        $plan = HolidayPlan::find($id);
        if (!$plan) {
            return response()->json(['message' => 'Holiday Plan not found'], 404);
        }
        return response()->json($plan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $plan = HolidayPlan::create($request->all());
        return response()->json($plan, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date',
        ]);

        $plan = HolidayPlan::find($id);
        if (!$plan) {
            return response()->json(['message' => 'Holiday Plan not found'], 404);
        }

        $plan->update($request->all());
        return response()->json($plan);
    }

    public function destroy($id)
    {
        $plan = HolidayPlan::find($id);
        if (!$plan) {
            return response()->json(['message' => 'Holiday Plan not found'], 404);
        }

        $plan->delete();
        return response()->json(['message' => 'Holiday Plan deleted']);
    }

    public function generatePdf($id)
    {
        $plan = HolidayPlan::find($id);
        if (!$plan) {
            return response()->json(['message' => 'Holiday Plan not found'], 404);
        }

        $pdf = PDF::loadView('pdf.holiday_plan', ['plan' => $plan]);
        return $pdf->download('holiday_plan_' . $id . '.pdf');
    }
}

