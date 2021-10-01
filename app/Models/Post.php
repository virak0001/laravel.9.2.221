<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'title',
        'picture',
        'description',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
