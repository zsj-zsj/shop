<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{

    //用户表
     /**
	 * 关联到模型的数据表
	 *
	 * @var string
	 */
    protected $table = 'shop_user';
    protected  $primaryKey='id';

		 /**
	 * 不能被批量赋值的属性
	 *
	 * @var array
	 */
	 protected $guarded = [];

}
