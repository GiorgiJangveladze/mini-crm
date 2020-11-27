<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Employee extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [ 'company_id','first_name','last_name', 'slug', 'email', 'phone', 'image' ];

    public $timestamps = false;
    
    public function company() {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function getSlugOptions() : SlugOptions {
        return SlugOptions::create()
            ->generateSlugsFrom(['first_name', 'last_name'])
            ->saveSlugsTo('slug');
    }

}
