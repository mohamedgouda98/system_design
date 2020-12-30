<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request extends Model
{
    use HasFactory;

    public function item_data(){
        return $this->belongsTo(item::class, 'item_id', 'id');
    }

    protected $guarded= [];
}
