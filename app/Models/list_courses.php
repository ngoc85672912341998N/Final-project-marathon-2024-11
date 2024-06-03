<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class list_courses extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'list_courses';

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
                  'end_date',
                  'id_course',
                  'name',
                  'start_date'
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
     * Get the calendarCourse for this model.
     *
     * @return App\Models\CalendarCourse
     */
    public function calendarCourse()
    {
        return $this->hasOne('App\Models\CalendarCourse','id_list_course','id');
    }

    /**
     * Get the courseUser for this model.
     *
     * @return App\Models\CourseUser
     */
    public function courseUser()
    {
        return $this->hasOne('App\Models\CourseUser','id_list_course','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
