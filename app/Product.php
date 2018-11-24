<?php
/**
 * Created by PhpStorm.
 * User: zhangzhongwang
 * Date: 2018/11/23
 * Time: 11:08 PM
 */

namespace App;

/**
 * Class Product
 * @package App
 */
class Product
{
    protected $name;

    /**
     * Product constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }


    public function name()
    {
        return $this->name;
    }
}