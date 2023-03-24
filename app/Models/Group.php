<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    public function group(){
        return $this->belongsTo(Group::class,'parent_group')->with('group')->with('head');
    }
    public function child(){
        return $this->hasMany(Group::class,'parent_group')->with('child')->with('head');
    }
    public function head(){
        return $this->hasMany(AccountHead::class)->with('tran');
    }
    // public function total(){

    // }
    public static function tree(){
        $allGroups= Group::with('head')->get();
        $rootGroups = $allGroups->whereNull('parent_group');
        self::formatTree($rootGroups,$allGroups);
        return $rootGroups;
    }
    public static function formatTree($groups, $allGroups){
        foreach($groups as $group){
            $group->children = $allGroups->where('parent_group',$group->id)->values();
            if($group->children->isNotEmpty()){
                self::formatTree($group->children,$allGroups);
            }
        }
    }
}
