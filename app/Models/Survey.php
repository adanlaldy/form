<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Survey extends Model
{
    protected $connection = 'mongodb';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'creator',
    ];

    // Public function to declare the relation N/1 with User class.
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
