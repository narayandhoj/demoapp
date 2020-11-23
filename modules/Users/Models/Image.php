<?php

namespace Modules\Users\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
    */
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'image',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}