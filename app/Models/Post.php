<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
        'user_id'
    ];
    protected $hidden = [
        'user_id'
    ];
}
