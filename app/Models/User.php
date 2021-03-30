<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'address',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @function
     * return the number of days for register
     */
    public function getDateToRegister(){

        $start = strtotime(Carbon::parse( $this->created_at)->format('Y-m-d'));
        $end = strtotime( Carbon::parse(now())->format('Y/m/d'));

        $count = (int)(($end - $start) / 86400);
        if($count == 0 ):
            return "Today";
        endif;
        return $count . " Day";
    }

    /**
     * @function
     * return the number of days for last edit
     */
    public function getDateToEdit(){
        $start = strtotime(Carbon::parse( $this->updated_at)->format('Y-m-d'));
        $end = strtotime( Carbon::parse(now())->format('Y/m/d'));

        $count = (int)(($end - $start) / 86400);
        if($count == 0 ):
            return "Today";
        endif;
        return $count . " Day";
    }
}
