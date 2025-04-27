<?php
// filepath: app/Providers/AuthServiceProvider.php
namespace App\Providers;

use App\Models\Deficiency; // Add this
use App\Policies\DeficiencyPolicy; // Add this
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// ... other use statements

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