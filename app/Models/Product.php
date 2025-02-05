<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Product extends Model
{
    /**
    * var array
    */
    use HasFactory;
    
    protected $table = 'products';

    protected $with = ['images'];

    protected $fillable = [
        'name', 
        'description', 
        'location', //price
        'grade', //stock
        'status'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function scopeAvailable($query)
    {
         $query->where('status', 'available');
    }
}
