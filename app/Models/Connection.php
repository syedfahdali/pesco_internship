<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;

    protected $fillable = ['survey_id', 'type', 'quantity', 'load_kva'];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
