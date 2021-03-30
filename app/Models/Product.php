<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'quantity', 'status'];

    /**
     * @function
     * accessor to get the url of the image
     */
    public function getImageAttribute($value){

        return $value == true? ['image' => asset( "images\products\\". $value), 'name' => $value ]: 'alt="the image not found "';
    }
    public function getImageNameAttribute(){
        return "here";
        return  asset('images\products\\'.$this->image);
    }

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
