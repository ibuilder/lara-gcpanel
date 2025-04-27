<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;

// Settings Controllers
use App\Http\Controllers\Settings\CompanyController;
use App\Http\Controllers\Settings\DatabaseController;
use App\Http\Controllers\Settings\ProjectInfoController;
use App\Http\Controllers\Settings\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\RoleController;

// Report Controller
use App\Http\Controllers\ReportController;

// --- Add Module Controller Placeholders ---
// Preconstruction
use App\Http\Controllers\Modules\Preconstruction\QualifiedBidderController;
use App\Http\Controllers\Modules\Preconstruction\BidPackageController;
use App\Http\Controllers\Modules\Preconstruction\BidManualController;
// Engineering
use App\Http\Controllers\Modules\Engineering\RfiController;
use App\Http\Controllers\Modules\Engineering\SubmittalController;
use App\Http\Controllers\Modules\Engineering\DrawingController;
use App\Http\Controllers\Modules\Engineering\SpecificationController;
use App\Http\Controllers\Modules\Engineering\FileExplorerController;
use App\Http\Controllers\Modules\Engineering\PermittingController;
use App\Http\Controllers\Modules\Engineering\MeetingAgendaController;
use App\Http\Controllers\Modules\Engineering\TransmittalController;
// Field
use App\Http\Controllers\Modules\Field\DailyReportController;
use App\Http\Controllers\Modules\Field\PhotoLibraryController;
use App\Http\Controllers\Modules\Field\ScheduleController;
use App\Http\Controllers\Modules\Field\ChecklistController;
use App\Http\Controllers\Modules\Field\PunchlistController;
use App\Http\Controllers\Modules\Field\ManpowerLogController;
use App\Http\Controllers\Modules\Field\DailyLogController;
use App\Http\Controllers\Modules\Field\PullPlanningController;
// Safety
use App\Http\Controllers\Modules\Safety\ObservationController;
use App\Http\Controllers\Modules\Procurement\PurchaseOrderController;
use App\Http\Controllers\Modules\Safety\PtpController; // PreTask Plan
use App\Http\Controllers\Modules\Safety\JhaController; // Job Hazard Analysis
use App\Http\Controllers\Modules\Safety\EmployeeOrientationController;
// Contracts
use App\Http\Controllers\Modules\Contracts\PrimeContractController;
use App\Http\Controllers\Modules\Contracts\SubcontractController;
use App\Http\Controllers\Modules\Contracts\ProfessionalServiceAgreementController;
use App\Http\Controllers\Modules\Contracts\LienWaiverController;
use App\Http\Controllers\Modules\Contracts\CertificateOfInsuranceController;
use App\Http\Controllers\Modules\Contracts\LetterOfIntentController;
// Cost
use App\Http\Controllers\Modules\Cost\BudgetForecastController;
use App\Http\Controllers\Modules\Cost\InvoicingController;
use App\Http\Controllers\Modules\Cost\DirectCostController;
use App\Http\Controllers\Modules\Cost\PotentialChangeController;
use App\Http\Controllers\Modules\Cost\ChangeOrderController;
use App\Http\Controllers\Modules\Cost\ApprovalLetterController;
use App\Http\Controllers\Modules\Cost\TimeMaterialTicketController;
// BIM
use App\Http\Controllers\Modules\BIM\ModelController as BimModelController; // Alias to avoid conflict
use App\Http\Controllers\Modules\BIM\CoordinationIssueController;
// Closeout
use App\Http\Controllers\Modules\Closeout\OmManualController;
use App\Http\Controllers\Modules\Closeout\WarrantyController;
use App\Http\Controllers\Modules\Closeout\AtticStockController;
use App\Http\Controllers\Modules\Closeout\DeficiencyController;
// Resources
use App\Http\Controllers\Modules\Resources\LocationController;
use App\Http\Controllers\Modules\Resources\CsiDivisionController;
use App\Http\Controllers\Modules\Resources\CostCodeController;
use App\Http\Controllers\Modules\Resources\LaborRateController;
use App\Http\Controllers\Modules\Resources\MaterialRateController;
use App\Http\Controllers\Modules\Resources\EquipmentRateController;


