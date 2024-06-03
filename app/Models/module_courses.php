<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class module_courses extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'module_courses';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name_module',
                  'description',
                  'id_course'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the Course for this model.
     *
     * @return App\Models\Course
     */
    public function Course()
    {
        return $this->belongsTo('App\Models\Course','id_course','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value);
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value);
    }

}
