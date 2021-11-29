<?php
$BobjpsClasses = array(
		'Session',
		'Factory',
		'SiteException',
		'DatabaseException',
		'Base',
		'Translit',
		'Mail',
		'Pagination',
		'Database',
		'Site',
		'Entities',
		'User',
		'Object',
		'Annotation',
		'Themes',
		'File',
		'Components',
		'Menu',
		'System',
		'Image',
);
foreach($BobjpsClasses as $class){
		$loadClass['Bobjps'.$class] = bobjps_route()->classes . "Bobjps{$class}.php";
}
bobjps_register_class($loadClass);