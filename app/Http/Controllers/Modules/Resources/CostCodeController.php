<?php

namespace App\Http\Controllers\Modules\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CostCodeController extends Controller
{
    public function index()
    {
        // Logic to show a list of cost codes
    }

    public function create()
    {
        // Logic to show the form for creating a new cost code
    }

    public function store(Request $request)
    {
        // Logic to store a new cost code
    }

    public function show($id) // Or use Route Model Binding: CostCode $costCode
    {
        // Logic to show a specific cost code
    }

    public function edit($id) // Or use Route Model Binding: CostCode $costCode
    {
        // Logic to show the form for editing a cost code
    }

    public function update(Request $request, $id) // Or use Route Model Binding: CostCode $costCode
    {
        // Logic to update a specific cost code
    }

    public function destroy($id) // Or use Route Model Binding: CostCode $costCode
    {
        // Logic to delete a specific cost code
    }
}