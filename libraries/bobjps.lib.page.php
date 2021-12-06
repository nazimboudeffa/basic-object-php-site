<?php
/**
 * Register metatags init
 *
 * @return void
 */
function ossn_page_metatags() {
		ossn_extend_view('ossn/site/head', 'ossn_view_metatags');
}
/**
 * Register a page handler;
 * @params: $handler = page;
 * @params: $function = function which handles page;
 * @param string $handler
 * @param string $function
 *
 * @last edit: $arsalanshah
 * @Reason: Initial;
 */
function ossn_register_page($handler, $function) {
		global $Ossn;
		$pages = $Ossn->page[$handler] = $function;
		return $pages;
}
/**
 * Unregister a page from syste,
 * @param (string) $handler Page handler name;
 *
 * @last edit: $arsalanshah
 * @return void;
 */
function ossn_unregister_page($handler) {
		global $Ossn;
		unset($Ossn->page[$handler]);
}

/**
 * Output a page.
 *
 * If page is not registered then user will see a 404 page;
 *
 * @param  (string) $handler Page handler name;
 * @param  (string) $page  handler/page;
 * @last edit: $arsalanshah
 * @Reason: Initial;
 *
 * @return mix|null data
 * @access private
 */
function bobjps_load_page($handler, $page) {
		global $Bobjps;
		$context = $handler;
		if(isset($page) && !empty($page)) {
				$context = "$handler/$page";
		}
		//set context
		bobjps_add_context($context);

		$page = explode('/', $page);
		if(isset($Bobjps->page) && isset($Bobjps->page[$handler]) && !empty($handler) && is_callable($Bobjps->page[$handler])) {
				//supply params to hook
				$params['page']    = $page;
				$params['handler'] = $handler;

				//[E] Allow to override page handler existing pages #1746
				$halt_view = bobjps_call_hook('page', 'override:view', $params, false);
				if($halt_view === false) {
						//get page contents
						ob_start();
						call_user_func($Bobjps->page[$handler], $page, $handler);
						$contents = ob_get_clean();
				}
				if($halt_view) {
						$contents = '';
				}
				return bobjps_call_hook('page', 'load', $params, $contents);
		} else {
				return bobjps_error_page();
		}
}

/**
 * Set page owner guid, this is very useful
 *
 * @param (int) $guid  Guid of owner
 *
 * @return void
 */
function ossn_set_page_owner_guid($guid) {
		global $Ossn;
		$Ossn->pageOwnerGuid = $guid;
}

/**
 * Get page owner guid
 *
 * @return (int)
 */
function ossn_get_page_owner_guid() {
		global $Ossn;
		return $Ossn->pageOwnerGuid;
}

/**
 * Set page meta tags
 * [E] Allow to use metatags in head #1996
 *
 * @param string  $name      A name of metatag
 * @param string  $value     Value for the metatag
 * @param boolean $property  You wanted to use  false => name='' or true => property=''
 *
 * @return void
 */
function ossn_set_metatag($name = '', $value = '', $property = false) {
		if(!empty($name) && !empty($value)) {
				global $Ossn;
				$Ossn->pageMetaTags[$name] = array(
						'value'    => $value,
						'property' => $property,
				);
		}
}
/**
 * View metatags
 * [E] Allow to use metatags in head #1996
 *
 * @return void
 */
function ossn_view_metatags() {
		global $Ossn;
		if(isset($Ossn->pageMetaTags)) {
				$results = array();
				foreach($Ossn->pageMetaTags as $name => $vars) {
						if(!empty($vars['value']) && isset($vars['property'])) {
								$args = array();
								if($vars['property'] === false) {
										$args['name'] = $name;
								} else {
										$args['property'] = $name;
								}
								$args['content'] = $vars['value'];
								$results[]       = ossn_plugin_view('output/meta', $args);
						}
				}
				echo PHP_EOL . implode(PHP_EOL, $results);
		}
}
bobjps_register_callback('bobjps', 'init', 'bobjps_page_metatags');