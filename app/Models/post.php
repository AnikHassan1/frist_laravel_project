<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\subcategory;
class post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'title',
        'slug',
        'post_date',
        'description',
        'image',
    ];
    //__join With Category__//
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    //__Join with Sub Category__//
    public function subcategory(){
        return $this->belongsTo(subcategory::class,'subcategory_id');
    }
    //__join with Users__//
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    protected $table = 'post';
}
