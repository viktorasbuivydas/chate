<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestionComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'suggestion_id',
        'comment',
        'parent_id',
    ];

    protected $with = [
        'user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function suggestions()
    {
        return $this->belongsToMany(Suggestion::class);
    }
}
