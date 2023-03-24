<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    /**
     *  POST した後の処理
     */
    protected $fillable = ['user_name', 'user_identifier', 'message'];

    public function scopeShowData($query)
    {
        return $this->created_at . ' @' . $this->user_name;
    }
}
