<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;

class MembershipController extends Controller
{
    public function getAll()
    {
        $memberships = Membership::all();
        return response()->json($memberships);
    }

    public function getById($id)
    {
        $membership = Membership::find($id);
        if (!$membership) {
            return response()->json(['message' => 'Membership not found'], 404);
        }
        return response()->json($membership);
    }

    public function create(Request $request)
    {
        $request->validate([
            'membership_status' => 'required|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric|min:0',
        ]);

        $membership = Membership::create($request->all());

        return response()->json([
            'message' => 'Membership created successfully',
            'membership' => $membership,
        ]);
    }

    public function update(Request $request, $id)
    {
        $membership = Membership::find($id);
        if (!$membership) {
            return response()->json(['message' => 'Membership not found'], 404);
        }

        $request->validate([
            'membership_status' => 'required|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric|min:0',
        ]);

        $membership->update($request->all());

        return response()->json([
            'message' => 'Membership updated successfully',
            'membership' => $membership,
        ]);
    }

    public function delete($id)
    {
        $membership = Membership::find($id);
        if (!$membership) {
            return response()->json(['message' => 'Membership not found'], 404);
        }

        $membership->delete();

        return response()->json(['message' => 'Membership deleted successfully']);
    }
}
