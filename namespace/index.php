<?php
namespace test\one;
require_once('common.php');
use A\echo_arr;
use B\com1;
\A\echo_arr("���������ռ��з���");

\B\com1::echo_arr('ʹ����ȫ��������static����');
//---------------------
$b = new \B\com1;
$b->echo_arr('ʹ����ȫ��������new��������function');
//---------------------
$b = new com1;
$b->echo_arr('ʹ��new��������function');
//---------------------
com1::echo_arr('static::����function');
?>