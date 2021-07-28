<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
         'last_name',
         'middle_name',
         'address',
         'department_id',
         'country_id',
         'state_id',
         'city_id',
         'zip_code',
         'birthdate',
         'date_hired'
        ];
     protected $cats = [
         'birthdate' => 'datetime:Y-m-d',
         'date_hired' => 'datetime:Y-m-d',
     ];

     public function coutry(){
         return $this->belongsTo(Country::class);
     }
     public function state()
     {
         return $this->belongsTo(State::class);
     }
     public function city()
     {
         return $this->belongsTo(City::class);
     }
     public function department()
     {
         return $this->belongsTo(Department::class);
     }

}
