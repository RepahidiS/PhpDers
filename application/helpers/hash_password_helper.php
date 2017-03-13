<?php
    defined("BASEPATH") OR exit("No direct script access allowed");

    if( ! function_exists("encrypt"))
    {
        function encrypt($password)
        {
            $firstThree = substr($password, 0, 3);
            $others = substr($password, 3, strlen($password) + 1);
            return md5("repa".$firstThree."hidis".$others);
        }
    }