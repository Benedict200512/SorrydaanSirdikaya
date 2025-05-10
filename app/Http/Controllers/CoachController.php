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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:coaches'],
            'specialization' => ['nullable', 'string', 'max:255'],
        ]);

        $coach = Coach::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'specialization' => $request->specialization,
        ]);

        return response()->json(['message' => 'Coach added successfully', 'coach' => $coach]);
    }

    public function editCoach(Request $request, $id)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:coaches,email,' . $id],
            'specialization' => ['nullable', 'string', 'max:255'],
        ]);

        $coach = Coach::find($id);

        if (!$coach) {
            return response()->json(['message' => 'Coach not found'], 404);
        }

        $coach->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
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
