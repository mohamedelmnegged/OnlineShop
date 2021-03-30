<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    protected $fillable = ['email', 'password'];

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
