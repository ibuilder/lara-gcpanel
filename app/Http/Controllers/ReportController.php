<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View; // Add View

class ReportController extends Controller
{
    /**
     * Display the main reports page.
     * This page might list available reports.
     */
    public function index(): View
    {
        // You might fetch a list of available report definitions here later
        $availableReports = [
            // Example structure:
            // ['name' => 'Cost Summary', 'route' => 'reports.cost_summary', 'description' => 'Summary of project costs.'],
            // ['name' => 'RFI Log', 'route' => 'reports.rfi_log', 'description' => 'Log of all Requests for Information.'],
        ];

        return view('reports.index', compact('availableReports'));
    }

    // Add methods for specific reports later, e.g.:
    // public function costSummary() { /* ... */ }
    // public function rfiLog() { /* ... */ }
    // public function exportRfiLogPdf() { /* ... */ }
}