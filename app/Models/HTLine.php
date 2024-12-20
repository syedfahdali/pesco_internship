<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HtLine extends Model
{
    use HasFactory;

    protected $fillable = ['survey_id', 'conductor_name', 'length_in_kms'];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
