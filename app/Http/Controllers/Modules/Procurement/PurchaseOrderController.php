<?php

namespace App\Http\Controllers\Modules\Procurement;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        return view('modules.procurement.purchase_orders.index');
    }

    public function create()
    {
        $projects = Project::all();
        return view('modules.procurement.purchase_orders.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'vendor' => 'required',
            'description' => 'required',
            'amount' => 'required|integer',
            'issue_date' => 'required|date',
        ]);

        PurchaseOrder::create($validatedData);
    }

    public function edit($id)
    {
        $projects = Project::all();
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        return view('modules.procurement.purchase_orders.edit', compact('purchaseOrder', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'vendor' => 'required',
            'description' => 'required',
            'amount' => 'required|integer',
            'issue_date' => 'required|date',
        ]);

        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $purchaseOrder->update($validatedData);
    }

    public function update(Request $request, $id)
    {
        // Validate and update the purchase order
    }

    public function destroy($id)
    {
        // Delete the purchase order
    }
}