<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountHead extends Model
{
    use HasFactory;
    public function group(){
        return $this->belongsTo(Group::class,'group_id')->with('group');
    }
    public function head(){
        return $this->belongsTo(AccountHead::class,'parent_group')->with('head')->with('trans');
    }
    public function trans(){
        return $this->hasMany(Transaction::class)->with('head');
    }
    public function tran(){
        return $this->hasOne(Transaction::class);
    }
}
