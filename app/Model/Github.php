<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Github extends Model
{
    protected $table = 'shop_github';
    protected  $primaryKey='g_id';
	protected $guarded = [];
}
