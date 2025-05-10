<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;

class WorkoutController extends Controller
{
    public function getAll()
    {
        $workouts = Workout::all();
        return response()->json($workouts);
    }

    public function getById($id)
    {
        $workout = Workout::find($id);
        if (!$workout) {
            return response()->json(['message' => 'Workout not found'], 404);
        }
        return response()->json($workout);
    }

    public function create(Request $request)
    {
        $request->validate([
            'coach_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        $workout = Workout::create($request->all());

        return response()->json([
            'message' => 'Workout created successfully',
            'workout' => $workout,
        ]);
    }

    public function update(Request $request, $id)
    {
        $workout = Workout::find($id);
        if (!$workout) {
            return response()->json(['message' => 'Workout not found'], 404);
        }

        $request->validate([
            'coach_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'required|integer|min:1',
            'date' => 'required|date',
        ]);

        $workout->update($request->all());

        return response()->json([
            'message' => 'Workout updated successfully',
            'workout' => $workout,
        ]);
    }

    public function delete($id)
    {
        $workout = Workout::find($id);
        if (!$workout) {
            return response()->json(['message' => 'Workout not found'], 404);
        }

        $workout->delete();

        return response()->json(['message' => 'Workout deleted successfully']);
    }
}
