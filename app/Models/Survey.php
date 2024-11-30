<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HTLine;           // Importing HtLine model     // Importing Transformer model
use App\Models\Connection;       // Importing Connection model
use App\Models\Pole; 
use App\Models\DistributionTransformer;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'circle',
        'division',
        'sub_division',
        'grid',
        'feeder',
        'distribution_system',
        'entry_type',
        'conductor_name',
        'length_in_kms',
        'transformer_capacity',
        'quantity',
        'location_coordinates',
        'category',
        'connection_type',
        'connection_quantity',
        'connection_load',
        'pole_type',
        'pole_quantity',
        'date_completion',
        'work_order',
        'head',
        'sanctioned_by',
        'vide_letter_no',
        'survey_date'
    ];

    public function htLines()
    {
        return $this->hasMany(HTLine::class);
    }

    public function transformers()
    {
        return $this->hasMany(DistributionTransformer::class);
    }

    public function connections()
    {
        return $this->hasMany(Connection::class);
    }

    public function poles()
    {
        return $this->hasMany(Pole::class);
    }
}
    