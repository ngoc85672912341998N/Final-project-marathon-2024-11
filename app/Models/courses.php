<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

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
                  'name',
                  'path_image',
                  'role_id_course',
                  'price',
                  'course_description',
                  'course_time',
                  'users_limit'
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
     * Get the RolesCourse for this model.
     *
     * @return App\Models\roles_course
     */
    public function RolesCourse()
    {
        return $this->belongsTo('App\Models\roles_course','role_id_course','id');
    }

    /**
     * Get the courseUser for this model.
     *
     * @return App\Models\CourseUser
     */
    public function courseUser()
    {
        return $this->hasOne('App\Models\CourseUser','id_user','id');
    }

    /**
     * Get the imageCourse for this model.
     *
     * @return App\Models\ImageCourse
     */
    public function imageCourse()
    {
        return $this->hasOne('App\Models\ImageCourse','id_course','id');
    }

    /**
     * Get the listCourse for this model.
     *
     * @return App\Models\ListCourse
     */
    public function listCourse()
    {
        return $this->hasOne('App\Models\ListCourse','id_course','id');
    }

    /**
     * Get the moduleCourse for this model.
     *
     * @return App\Models\ModuleCourse
     */
    public function moduleCourse()
    {
        return $this->hasOne('App\Models\ModuleCourse','id_course','id');
    }

    /**
     * Get the oder for this model.
     *
     * @return App\Models\Oder
     */
    public function oder()
    {
        return $this->hasOne('App\Models\Oder','id_course','id');
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