use Illuminate\Support\Facades\Route;

// Public route for homepage/landing page (optional)
Route::get('/', function () {
    // If logged in, redirect to dashboard, otherwise show welcome/login
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    // You might want a dedicated landing page controller later
    return view('welcome'); // Or redirect to login
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes (from Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- Module Sections ---
    Route::prefix('modules')->name('modules.')->group(function () {

        //Vendor Management
        Route::resource('vendors', VendorController::class)->middleware('CheckUserRole:admin')->names('vendors');
        
        // Project Management
        Route::resource('projects', ProjectController::class)->middleware('CheckUserRole:admin')->names('projects');

        // Preconstruction
        Route::prefix('preconstruction')->name('preconstruction.')->group(function () {
            Route::get('/', fn() => view('modules.preconstruction.index'))->name('index'); // Section overview
            Route::resource('qualified-bidders', QualifiedBidderController::class)->middleware('CheckUserRole:admin');
            Route::resource('bid-packages', BidPackageController::class)->middleware('CheckUserRole:admin');
            Route::resource('bid-manual', BidManualController::class)->middleware('CheckUserRole:admin');
        });

        // Engineering
        Route::prefix('engineering')->name('engineering.')->group(function () {
            Route::get('/', fn() => view('modules.engineering.index'))->name('index');
            Route::resource('rfis', RfiController::class)->middleware('CheckUserRole:admin');
            Route::resource('submittals', SubmittalController::class)->middleware('CheckUserRole:admin');
            Route::resource('drawings', DrawingController::class)->names('drawings');
            Route::resource('specifications', SpecificationController::class)->names('specifications');
            Route::resource('file-explorer', FileExplorerController::class)->names('file_explorer'); // Consider if resource is right fit
            Route::resource('permitting', PermittingController::class)->names('permitting');
            Route::resource('meeting-agenda', MeetingAgendaController::class)->names('meeting_agenda');
            Route::resource('transmittals', TransmittalController::class)->names('transmittals');
        });
        
        // Procurement
        Route::prefix('procurement')->name('procurement.')->group(function () {
            Route::get('/', fn() => view('modules.procurement.index'))->name('index');
            Route::resource('contracts', ContractController::class)->middleware('CheckUserRole:admin');
            Route::resource('purchase-orders', PurchaseOrderController::class)->middleware('CheckUserRole:admin');
        });

        // Field
        Route::prefix('field')->name('field.')->group(function () {
            Route::get('/', fn() => view('modules.field.index'))->name('index');
            Route::resource('daily-logs', DailyLogController::class)->middleware('CheckUserRole:admin');
            Route::resource('manpower-logs', ManpowerLogController::class)->middleware('CheckUserRole:admin');
            Route::resource('daily-reports', DailyReportController::class)->names('daily_reports'); // will be removed in future
            Route::resource('photo-library', PhotoLibraryController::class)->names('photo_library');
            Route::resource('schedule', ScheduleController::class)->names('schedule');
            Route::resource('checklists', ChecklistController::class)->names('checklists');
            Route::resource('punchlist', PunchlistController::class)->middleware('CheckUserRole:admin');
            Route::resource('pull-planning', PullPlanningController::class)->names('pull_planning');
        });

        // Safety
        Route::prefix('safety')->name('safety.')->group(function () {
            Route::get('/', fn() => view('modules.safety.index'))->name('index');
            Route::resource('observations', ObservationController::class)->middleware('CheckUserRole:admin');
            Route::resource('ptps', PtpController::class)->names('ptps');
            Route::resource('jhas', JhaController::class)->names('jhas');
            Route::resource('employee-orientations', EmployeeOrientationController::class)->names('employee_orientations');
        });

        // Contracts
        Route::prefix('contracts')->name('contracts.')->group(function () {
            Route::get('/', fn() => view('modules.contracts.index'))->name('index');
            Route::resource('prime-contract', PrimeContractController::class)->names('prime_contract');
            Route::resource('subcontracts', SubcontractController::class)->names('subcontracts');
            Route::resource('professional-service-agreements', ProfessionalServiceAgreementController::class)->names('professional_service_agreements');
            Route::resource('lien-waivers', LienWaiverController::class)->names('lien_waivers');
            Route::resource('certificates-of-insurance', CertificateOfInsuranceController::class)->names('certificates_of_insurance');
            Route::resource('letters-of-intent', LetterOfIntentController::class)->names('letters_of_intent');
        });

        // Cost
        Route::prefix('cost')->name('cost.')->group(function () {
            Route::get('/', fn() => view('modules.cost.index'))->name('index');
            Route::resource('budget-forecast', BudgetForecastController::class)->names('budget_forecast');
            Route::resource('invoicing', InvoicingController::class)->names('invoicing');
            Route::resource('direct-costs', DirectCostController::class)->names('direct_costs');
            Route::resource('potential-changes', PotentialChangeController::class)->names('potential_changes');
            Route::resource('change-orders', ChangeOrderController::class)->middleware('CheckUserRole:admin');
            Route::resource('approval-letters', ApprovalLetterController::class)->names('approval_letters');
            Route::resource('time-materials-tickets', TimeMaterialTicketController::class)->names('time_materials_tickets');
        });

        // BIM
        Route::prefix('bim')->name('bim.')->group(function () {
            Route::get('/', fn() => view('modules.bim.index'))->name('index');
            Route::resource('model', BimModelController::class)->names('model');
            Route::resource('coordination-issues', CoordinationIssueController::class)->names('coordination_issues');
        });

        // Closeout
        Route::prefix('closeout')->name('closeout.')->group(function () {
            Route::get('/', fn() => view('modules.closeout.index'))->name('index');
            Route::resource('om-manuals', OmManualController::class)->names('om_manuals');
            Route::resource('warranties', WarrantyController::class)->names('warranties');
            Route::resource('attic-stock', AtticStockController::class)->names('attic_stock');
            Route::resource('deficiencies', DeficiencyController::class)->middleware('CheckUserRole:admin');
        });

         // Resources
         Route::prefix('resources')->name('resources.')->group(function () {
            Route::get('/', fn() => view('modules.resources.index'))->name('index');
            Route::resource('locations', LocationController::class)->names('locations');
            Route::resource('csi-divisions', CsiDivisionController::class)->names('csi_divisions');
            Route::resource('cost-codes', CostCodeController::class)->names('cost_codes');
            Route::resource('labor-rates', LaborRateController::class)->names('labor_rates');
            Route::resource('material-rates', MaterialRateController::class)->names('material_rates');
            Route::resource('equipment-rates', EquipmentRateController::class)->names('equipment_rates');
        });

    }); // End Modules Prefix

    // Settings Section (Requires 'administrator' role)
    Route::middleware(['CheckUserRole:admin']) // Apply middleware here
          ->prefix('settings')->name('settings.')
          ->group(function () {
                Route::get('/', [ProjectInfoController::class, 'index'])->name('index'); // Default settings page
                Route::resource('companies', App\Http\Controllers\CompanyController::class)->names('companies');
                Route::resource('roles', RoleController::class)->names('roles');
                Route::resource('project-info', ProjectInfoController::class)->only(['index', 'store', 'update'])->names('project_info');
                Route::resource('user-management', App\Http\Controllers\Settings\UserController::class)->names('user_management');
                Route::get('database', [DatabaseController::class, 'index'])->name('database.index');
                Route::post('database/test', [DatabaseController::class, 'testConnection'])->name('database.test');
          });

    // Reports Section (Example: Allow administrators and editors)
    Route::middleware(['role:administrator,editor']) // Example: Multiple roles
          ->prefix('reports')->name('reports.')
          ->group(function () {
                Route::get('/', [ReportController::class, 'index'])->name('index');
                // Add export routes here later, potentially with same middleware
          });

}); // End Auth Middleware Group

// Include Breeze's auth routes
require __DIR__.'/auth.php';