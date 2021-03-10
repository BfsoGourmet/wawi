<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    function get_last_order_id() {
        return DB::table('orders')->order_by('created_at', 'desc')->first();
    }
}
