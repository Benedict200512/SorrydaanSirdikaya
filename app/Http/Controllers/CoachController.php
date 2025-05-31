<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;

class CoachController extends Controller
{
    public function getCoaches()
    {
        $coaches = Coach::all();
        return response()->json(['coaches' => $coaches]);
    }

    public function addCoach(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:coaches'],
            'phonenumber' => ['nullable', 'string', 'max:20'],
            'specialization' => ['nullable', 'string', 'max:255'],
            
        ]);

        $coach = Coach::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'specialization' => $request->specialization,
        ]);

        return response()->json(['message' => 'Coach added successfully', 'coach' => $coach]);
    }

    public function editCoach(Request $request, $id)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:coaches,email,' . $id],
            'phonenumber' => ['nullable', 'string', 'max:20'],
            'specialization' => ['nullable', 'string', 'max:255'],
        ]);

        $coach = Coach::find($id);

        if (!$coach) {
            return response()->json(['message' => 'Coach not found'], 404);
        }

        $coach->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'specialization' => $request->specialization,
        ]);

        return response()->json(['message' => 'Coach updated successfully', 'coach' => $coach]);
    }

    public function deleteCoach($id)
    {
        $coach = Coach::find($id);

        if (!$coach) {
            return response()->json(['message' => 'Coach not found'], 404);
        }

        $coach->delete();

        return response()->json(['message' => 'Coach deleted successfully']);
    }
}
