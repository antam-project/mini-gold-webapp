<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterGold extends Model
{
    use HasFactory;

    protected $table = 'master_gold';

    protected $fillable = [
        'date',
        'weight',
        'price1',
        'price2',
        'price3',
        'source'
    ];
}
