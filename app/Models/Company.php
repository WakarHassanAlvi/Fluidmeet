<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    //protected $fillable = ['name','email','contact','address','num_employees','company_type','service','image','longitude','latitude'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageAttribute($value)//accessor, after fetching data from db, changes it.
    {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
        return asset('storage/' . $value);
    }

    public function setServiceAttribute($value)//mutator
    {
        $this->attributes['service'] = json_encode($value);
    }

    public function getServiceAttribute($value)
    {
        return $this->attributes['service'] = json_decode($value);
    }
}
