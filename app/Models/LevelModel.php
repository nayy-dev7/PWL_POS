<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    public function users(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }
}
