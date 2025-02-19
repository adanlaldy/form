<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;

class Response extends Model
{
    protected $connection = 'mongodb';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'survey_id',
        'user_id',
        'answers',
    ];

    // Public function to declare the relation N/1 with Survey class.
    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    // Public function to declare the relation N/1 with Question class.
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    // Public function to declare the relation 1/N with Answer class.
    public function answers(): HasMany
    {
        return $this->HasMany(Answer::class);
    }
}
