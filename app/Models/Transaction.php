<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function head(){
        return $this->belongsTo(AccountHead::class,'account_head_id')->with('group');
    }
}
