<?php
//Restrict calling start.php directly from browser #1315
if(!defined("BOBJPS_ALLOW_SYSTEM_START")){
	header("HTTP/1.0 404 Not Found");	
	exit;
}
global $Bobjps; //Here we set the global object
if (!isset($Bobjps)) {
    $Bobjps = new stdClass;
}
include_once(dirname(dirname(__FILE__)) . '/libraries/bobjps.lib.route.php');

if (!is_file(bobjps_route()->configs . 'bobjps.config.site.php') && !is_file(bobjps_route()->configs . 'bobjps.config.db.php')) {
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
    header("Location: installation");
	exit;
}
include_once(bobjps_route()->configs . 'libraries.php');
include_once(bobjps_route()->configs . 'classes.php');

include_once(bobjps_route()->configs . 'bobjps.config.site.php');
include_once(bobjps_route()->configs . 'bobjps.config.db.php');

ini_set('session.cookie_httponly', 1);
//Load session start after classes #1318
session_start();
foreach ($Bobjps->libraries as $lib) {
	/*
	if (!include_once(bobjps_route()->libs . "bobjps.lib.{$lib}.php")) {
        throw new exception('Cannot include all libraries');
    }
	*/
	include_once(bobjps_route()->libs . "bobjps.lib.system.php");
	include_once(bobjps_route()->libs . "bobjps.lib.page.php");
}
bobjps_trigger_callback('bobjps', 'init');
//need to update user last_action 
// @note why its here?
//update_last_activity();