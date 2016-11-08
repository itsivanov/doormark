<?php
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
    Router::parseExtensions('html', 'php', 'rss', 'pdf');
    Router::connect('/thumbs/*', array('plugin' => 'thumbs', 'controller' => 'thumbs', 'action' => 'index'));

	Router::connect('/', array('controller' => 'pages', 'action' => 'home', 'pageKey' => 'home'));

    Router::connect('/door', array('controller' => 'pages','action' => 'door', 'pageKey' => ':action'));
    Router::connect('/faq', array('controller' => 'pages','action' => 'faq', 'pageKey' => ':action'));
    Router::connect('/gallery', array('controller' => 'pages','action' => 'gallery', 'pageKey' => ':action'));
    Router::connect('/downloads', array('controller' => 'pages','action' => 'downloads', 'pageKey' => ':action'));
    Router::connect('/contact', array('controller' => 'pages','action' => 'contact', 'pageKey' => ':action'));
    Router::connect('/profile', array('controller' => 'users','action' => 'profile', 'pageKey' => ':action'));

    Router::connect('/door/:id', array('controller' => 'products','action'=> 'index','pageKey' => 'index'));

    Router::connect('/door/view/:id', array('controller' => 'products','action'=> 'view','pageKey' => 'view'));

    //Ajax gallery
    Router::connect('/ajax/gallery/', array( 'controller' => 'pages', 'action' => 'gallery'));
    Router::connect('/ajax/album/', array( 'controller' => 'pages', 'action' => 'albumAjax'));

    //Ajax door category
    Router::connect('/ajax/door/', array( 'controller' => 'pages', 'action' => 'door'));

    //Ajax home laminate
    Router::connect('/ajax/laminate/', array( 'controller' => 'pages', 'action' => 'home'));

    /*Login*/
    Router::connect('/users/login', array( 'controller' => 'users', 'action' => 'login', 'pageKey' => 'login'));
    Router::connect('/logout', array( 'controller' => 'users', 'action' => 'logout', 'pageKey' => 'logout'));

    /**
     * End of
     * Doormark
     */

    Router::connect('/pages/:action/*', array( 'controller' => 'pages'));

    Router::connect('/min-js', array('plugin' => 'Minify', 'controller' => 'minify', 'action' => 'index', 'js'));
    Router::connect('/min-css', array('plugin' => 'Minify', 'controller' => 'minify', 'action' => 'index', 'css'));

    Router::connect('/captcha', array('controller' => 'pages', 'action' => 'captcha', 'pageKey' => 'captcha'));
    /**
     * Load all plugin routes. See the CakePlugin documentation on
     * how to customize the loading of plugin routes.
     */
	CakePlugin::routes();

    Router::connect('/:pageKey', array('controller' => 'pages', 'action' => 'display'));
//    Router::connect('/:pageKey/:param', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';