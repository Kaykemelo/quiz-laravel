<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['alternative_id','user_id','execution_id'];

    public function alternative() : BelongsTo
    {
        return $this->belongsTo(Alternative::class); 
    }
}
