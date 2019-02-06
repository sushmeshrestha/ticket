<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userslist extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Username' , 'Description',
    ];
}
