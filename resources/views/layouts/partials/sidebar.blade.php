<aside class="w-64 bg-gray-800 text-white p-4 hidden md:block"> <!-- Adjust styling as needed -->
    <h2 class="text-lg font-semibold mb-4">Navigation</h2>
    <nav>
        <ul>
            <li class="mb-2"><a href="{{ route('dashboard') }}" class="hover:text-gray-300 {{ request()->routeIs('dashboard') ? 'text-white font-semibold' : '' }}">Dashboard</a></li>

            <!-- Module Sections will go here (Add similar active state logic) -->
            <li class="mt-4 mb-2 font-semibold">Modules</li>
             <li><a href="{{ route('modules.preconstruction.index') }}" class="hover:text-gray-300 {{ request()->routeIs('modules.preconstruction.*') ? 'text-white font-semibold' : '' }}">Preconstruction</a></li>
             <li><a href="{{ route('modules.engineering.index') }}" class="hover:text-gray-300 {{ request()->routeIs('modules.engineering.*') ? 'text-white font-semibold' : '' }}">Engineering</a></li>
             <li><a href="{{ route('modules.field.index') }}" class="hover:text-gray-300 {{ request()->routeIs('modules.field.*') ? 'text-white font-semibold' : '' }}">Field</a></li>
             <li><a href="{{ route('modules.safety.index') }}" class="hover:text-gray-300 {{ request()->routeIs('modules.safety.*') ? 'text-white font-semibold' : '' }}">Safety</a></li>
             <li><a href="{{ route('modules.contracts.index') }}" class="hover:text-gray-300 {{ request()->routeIs('modules.contracts.*') ? 'text-white font-semibold' : '' }}">Contracts</a></li>
             <li><a href="{{ route('modules.cost.index') }}" class="hover:text-gray-300 {{ request()->routeIs('modules.cost.*') ? 'text-white font-semibold' : '' }}">Cost</a></li>
             <li><a href="{{ route('modules.bim.index') }}" class="hover:text-gray-300 {{ request()->routeIs('modules.bim.*') ? 'text-white font-semibold' : '' }}">BIM</a></li>
             <li><a href="{{ route('modules.closeout.index') }}" class="hover:text-gray-300 {{ request()->routeIs('modules.closeout.*') ? 'text-white font-semibold' : '' }}">Closeout</a></li>
             <li><a href="{{ route('modules.resources.index') }}" class="hover:text-gray-300 {{ request()->routeIs('modules.resources.*') ? 'text-white font-semibold' : '' }}">Resources</a></li>


            <li class="mt-4 mb-2 font-semibold">Admin</li>
             <li><a href="{{ route('reports.index') }}" class="hover:text-gray-300 {{ request()->routeIs('reports.*') ? 'text-white font-semibold' : '' }}">Reports</a></li>
             <li><a href="{{ route('settings.project_info.index') }}" class="hover:text-gray-300 {{ request()->routeIs('settings.project_info.*') ? 'text-white font-semibold' : '' }}">Project Info</a></li>
             <li><a href="{{ route('settings.company_management.index') }}" class="hover:text-gray-300 {{ request()->routeIs('settings.company_management.*') ? 'text-white font-semibold' : '' }}">Company Management</a></li> {{-- Updated Link --}}
             <li><a href="{{ route('settings.user_management.index') }}" class="hover:text-gray-300 {{ request()->routeIs('settings.user_management.*') ? 'text-white font-semibold' : '' }}">User Management</a></li>
             <li><a href="{{ route('settings.database.index') }}" class="hover:text-gray-300 {{ request()->routeIs('settings.database.*') ? 'text-white font-semibold' : '' }}">Database Settings</a></li>
        </ul>
    </nav>
</aside>