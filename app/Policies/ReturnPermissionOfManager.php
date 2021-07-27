<?php


namespace App\Policies;


use App\Models\Permission;
use App\Models\PosInclude;

class ReturnPermissionOfManager
{
    public static function retunPer(int $Permission)
    {
        if (auth()->check()) {
            $Per = PosInclude::all()->where('pos_id', '=', auth()->user()->pos_id)
                ->where('per_id', '=', $Permission)->first();
            if ($Per != null) {
                $Per = $Per->per_id;
            } else {
                $Per = 0;
            }
        }

        return $Per;
    }
}
