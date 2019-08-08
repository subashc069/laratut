<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //mass assignmenet
    protected $fillable =[
        'title', 'description'
    ];
}
