<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class family extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_parent', 'name' ,'jenis_kelamin'
    ];

    /**
     * Get the user that owns the family
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(family::class, 'id_parent');
    }

    public function child()
    {
        return $this->hasMany(family::class, 'id_parent');
    }
}
