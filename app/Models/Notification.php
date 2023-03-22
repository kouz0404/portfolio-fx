<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['send_user_id','got_user_id','message','reply_id' , 'send_user_name'];

    public function user()
    {
        //外部キーを設定
     return $this->belongsTo('App\Models\User' , 'send_user_id');
    }

    public function reply()
    {
        //外部キーを設定
     return $this->belongsTo('App\Models\Reply' , 'reply_id');
    }
}
