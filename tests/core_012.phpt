--TEST--
Test for $_SERVER['REQUEST_TIME'] when timecop.sync_request_time=0
--SKIPIF--
<?php
$required_func = array("timecop_freeze", "timecop_travel", "timecop_return");
include(__DIR__."/tests-skipcheck.inc.php");
--INI--
date.timezone=UTC
timecop.sync_request_time=0
--FILE--
<?php
$orig_request_time = $_SERVER['REQUEST_TIME'];
timecop_freeze(1234);
var_dump($orig_request_time === $_SERVER['REQUEST_TIME']);
timecop_travel(12345);
var_dump($orig_request_time === $_SERVER['REQUEST_TIME']);
timecop_return();
var_dump($orig_request_time === $_SERVER['REQUEST_TIME']);
--EXPECT--
bool(true)
bool(true)
bool(true)
