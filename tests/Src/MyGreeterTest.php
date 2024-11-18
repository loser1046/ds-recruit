<?php

use PHPUnit\Framework\TestCase;
use Src\MyGreeter;

class MyGreeterTest extends TestCase
{
    private MyGreeter $greeter;

    public function setUp(): void
    {
        $this->greeter = new MyGreeter();
    }

    public function test_init()
    {
        $this->assertInstanceOf(
            MyGreeter::class,
            $this->greeter
        );
    }

    public function test_greeting()
    {
        $this->assertTrue(
            strlen($this->greeter->greeting()) > 0
        );
    }
    
    /**
     * 测试不同场景下的问候语返回是否正确
     * 
     * @return void
     */
    public function test_greeting_v2()
    {
        //测试晚上和上午的临界时间
        $time = "6:00:00";
        $this->assertEquals("Good morning",$this->greeter->greetingV2($time),"[{$time}]_Failed test");
        
        //测试上午的常规时间
        $time = "8:00:00";
        $this->assertEquals("Good morning",$this->greeter->greetingV2($time),"[{$time}]_Failed test");
        
        //测试上午和下午的临界时间
        $time = "12:00:00";
        $this->assertEquals("Good afternoon",$this->greeter->greetingV2($time),"[{$time}]_Failed test");
        
        //测试下午的常规时间
        $time = "16:00:00";
        $this->assertEquals("Good afternoon",$this->greeter->greetingV2($time),"[{$time}]_Failed test");
        
        //测试下午和晚上的临界时间
        $time = "18:00:00";
        $this->assertEquals("Good evening",$this->greeter->greetingV2($time),"[{$time}]_Failed test");

        //测试晚上的常规时间
        $time = "20:00:00";
        $this->assertEquals("Good evening",$this->greeter->greetingV2($time),"[{$time}]_Failed test");

        //测试凌晨时间
        $time = "1:00:00";
        $this->assertEquals("Good evening",$this->greeter->greetingV2($time),"[{$time}]_Failed test");

        //测试非整点时间
        $time = "2024-11-19 03:08:08";
        $this->assertEquals("Good evening",$this->greeter->greetingV2($time),"[{$time}]_Failed test");

        //测试错误时间格式
        $time = "88:88:88";
        $this->assertEquals("Time error",$this->greeter->greetingV2($time),"[{$time}]_Failed test");

        //测试错误时间格式
        $time = "Error Time";
        $this->assertEquals("Time error",$this->greeter->greetingV2($time),"[{$time}]_Failed test");

        //测试错误时间格式
        $time = "123";
        $this->assertEquals("Time error",$this->greeter->greetingV2($time),"[{$time}]_Failed test");

        //测试空
        $time = "";
        $this->assertNotEquals("Time error",$this->greeter->greetingV2($time),"[Empty params]_Failed test");
        
        //测试不传参的默认返回值
        $this->assertNotEquals("Time error",$this->greeter->greetingV2(),"[No params]_Failed test");
    }
}
