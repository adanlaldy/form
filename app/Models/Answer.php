<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\BelongsTo;

class Answer extends Model
{
    protected $connection = 'mongodb';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'question_id',
        'answer',
    ];

    // Public function to declare the relation N/1 with Response class.
    public function response(): BelongsTo
    {
        return $this->belongsTo(Response::class);
    }
}
