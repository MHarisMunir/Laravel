<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class posts extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $dates = ['deleted_at'];
    //CONFIGURING MASS ASSIGNMENT FOR FORM DATA
    protected $fillable = [
        'Title',
        'Body'
    ];
}
