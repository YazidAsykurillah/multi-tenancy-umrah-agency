<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $teams = config('permission.teams');

        if (!$teams) {
            return;
        }

        $teamKey = $columnNames['team_foreign_key'] ?? 'team_id';

        Schema::table($tableNames['roles'], function (Blueprint $table) use ($teamKey) {
            if (!Schema::hasColumn($table->getTable(), $teamKey)) {
                $table->unsignedBigInteger($teamKey)->nullable()->after('id');
                $table->index($teamKey);
            }
            
            // Try to drop the old unique index safely
            try {
                $table->dropUnique(['name', 'guard_name']);
            } catch (\Exception $e) {}
            
            // Add new unique index including team_id
            $table->unique([$teamKey, 'name', 'guard_name']);
        });

        Schema::table($tableNames['model_has_permissions'], function (Blueprint $table) use ($teamKey, $columnNames) {
            if (!Schema::hasColumn($table->getTable(), $teamKey)) {
                $table->unsignedBigInteger($teamKey)->nullable();
                $table->index($teamKey);
            }
            
            try {
                $table->dropPrimary(['permission_id', $columnNames['model_morph_key'], 'model_type']);
            } catch (\Exception $e) {}
            
            $table->primary([$teamKey, 'permission_id', $columnNames['model_morph_key'], 'model_type'], 'model_has_permissions_permission_model_type_primary');
        });

        Schema::table($tableNames['model_has_roles'], function (Blueprint $table) use ($teamKey, $columnNames) {
            if (!Schema::hasColumn($table->getTable(), $teamKey)) {
                $table->unsignedBigInteger($teamKey)->nullable();
                $table->index($teamKey);
            }
            
            try {
                $table->dropPrimary(['role_id', $columnNames['model_morph_key'], 'model_type']);
            } catch (\Exception $e) {}
            
            $table->primary([$teamKey, 'role_id', $columnNames['model_morph_key'], 'model_type'], 'model_has_roles_role_model_type_primary');
        });
    }

    public function down(): void
    {
        // ... (can be empty for now since we are in fast dev)
    }
};
