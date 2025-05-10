<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function getCustomers()
    {
        $customers = Customer::with('membership', 'coach', 'workout')->get();

        return response()->json(['customers' => $customers]);
    }

    public function addCustomer(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:customers'],
            'gender' => ['required', 'in:male,female,other'],
            'membership_id' => ['required', 'exists:memberships,id'],
            'coach_id' => ['required', 'exists:coaches,id'],
            'workout_id' => ['required', 'exists:workouts,id'],
        ]);

        $customer = Customer::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'gender' => $request->gender,
            'membership_id' => $request->membership_id,
            'coach_id' => $request->coach_id,
            'workout_id' => $request->workout_id,
        ]);

        return response()->json(['message' => 'Customer added successfully', 'customer' => $customer]);
    }

    public function editCustomer(Request $request, $id)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:customers,email,' . $id],
            'gender' => ['required', 'in:male,female,other'],
            'membership_id' => ['required', 'exists:memberships,id'],
            'coach_id' => ['required', 'exists:coaches,id'],
            'workout_id' => ['required', 'exists:workouts,id'],
        ]);

        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $customer->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'gender' => $request->gender,
            'membership_id' => $request->membership_id,
            'coach_id' => $request->coach_id,
            'workout_id' => $request->workout_id,
        ]);

        return response()->json(['message' => 'Customer updated successfully', 'customer' => $customer]);
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
