<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait HasCustomId
{
    public static function bootHasCustomId()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = self::generateModelId(
                    $model->customIdPrefix ?? '',
                    $model->customSequenceName ?? ''
                );
            }
        });
    }

    public static function generateModelId(string $prefix, string $sequenceName): string
    {
        $nextVal = DB::select("SELECT nextval(?) AS val", [$sequenceName])[0]->val;
        return $prefix . str_pad($nextVal, 6, '0', STR_PAD_LEFT);
    }
}
