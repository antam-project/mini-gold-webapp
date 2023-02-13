<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrProductGroup extends Model
{
    use HasFactory;

    protected $table = 'qr_product_groups';

    protected $fillable = [
        'code',
        'description'
    ];
}
