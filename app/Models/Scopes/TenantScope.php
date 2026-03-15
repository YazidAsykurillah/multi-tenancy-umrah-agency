<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Session;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (Session::has('tenant_id')) {
            $builder->where('tenant_id', Session::get('tenant_id'));
        }
    }
}
