<?php

namespace App\Models;

use App\Traits\FileUploads;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Resource extends Model
{
    use CrudTrait, FileUploads;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'resources';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = ['uploads'=> 'array'];
    protected $uploads = ['uploads'];
    protected $uploadPath ='resources_uploads';
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function user(){
        return $this->belongsTo('App\Models\BackpackUser', 'uploaded_by');
    }

    public function type(){
        return $this->belongsTo('App\Models\Type', 'type_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag','tags_resources','resource_id','tag_id');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
