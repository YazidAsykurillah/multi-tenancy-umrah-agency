<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TenantRoleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($tenant = Filament::getTenant()) {
            setPermissionsTeamId($tenant->id);
        }

        return $next($request);
    }
}
