<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    protected $table = 'shop_user';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];//黑名单
}
