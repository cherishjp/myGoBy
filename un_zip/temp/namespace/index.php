<?php
namespace test\one;
require_once('common.php');
use A\echo_arr;
use B\com1;
\A\echo_arr("调用命名空间中方法");

\B\com1::echo_arr('使用完全命名调用static方法');
//---------------------
$b = new \B\com1;
$b->echo_arr('使用完全命名调用new方法调用function');
//---------------------
$b = new com1;
$b->echo_arr('使用new方法调用function');
//---------------------
com1::echo_arr('static::调用function');
?>