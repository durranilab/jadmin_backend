<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function createCustomer(Request $request): JsonResponse
    {

        $validation = validator($request->all(), [
            'name' => 'required|unique:customers,name',
            'email' => 'required|email',
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $customer = Customer::create($request->all());
        return response()->json($customer, 201);
    }

    public function updateCustomer(Request $request): JsonResponse
    {

        $validation = validator($request->all(), [
//            'name' => 'required|unique:customers,name',
//            'email' => 'required|email',
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $customer = Customer::find($request->id);
        $customer->update($request->all());
        return response()->json($customer, 200);
    }

    public function deleteCustomer(Request $request): JsonResponse
    {
        $customer = Customer::find($request->id);
        $customer->delete();
        return response()->json(null, 204);
    }

    public function getCustomer(Request $request): JsonResponse
    {
        $customer = Customer::find($request->id);
        return response()->json($customer, 200);
    }

    public function getCustomers(Request $request): JsonResponse
    {
        $customers = Customer::all();
        return response()->json($customers, 200);
    }
}
