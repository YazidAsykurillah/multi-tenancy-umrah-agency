<?php

use App\Models\User;
use Spatie\Permission\Models\Role;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$email = 'superadmin@example.com';
$user = User::where('email', $email)->first();

if (!$user) {
    echo "User $email not found\n";
    exit;
}

echo "User: {$user->name} ({$user->email})\n";

setPermissionsTeamId(null);
echo "Global Roles (team_id=null): " . $user->roles()->pluck('name')->implode(', ') . "\n";
echo "Has 'Super Admin' role globally? " . ($user->hasRole('Super Admin') ? 'YES' : 'NO') . "\n";

$tenants = $user->tenants;
foreach ($tenants as $tenant) {
    setPermissionsTeamId($tenant->id);
    echo "Roles in Tenant {$tenant->name} (id={$tenant->id}): " . $user->roles()->pluck('name')->implode(', ') . "\n";
}
