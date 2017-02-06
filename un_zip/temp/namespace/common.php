<?php
namespace A;
echo '当前空间：'.__NAMESPACE__.'<BR>';
function echo_arr($arr)
{
	echo "<pre>";
	ECHO 'AAAAAAA';
	print_r($arr);
	echo "</pre>";
} // end func


/**
 * Short description.
 * @package     main
 * @subpackage  classes
 * @abstract    Classes defined as abstract may not be instantiated
 */
class com1
{

} // end class

namespace B;
echo '当前空间：'.__NAMESPACE__.'<BR>';

/**
 * Short description.
 * @package     main
 * @subpackage  classes
 * @abstract    Classes defined as abstract may not be instantiated
 */
class com1
{
	static function echo_arr($arr)
	{
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
	} // end func

} // end class

?>