<?php
// filepath: app/Providers/AuthServiceProvider.php

namespace App\Providers;

use App\Models\BidManual;
use App\Models\BidPackage;
use App\Models\ChangeOrder;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Contract;
use App\Models\CostCode;
use App\Models\DailyLog;
use App\Models\Deficiency;
use App\Models\ManpowerLog;
use App\Models\Observation;
use App\Models\Project;
use App\Models\ProjectInfo;
use App\Models\PunchList;
use App\Models\PurchaseOrder;
use App\Models\QualifiedBidder;
use App\Models\Rfi;
use App\Models\Role;
use App\Models\Submittal;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Modules\BIM;
use App\Models\Modules\Closeout;
use App\Models\Modules\Contracts;
use App\Models\Modules\Cost;
use App\Models\Modules\Engineering;
use App\Models\Modules\Field;
use App\Models\Modules\Preconstruction;
use App\Models\Modules\Resources;
use App\Models\Modules\Safety;
use App\Models\Modules\BIM\BIMModel;
use App\Models\Modules\BIM\CoordinationIssue;
use App\Models\Modules\Closeout\AtticStock;
use App\Models\Modules\Closeout\O&MManual;
use App\Models\Modules\Closeout\Warranty;
use App\Models\Modules\Contracts\COI;
use App\Models\Modules\Contracts\LOI;
use App\Models\Modules\Contracts\LienWaiver;
use App\Models\Modules\Contracts\PSA;
use App\Models\Modules\Contracts\PrimeContract;
use App\Models\Modules\Contracts\Subcontract;
use App\Models\Modules\Cost\ApprovalDirective;
use App\Models\Modules\Cost\BudgetForecast;
use App\Models\Modules\Cost\ChangeOrder as CostChangeOrder;
use App\Models\Modules\Cost\DirectCost;
use App\Models\Modules\Cost\Invoicing;
use App\Models\Modules\Cost\PotentialChange;
use App\Models\Modules\Cost\TMMTicket;
use App\Models\Modules\Engineering\Drawing;
use App\Models\Modules\Engineering\FileExplorer;
use App\Models\Modules\Engineering\MeetingAgendaMinutes;
use App\Models\Modules\Engineering\Permitting;
use App\Models\Modules\Engineering\RFI;
use App\Models\Modules\Engineering\Specification;
use App\Models\Modules\Engineering\Submittal as EngSubmittal;
use App\Models\Modules\Engineering\Transmittal;
use App\Models\Modules\Field\Checklist;
use App\Models\Modules\Field\DailyReport;
use App\Models\Modules\Field\PhotoLibrary;
use App\Models\Modules\Field\Punchlist as FieldPunchlist;
use App\Models\Modules\Field\Schedule;
use App\Models\Modules\Preconstruction\BidManual as PreBidManual;
use App\Models\Modules\Preconstruction\BidPackage as PreBidPackage;
use App\Models\Modules\Preconstruction\QualifiedBidder as PreQualifiedBidder;
use App\Models\Modules\Resources\CSIDivision;
use App\Models\Modules\Resources\CostCode as ResCostCode;
use App\Models\Modules\Resources\EquipmentRate;
use App\Models\Modules\Resources\LaborRate;
use App\Models\Modules\Resources\Location;
use App\Models\Modules\Resources\MaterialRate;
use App\Models\Modules\Safety\EmployeeOrientation;
use App\Models\Modules\Safety\JHA;
use App\Models\Modules\Safety\Observation as SafetyObservation;
use App\Models\Modules\Safety\PTP;
use App\Policies\Modules\BIM\BIMModelPolicy;
use App\Policies\Modules\BIM\CoordinationIssuePolicy;
use App\Policies\Modules\Closeout\AtticStockPolicy;
use App\Policies\Modules\Closeout\O&MManualPolicy;
use App\Policies\Modules\Closeout\WarrantyPolicy;
use App\Policies\Modules\Contracts\COIPolicy;
use App\Policies\Modules\Contracts\LOIPolicy;
use App\Policies\Modules\Contracts\LienWaiverPolicy;
use App\Policies\Modules\Contracts\PSAPolicy;
use App\Policies\Modules\Contracts\PrimeContractPolicy;
use App\Policies\Modules\Contracts\SubcontractPolicy;
use App\Policies\Modules\Cost\ApprovalDirectivePolicy;
use App\Policies\Modules\Cost\BudgetForecastPolicy;
use App\Policies\Modules\Cost\ChangeOrderPolicy as CostChangeOrderPolicy;
use App\Policies\Modules\Cost\DirectCostPolicy;
use App\Policies\Modules\Cost\InvoicingPolicy;
use App\Policies\Modules\Cost\PotentialChangePolicy;
use App\Policies\Modules\Cost\TMMTicketPolicy;
use App\Policies\Modules\Engineering\DrawingPolicy;
use App\Policies\Modules\Engineering\FileExplorerPolicy;
use App\Policies\Modules\Engineering\MeetingAgendaMinutesPolicy;
use App\Policies\Modules\Engineering\PermittingPolicy;
use App\Policies\Modules\Engineering\RFIPolicy;
use App\Policies\Modules\Engineering\SpecificationPolicy;
use App\Policies\Modules\Engineering\SubmittalPolicy as EngSubmittalPolicy;
use App\Policies\Modules\Engineering\TransmittalPolicy;
use App\Policies\Modules\Field\ChecklistPolicy;
use App\Policies\Modules\Field\DailyReportPolicy;
use App\Policies\Modules\Field\PhotoLibraryPolicy;
use App\Policies\Modules\Field\PunchlistPolicy as FieldPunchlistPolicy;
use App\Policies\Modules\Field\SchedulePolicy;
use App\Policies\Modules\Preconstruction\BidManualPolicy as PreBidManualPolicy;
use App\Policies\Modules\Preconstruction\BidPackagePolicy as PreBidPackagePolicy;
use App\Policies\Modules\Preconstruction\QualifiedBidderPolicy as PreQualifiedBidderPolicy;
use App\Policies\Modules\Resources\CSIDivisionPolicy;
use App\Policies\Modules\Resources\CostCodePolicy as ResCostCodePolicy;
use App\Policies\Modules\Resources\EquipmentRatePolicy;
use App\Policies\Modules\Resources\LaborRatePolicy;
use App\Policies\Modules\Resources\LocationPolicy;
use App\Policies\Modules\Resources\MaterialRatePolicy;
use App\Policies\Modules\Safety\EmployeeOrientationPolicy;
use App\Policies\Modules\Safety\JHAPolicy;
use App\Policies\Modules\Safety\ObservationPolicy as SafetyObservationPolicy;
use App\Policies\Modules\Safety\PTPPolicy;
use App\Policies\Modules\SafetyPolicy;
use App\Policies\Modules\ResourcesPolicy;
use App\Policies\Modules\PreconstructionPolicy;
use App\Policies\Modules\FieldPolicy;
use App\Policies\Modules\EngineeringPolicy;
use App\Policies\Modules\CostPolicy;
use App\Policies\Modules\ContractsPolicy;
use App\Policies\Modules\CloseoutPolicy;
use App\Policies\Modules\BIMPolicy;
use App\Policies\VendorPolicy;
use App\Policies\UserPolicy;
use App\Policies\SubmittalPolicy;
use App\Policies\RolePolicy;
use App\Policies\RfiPolicy;
use App\Policies\QualifiedBidderPolicy;
use App\Policies\PurchaseOrderPolicy;
use App\Policies\PunchListPolicy;
use App\Policies\ProjectInfoPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\ObservationPolicy;
use App\Policies\ManpowerLogPolicy;
use App\Policies\DeficiencyPolicy;
use App\Policies\DailyLogPolicy;
use App\Policies\CostCodePolicy;
use App\Policies\ContractPolicy;
use App\Policies\CompanyPolicy;
use App\Policies\CommentPolicy;
use App\Policies\ChangeOrderPolicy;
use App\Policies\BidPackagePolicy;
use App\Policies\BidManualPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Deficiency::class => DeficiencyPolicy::class, // Add this line
        BidManual::class => BidManualPolicy::class,
        BidPackage::class => BidPackagePolicy::class,
        ChangeOrder::class => ChangeOrderPolicy::class,
        Comment::class => CommentPolicy::class,
        Company::class => CompanyPolicy::class,
        Contract::class => ContractPolicy::class,
        CostCode::class => CostCodePolicy::class,
        DailyLog::class => DailyLogPolicy::class,
        ManpowerLog::class => ManpowerLogPolicy::class,
        Observation::class => ObservationPolicy::class,
        Project::class => ProjectPolicy::class,
        ProjectInfo::class => ProjectInfoPolicy::class,
        PunchList::class => PunchListPolicy::class,
        PurchaseOrder::class => PurchaseOrderPolicy::class,
        QualifiedBidder::class => QualifiedBidderPolicy::class,
        Rfi::class => RfiPolicy::class,
        Role::class => RolePolicy::class,
        Submittal::class => SubmittalPolicy::class,
        User::class => UserPolicy::class,
        Vendor::class => VendorPolicy::class,
        BIM::class => BIMPolicy::class,
        Closeout::class => CloseoutPolicy::class,
        Contracts::class => ContractsPolicy::class,
        Cost::class => CostPolicy::class,
        Engineering::class => EngineeringPolicy::class,
        Field::class => FieldPolicy::class,
        Preconstruction::class => PreconstructionPolicy::class,
        Resources::class => ResourcesPolicy::class,
        Safety::class => SafetyPolicy::class,
        BIMModel::class => BIMModelPolicy::class,
        CoordinationIssue::class => CoordinationIssuePolicy::class,
        AtticStock::class => AtticStockPolicy::class,
        O&MManual::class => O&MManualPolicy::class,
        Warranty::class => WarrantyPolicy::class,
        COI::class => COIPolicy::class,
        LOI::class => LOIPolicy::class,
        LienWaiver::class => LienWaiverPolicy::class,
        PSA::class => PSAPolicy::class,
        PrimeContract::class => PrimeContractPolicy::class,
        Subcontract::class => SubcontractPolicy::class,
        ApprovalDirective::class => ApprovalDirectivePolicy::class,
        BudgetForecast::class => BudgetForecastPolicy::class,
        CostChangeOrder::class => CostChangeOrderPolicy::class,
        DirectCost::class => DirectCostPolicy::class,
        Invoicing::class => InvoicingPolicy::class,
        PotentialChange::class => PotentialChangePolicy::class,
        TMMTicket::class => TMMTicketPolicy::class,
        Drawing::class => DrawingPolicy::class,
        FileExplorer::class => FileExplorerPolicy::class,
        MeetingAgendaMinutes::class => MeetingAgendaMinutesPolicy::class,
        Permitting::class => PermittingPolicy::class,
        RFI::class => RFIPolicy::class,
        Specification::class => SpecificationPolicy::class,
        EngSubmittal::class => EngSubmittalPolicy::class,
        Transmittal::class => TransmittalPolicy::class,
        Checklist::class => ChecklistPolicy::class,
        DailyReport::class => DailyReportPolicy::class,
        PhotoLibrary::class => PhotoLibraryPolicy::class,
        FieldPunchlist::class => FieldPunchlistPolicy::class,
        Schedule::class => SchedulePolicy::class,
        PreBidManual::class => PreBidManualPolicy::class,
        PreBidPackage::class => PreBidPackagePolicy::class,
        PreQualifiedBidder::class => PreQualifiedBidderPolicy::class,
        CSIDivision::class => CSIDivisionPolicy::class,
        ResCostCode::class => ResCostCodePolicy::class,
        EquipmentRate::class => EquipmentRatePolicy::class,
        LaborRate::class => LaborRatePolicy::class,
        Location::class => LocationPolicy::class,
        MaterialRate::class => MaterialRatePolicy::class,
        EmployeeOrientation::class => EmployeeOrientationPolicy::class,
        JHA::class => JHAPolicy::class,
        SafetyObservation::class => SafetyObservationPolicy::class,
        PTP::class => PTPPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}