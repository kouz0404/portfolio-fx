<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    protected $table = 'replys';
    use HasFactory;
    protected $fillable = ['body','send_user_id'];

    public function reply()
    {
     return $this->belongsTo('App\Models\Post' , 'post_id');
    }

    public function user()
    {
        //外部キーを設定
     return $this->belongsTo('App\Models\User' , 'send_user_id');
    }


}
