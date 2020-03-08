<?php
use PHPUnit\Framework\TestCase;

include "../models/Model.php";
include "../models/LoginModel.php";

class Demo3 extends TestCase
{
    public function testCheckUser()
    {
        $obj = new LoginModel();
        $res = $obj->checkUser();
        $this->assertSame(1, $res);
    }
}
