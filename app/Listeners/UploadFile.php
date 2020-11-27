<?php

namespace App\Listeners;

use App\Events\File;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Image;

class UploadFile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  File  $event
     * @return void
     */

     public function handle(File $event) {
        $destination_path  = $event->destination_path;
        $filenamewithextension = $event->file->getClientOriginalName(); 
        $extension = $event->file->getClientOriginalExtension();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $filenametostore = strtolower(time().str_replace(['#', '/', '\\', ' '], '_',$filename)).'.'.$extension;
        $thumbFile = $event->file->move($destination_path, $filenametostore);
        $this->saveImg($thumbFile, 'min_'.$filenametostore, 100, 100, $destination_path);
        $this->saveImg($thumbFile, 'medium_'.$filenametostore, 600, 300, $destination_path);
        return $filenametostore;
    }

    private function saveImg($file, $fileName, $sizex, $sizey, $destination_path) {
        $img = Image::make($file)->resize($sizex, $sizey, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($destination_path.$fileName);
        return $fileName;
    }
}
