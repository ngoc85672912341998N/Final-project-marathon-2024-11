<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class oders extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oders';

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
                  'id_course',
                  'status',
                  'price',
                  'payment_method',
                  'total',
                  'code',
                  'note'
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
     * Get the bill for this model.
     *
     * @return App\Models\Bill
     */
    public function bill()
    {
        return $this->hasOne('App\Models\Bill','id_oders','id');
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
