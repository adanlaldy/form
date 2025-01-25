<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Question extends Model
{
    protected $connection = 'mongodb';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'type',
        'answers',
        'good_answers'
    ];

    // Public function to declare the relation N/1 with Survey class.
    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
}
