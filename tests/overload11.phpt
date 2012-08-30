--TEST--
Function overloading test for unixtojd
--SKIPIF--
<?php 
	extension_loaded('timecop') or die('skip timecop not available');
	$required_func = array("timecop_strtotime", "timecop_freeze", "unixtojd", "timecop_orig_unixtojd");
	foreach ($required_func as $func_name) {
		if (!function_exists($func_name)) {
			die("skip $func_name() function is not available.");
		}
	}
--INI--
date.timezone=America/Los_Angeles
--FILE--
<?php
timecop_freeze(timecop_strtotime("2012-02-29 14:59:59 GMT"));
var_dump(unixtojd());
timecop_freeze(timecop_strtotime("2012-02-29 15:00:00 GMT"));
var_dump(unixtojd());
--EXPECT--
int(2455987)
int(2455988)