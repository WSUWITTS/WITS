<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;

    public static function boot(){
        parent::boot();
    }

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 500; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    public $timestamps = false;

    protected $table = "division_department_teams";

    public function org()
    {
    	return $this->hasMany('App\Org');
    }

    public function building()
    {
        return $this->belongsToMany('App\Building', 'building_department', 'department_id', 'building_id');
    }

    public function hierarchy()
    {
        return $this->hasMany('App\Hierarchy');
    }

}
