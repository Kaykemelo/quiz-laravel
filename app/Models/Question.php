<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;
    
    protected $fillable = ['description', 'status', 'quiz_id'];


    public function alternatives() : HasMany
    {
        return $this->hasMany(Alternative::class);
    }
    
    public function quiz() : BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
}
