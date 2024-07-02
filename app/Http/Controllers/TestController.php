<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        return Test::all();
    }

    public function create(Request $request)
    {
        Test::create($request->all());
        return response()->json('ok');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $test = Test::find($id);
        $test->update($request->all());
        return response()->json('ok');
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $test = Test::find($id);
        $test->delete();
        return response()->json('ok');
    }
}
