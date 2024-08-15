<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winners extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'city', 'country', 'updated_at', 'created_at'];

    public function winners()
    {
        return $this->hasMany(Winners::all());
    }

}
