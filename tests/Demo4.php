<?php
use PHPUnit\Framework\TestCase;
include "./config/DB.php";
include "./models/Model.php";
include "./models/ProductModel.php";

class Demo4 extends TestCase
{
    public function testCheckUser()
    {
        $obj = new ProductModel();
//        print_r($obj);
        $product = $obj->getProductByID(1);
        print_r($product);
        $this->assertSame(1, $obj->getId());
    }
}
