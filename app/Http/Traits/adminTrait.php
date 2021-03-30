<?php

namespace App\Http\Traits;



trait adminTrait
{
    public function savePhotos($folder, $image){
        //this function to save the photo in the folder
        $image->store('/', $folder);
        $filename = $image->hashName();
        return $filename;
    }

}
