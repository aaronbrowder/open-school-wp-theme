<?php
class WDIControllerImageBrowser_view{
////////////////////////////////////////////////////////////////////////////////////////
// Events                                                                             //
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// Constants                                                                          //
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// Variables                                                                          //
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// Constructor & Destructor                                                           //
////////////////////////////////////////////////////////////////////////////////////////
public function __construct() {
}
////////////////////////////////////////////////////////////////////////////////////////
// Public Methods                                                                     //
////////////////////////////////////////////////////////////////////////////////////////
public function execute($feed_row,$wdi_feed_counter){
	//including model
	require_once(WDI_DIR .'/frontend/models/WDIModelImageBrowser_view.php');
	$model = new WDIModelImageBrowser_view($feed_row,$wdi_feed_counter);
	//including view
	require_once(WDI_DIR .'/frontend/views/WDIViewImageBrowser_view.php');
	$view = new WDIViewImageBrowser_view($model);
	$view->display();
}






}
?>