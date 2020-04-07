<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
<<<<<<< HEAD
    //用户表
     /**
	 * 关联到模型的数据表
	 *
	 * @var string
	 */
    protected $table = 'shop_user';
    protected  $primaryKey='id';

	    /**
	 * 表明模型是否应该被打上时间戳
	 *
	 * @var bool
	 */
	 public $timestamps = false;


		 /**
	 * 不能被批量赋值的属性
	 *
	 * @var array
	 */
	 protected $guarded = [];
=======
    protected $table = 'shop_user';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];//黑名单
>>>>>>> 36bb2d591ab6da45b70b007e6037738d51068ede
}
