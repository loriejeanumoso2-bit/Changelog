<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    protected $fillable = [
        'version',
        'title',
        'description',
        'released_at',
        'published',
    ];

    protected $casts = [
        'released_at' => 'date',
        'published' => 'boolean',
    ];

    public function entries()
    {
        return $this->hasMany(ChangelogEntry::class);
    }
}
