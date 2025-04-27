<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Keep if needed for stats
use App\Models\Comment;
use App\Services\SupabaseAuthService;
use App\Services\PdfExportService; // Import the PDF service
use Illuminate\Support\Facades\Auth; // Use Facade for auth user
use Illuminate\View\View; // Add View type hint
use Illuminate\Http\JsonResponse; // Add JsonResponse type hint

class DashboardController extends Controller
{
    protected $supabaseAuthService;
    protected $pdfExportService; // Add PDF service property

    // Inject both services
    public function __construct(SupabaseAuthService $supabaseAuthService, PdfExportService $pdfExportService)
    {
        $this->supabaseAuthService = $supabaseAuthService;
        $this->pdfExportService = $pdfExportService; // Assign PDF service
    }

    /**
     * Show the application dashboard.
     */
    public function index(): View
    {
        $user = Auth::user(); // Use Auth facade
        // Eager load comments to avoid N+1 problem if displaying them
        $comments = Comment::where('user_id', $user->id)->latest()->limit(10)->get(); // Example: Get latest 10

        // You might want other general dashboard data here later
        $stats = $this->getStatsData(); // Get stats data internally

        return view('dashboard', compact('user', 'comments', 'stats'));
    }

    /**
     * Get statistics data (internal helper or could be separate service).
     */
    protected function getStatsData(): array
    {
         $user = Auth::user();
         if (!$user) {
             return []; // Or handle appropriately
         }
         // Fetch user-specific statistics from the database
         // This can include counts of records created, updated, etc. across modules
         return [
             'total_comments' => $user->comments()->count(),
             // Add more statistics as needed (e.g., RFI count, Submittal count)
             'rfi_count' => 0, // Placeholder
             'submittal_count' => 0, // Placeholder
         ];
    }


    /**
     * Provide statistics data via API endpoint.
     */
    public function getUserStatistics(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $this->getStatsData() // Reuse internal method
        ]);
    }

    /**
     * Handle request to export dashboard data to PDF.
     * Note: This might be better as a direct download route, not just JSON.
     */
    public function exportToPDF() // Consider Request $request if needing parameters
    {
        $user = Auth::user();
        $comments = Comment::where('user_id', $user->id)->latest()->get();
        $stats = $this->getStatsData();

        $data = [
            'user' => $user,
            'comments' => $comments,
            'stats' => $stats,
            'exportDate' => now()->format('Y-m-d H:i:s')
        ];

        // Define a view specifically for the PDF content
        $pdfView = 'pdf.dashboard'; // e.g., resources/views/pdf/dashboard.blade.php
        $filename = 'dashboard_export_' . date('YmdHis') . '.pdf';

        try {
            // This service method should ideally return a response (e.g., download response)
            // For now, it returns JSON based on the placeholder service
             return $this->pdfExportService->generateFromView($pdfView, $data, $filename);

            // If using laravel-dompdf directly and want download:
            // $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView($pdfView, $data);
            // return $pdf->download($filename);

        } catch (\Exception $e) {
            \Log::error('PDF Export Failed: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to generate PDF.'
            ], 500);
        }
    }
}