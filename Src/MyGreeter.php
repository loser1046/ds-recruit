<?php

namespace Src;

class MyGreeter
{
    /**
     * 根据当前指定的时区返回不同的问候语
     * 
     * @return string 不同问候语
     */
    public function greeting(): string
    {
        //指定服务所在的时区
        date_default_timezone_set('Asia/Shanghai');

        //获取24小时制的当前小时数
        $now_hour = (int) date("H");

        //根据当前小时数返回不同的问候语
        if ($now_hour >= 6 && $now_hour < 12) {
            return "Good morning";
        } elseif ($now_hour >= 12 && $now_hour < 18) {
            return "Good afternoon";
        } else {
            return "Good evening";
        }
    }


    /**
     * 根据给定的时间或当前系统时间返回问候语
     * 
     * @param string|null $time 可选的时间字符串，用于计算问候语，如果未提供，则使用当前系统时间
     * @return string 返回问候语，时间格式错误时返回"Time error"
     */
    public function greetingV2(?string $time = ""): string
    {
        try {
            //格式化参数时间 or 使用本机时间
            $dateTime = empty($time) ? new \DateTime() : new \DateTime($time);
        } catch (\Exception $e) {
            return "Time error";    //格式化失败时返回错误
        }

        //获取24小时制的小时数
        $hour = (int) $dateTime->format("H");

        //根据当前小时数返回不同的问候语
        if ($hour >= 6 && $hour < 12) {
            return "Good morning";
        } elseif ($hour >= 12 && $hour < 18) {
            return "Good afternoon";
        } else {
            return "Good evening";
        }
    }
}