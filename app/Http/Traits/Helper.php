<?php

namespace App\Http\Traits;
use App\Models\News;

trait Helper {
    
    public $sizes = ['min', 'medium'];

    public function deleteFile($path, $fileName) {
        $this->unlinkImg($path.$fileName);
        foreach($this->sizes as $size) {
            $this->unlinkImg($path.$size.'_'.$fileName);
        }
    }

    private function unlinkImg($path) {
        if(file_exists($path)) {
            unlink($path);          
        }
        return true;
    }

}