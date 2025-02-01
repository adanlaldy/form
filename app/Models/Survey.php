<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;

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
        'questions',
    ];

    // Public function to declare the relation N/1 with User class.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Public function to declare the relation 1/N with Question class.
    public function questions(): HasMany
    {
        return $this->HasMany(Question::class);
    }
}
