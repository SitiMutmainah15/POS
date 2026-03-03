<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\UserModel;

class LevelModel extends Model
{
    protected $table = 'm_level';
    protected $primaryKey = 'level_id';
    protected $fillable = ['nama_level'];

    public function user(): hasMany
    {
        return $this->hasMany(UserModel::class, 'level_id', 'level_id');
    }
}