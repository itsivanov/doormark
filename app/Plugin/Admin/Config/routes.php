<?php
/**
 * Routes configuration plugin Admin
 */




Router::connect('/admin', array( 'controller' => 'admin_pages', 'plugin' => 'admin','action' => 'dashboard'));

/* Main Slider */
Router::connect('/admin/main-slider', array( 'controller' => 'adminMainSlides', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/main-slider/:action/:id', array( 'controller' => 'adminMainSlides', 'plugin' => 'admin', 'action' => ':action'));
Router::connect('/admin/main-slider/add', array( 'controller' => 'adminMainSlides', 'plugin' => 'admin', 'action' => 'add'));

/* Slider */
Router::connect('/admin/slider', array( 'controller' => 'adminSlides', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/slider/:action/:id', array( 'controller' => 'adminSlides', 'plugin' => 'admin', 'action' => ':action'));
Router::connect('/admin/slider/add', array( 'controller' => 'adminSlides', 'plugin' => 'admin', 'action' => 'add'));

/* Home Parts*/
Router::connect('/admin/home-parts', array( 'controller' => 'adminHomeParts', 'plugin' => 'admin', 'action' => 'index'));
Router::connect(
    '/admin/home-parts/edit/:id',
    array( 'controller' => 'adminHomeParts', 'plugin' => 'admin', 'action' => 'edit'),
    array(
        'id' => array('id'),
        'id' => '[0-9]+'
    )
);

Router::connect('/admin/pages', array( 'controller' => 'admin_pages', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/pages/:action/*', array( 'controller' => 'admin_pages', 'plugin' => 'admin'));

//Router::connect('/admin/discounts', array( 'controller' => 'admin_discounts', 'plugin' => 'admin', 'action' => 'index'));
//Router::connect('/admin/discounts/:action/*', array( 'controller' => 'admin_discounts', 'plugin' => 'admin'));

Router::connect('/admin/categories', array( 'controller' => 'admin_categories', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/categories/:action/*', array( 'controller' => 'admin_categories', 'plugin' => 'admin'));



/* Products */
Router::connect('/admin/products', [ 'controller' => 'adminProducts', 'plugin' => 'admin', 'action' => 'index']);
Router::connect('/admin/products/add', ['controller' => 'adminProducts', 'plugin' => 'admin', 'action' => 'add']);
Router::connect(
    '/admin/products/edit/:id',
    array( 'controller' => 'admin_products', 'plugin' => 'admin', 'action' => 'edit'),
    array(
        'id' => array('id'),
        'id' => '[0-9]+'
    )
);
Router::connect(
    '/admin/products/delete/:id',
    array( 'controller' => 'admin_products', 'plugin' => 'admin', 'action' => 'del'),
    array(
        'id' => array('id'),
        'id' => '[0-9]+'
    )
);

Router::connect('/admin/products/activate/:id', array( 'controller' => 'adminProducts', 'plugin' => 'admin', 'action'=> 'activate'));

/*Palette (table vt_laminates)*/
Router::connect('/admin/laminates', array( 'controller' => 'adminLaminates', 'plugin' => 'admin', 'action'=> 'index'));
Router::connect('/admin/laminates-view/:element', array( 'controller' => 'adminLaminates', 'plugin' => 'admin', 'action'=> 'laminatesView'));
Router::connect('/admin/laminates/add', array( 'controller' => 'adminLaminates', 'plugin' => 'admin', 'action'=> 'add'));
Router::connect('/admin/laminates/delete/:id', array( 'controller' => 'adminLaminates', 'plugin' => 'admin', 'action' => 'del'));
Router::connect('/admin/laminates/:action/:id', array( 'controller' => 'adminLaminates', 'plugin' => 'admin', 'action'=> ':action'));

/* Palette Categories (table vt_laminate_categories)*/
Router::connect('/admin/lcategories', array( 'controller' => 'adminLaminateCategories', 'plugin' => 'admin', 'action'=> 'index'));
Router::connect('/admin/lcategories/:action/*', array( 'controller' => 'adminLaminateCategories', 'plugin' => 'admin', 'action'=> ':action'));



/* Companies */
Router::connect('/admin/companies', array( 'controller' => 'admin_companies', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/companies/:action/*', array( 'controller' => 'admin_companies', 'plugin' => 'admin'));

/* FAQ*/
Router::connect('/admin/faq/add', ['controller' => 'adminFaq', 'plugin' => 'admin', 'action' => 'add']);
Router::connect(
    '/admin/faq/edit/:id',
    array( 'controller' => 'adminFaq', 'plugin' => 'admin', 'action' => 'edit'),
    array(
        'id' => array('id'),
        'id' => '[0-9]+'
    )
);
Router::connect(
    '/admin/faq/delete/:id',
    array( 'controller' => 'adminFaq', 'plugin' => 'admin', 'action' => 'del'),
    [ 'id' => ['id'],
       'id' => '[0-9]+'
        ]
);
Router::connect('/admin/faq/activate/:id', ['controller' => 'adminFaq', 'plugin' => 'admin', 'action' => 'activate']);
Router::connect('/admin/faq/block/:id', array( 'controller' => 'adminFaq', 'plugin' => 'admin', 'action' => 'index'));

Router::connect('/admin/faq', array( 'controller' => 'adminFaqBlocks', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/faq/add-block', ['controller' => 'adminFaqBlocks', 'plugin' => 'admin', 'action' => 'addBlock']);
Router::connect('/admin/faq/activate-block/:id', ['controller' => 'adminFaqBlocks', 'plugin' => 'admin', 'action' => 'activate']);
Router::connect('/admin/faq/delete-block/:id', array( 'controller' => 'adminFaqBlocks', 'plugin' => 'admin', 'action' => 'deleteBlock'));
Router::connect('/admin/faq/edit-block/:id', array( 'controller' => 'adminFaqBlocks', 'plugin' => 'admin', 'action' => 'editBlock'));

/* Downloads */
Router::connect('/admin/download', array( 'controller' => 'adminDownloads', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/download/add', ['controller' => 'adminDownloads', 'plugin' => 'admin', 'action' => 'add']);
Router::connect('/admin/download/status/:id', ['controller' => 'adminDownloads', 'plugin' => 'admin', 'action' => 'status']);
Router::connect('/admin/download/edit/:id',array( 'controller' => 'adminDownloads', 'plugin' => 'admin', 'action' => 'edit'));
Router::connect(
    '/admin/download/delete/:id',
    array( 'controller' => 'adminDownloads', 'plugin' => 'admin', 'action' => 'del'),
    [ 'id' => ['id'],
        'id' => '[0-9]+'
    ]
);


/* gallery */

Router::connect('/admin/gallery/add', ['controller' => 'adminGalleryAlbums', 'plugin' => 'admin', 'action' => 'add']);
Router::connect(
    '/admin/gallery/edit/:id',
    array( 'controller' => 'adminGalleryAlbums', 'plugin' => 'admin', 'action' => 'edit'),
    array(
        'id' => array('id'),
        'id' => '[0-9]+'
    )
);
Router::connect(
    '/admin/gallery/delete/:id',
    array( 'controller' => 'adminGalleryAlbums', 'plugin' => 'admin', 'action' => 'del'),
    [ 'id' => ['id'],
      'id' => '[0-9]+'
    ]
);

/* Albums */
Router::connect('/admin/albums', array( 'controller' => 'adminGallery', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/albums/view/:id', array( 'controller' => 'adminGalleryAlbums', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/albums/add', ['controller' => 'adminGallery', 'plugin' => 'admin', 'action' => 'add']);
Router::connect(
    '/admin/albums/edit/:id',
    array( 'controller' => 'adminGallery', 'plugin' => 'admin', 'action' => 'edit'),
    array(
        'id' => array('id'),
        'id' => '[0-9]+'
    )
);
Router::connect(
    '/admin/albums/delete/:id',
    array( 'controller' => 'adminGallery', 'plugin' => 'admin', 'action' => 'del'),
    [ 'id' => ['id'],
        'id' => '[0-9]+'
    ]
);
/*Company Contacts*/
Router::connect('/admin/contact', array( 'controller' => 'adminCompanyContacts', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/contact/edit/:id', array( 'controller' => 'adminCompanyContacts', 'plugin' => 'admin', 'action' => 'edit'));



/* About us*/
Router::connect('/admin/about', array( 'controller' => 'adminAbout', 'plugin' => 'admin', 'action' => 'index'));
Router::connect(
    '/admin/about/edit/:id',
    array( 'controller' => 'adminAbout', 'plugin' => 'admin', 'action' => 'edit'),
    array(
        'id' => array('id'),
        'id' => '[0-9]+'
    )
);



//Router::connect('/admin/menus', array( 'controller' => 'admin_menus', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/footer', array( 'controller' => 'admin_menus', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/footer/:action/*', array( 'controller' => 'admin_menus', 'plugin' => 'admin'));

Router::connect('/admin/footer_right', array( 'controller' => 'admin_menus', 'plugin' => 'admin', 'action' => 'footerRight'));
Router::connect('/admin/footer_right/:action/*', array( 'controller' => 'admin_menus', 'plugin' => 'admin'));


Router::connect('/admin/users', array( 'controller' => 'admin_users', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/users/:action/*', array( 'controller' => 'admin_users', 'plugin' => 'admin'));

Router::connect('/admin/services', array( 'controller' => 'admin_services', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/service s/:action/*', array( 'controller' => 'admin_services', 'plugin' => 'admin'));

Router::connect('/admin/orders', array( 'controller' => 'admin_orders', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/orders/new', array( 'controller' => 'admin_orders', 'plugin' => 'admin', 'action' => 'newOrders'));
Router::connect('/admin/orders/:action/*', array( 'controller' => 'admin_orders', 'plugin' => 'admin'));

Router::connect('/admin/options', array( 'controller' => 'admin_options', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/options/:action/*', array( 'controller' => 'admin_options', 'plugin' => 'admin'));
Router::connect('/admin/assignments', array( 'controller' => 'admin_contacts', 'plugin' => 'admin', 'action' => 'assignments'));
Router::connect('/admin/assignments/view/*', array( 'controller' => 'admin_contacts', 'plugin' => 'admin', 'action' => 'assignmentView'));
Router::connect('/admin/assignments/delete/*', array( 'controller' => 'admin_contacts', 'plugin' => 'admin', 'action' => 'assignmentDelete'));

Router::connect('/admin/claims', array( 'controller' => 'admin_claims', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/claims/:action/*', array('controller' => 'admin_claims', 'plugin' => 'admin'));

Router::connect('/admin/contacts', array( 'controller' => 'admin_contacts', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/contacts/:action/*', array( 'controller' => 'admin_contacts', 'plugin' => 'admin'));

Router::connect('/admin/subscribe', array( 'controller' => 'admin_subscribes', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/subscribe/:action/*', array( 'controller' => 'admin_subscribes', 'plugin' => 'admin'));

Router::connect('/admin/feedbacks', array( 'controller' => 'admin_feedbacks', 'plugin' => 'admin', 'action' => 'index'));
Router::connect('/admin/feedbacks/:action/*', array( 'controller' => 'admin_feedbacks', 'plugin' => 'admin'));



/*Ajax*/
Router::connect('/admin/ajax/products', array( 'controller' => 'admin_product_rentals', 'plugin' => 'admin', 'action' => 'ajax'));
Router::connect('/admin/ajax/rent_fee', array( 'controller' => 'adminRentalsFees', 'plugin' => 'admin', 'action' => 'ajax'));
