<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Config; // Import Config facade
use Illuminate\Http\JsonResponse; // For AJAX response

class DatabaseController extends Controller
{
    /**
     * Display the database settings status.
     */
    public function index(): View
    {
        $connection = Config::get('database.default');
        $driver = Config::get("database.connections.{$connection}.driver");
        $host = Config::get("database.connections.{$connection}.host");
        $port = Config::get("database.connections.{$connection}.port");
        $database = Config::get("database.connections.{$connection}.database");
        $username = Config::get("database.connections.{$connection}.username");

        // Attempt to connect to get status
        $connectionStatus = $this->checkConnection();

        return view('settings.database', compact(
            'driver',
            'host',
            'port',
            'database',
            'username',
            'connectionStatus'
        ));
    }

    /**
     * Test the database connection.
     * Can be called via AJAX.
     */
    public function testConnection(): JsonResponse
    {
        $status = $this->checkConnection();

        return response()->json([
            'status' => $status['connected'] ? 'success' : 'error',
            'message' => $status['message'],
        ]);
    }

    /**
     * Helper function to check DB connection.
     */
    private function checkConnection(): array
    {
        try {
            // Use PDO to attempt connection without running queries
            DB::connection()->getPdo();
            return [
                'connected' => true,
                'message' => 'Database connection successful!',
            ];
        } catch (\Exception $e) {
            \Log::error("Database Connection Error: " . $e->getMessage());
            return [
                'connected' => false,
                'message' => 'Could not connect to the database. Please check configuration and logs. Error: ' . $e->getMessage(),
            ];
        }
    }
}