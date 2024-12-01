<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    // Specify the fields that should be cast to Carbon instances
    protected $casts = [
        'completion_date' => 'datetime',
        'survey_date' => 'datetime',
    ];

    // If needed, you can also define fillable attributes here
    protected $fillable = [
        'circle',
        'division',
        'sub_division',
        'grid',
        'feeder',
        'distribution_system',
        'entry_type',
        'work_order',
        'head',
        'sanctioned_by',
        'letter_no',
        'survey_date',
        'completion_date',
    ];
}
