<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChangelogEntry extends Model
{
    protected $fillable = [
        'release_id',
        'type',
        'title',
        'description',
    ];

    public function release()
    {
        return $this->belongsTo(Release::class);
    }
}
