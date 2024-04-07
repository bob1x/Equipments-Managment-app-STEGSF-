<?php

//main
$router->get('/', 'controllers/index.php');
$router->map('/', 'controllers/themap/map.controller.php');
//profile 


//office
// $router ->get('/myoffice', 'controllers/office/show.php');
// $router ->put('/myoffice', 'controllers/office/show.local.php');




$router->get('/login', 'controllers/auth/login.php');
$router->post('/login', 'controllers/auth/session.php');
$router->get('/logout', 'controllers/auth/logout.php');



//pages
$router->get('/contact', 'controllers/contact.php');
$router->get('/equipmentassign', 'controllers/equipmentassign/index.php');


//admin 
$router->get('/dashboard', 'controllers/admin/index.php');

// search 
$router->put('/dashboard', 'controllers/admin/search.local.php');

//UserControle cruds
$router->get('/usercontrol', 'controllers/admin/usercontrol/index.php');
$router->put('/usercontrol', 'controllers/admin/usercontrol/store.php');
$router->delete('/usercontrol', 'controllers/admin/usercontrol/delete.php');
$router->patch('/usercontrol', 'controllers/admin/usercontrol/update.php');

//User routes 
$router->get('/profile', 'controllers/user/index.php');
$router->patch('/profile', 'controllers/user/update.php');

//local cruds
$router->get('/localcontrol', 'controllers/admin/localcontrol/index.php');
$router->store('/localcontrol', 'controllers/admin/localcontrol/store.php');
$router->delete('/localcontrol', 'controllers/admin/localcontrol/delete.php');
$router->patch('/localcontrol', 'controllers/admin/localcontrol/update.php');
$router->put('/localcontrol', 'controllers/admin/localcontrol/search.local.php');



//category cruds
$router->get('/categorycontrol', 'controllers/admin/category/index.php');
$router->put('/categorycontrol', 'controllers/admin/category/store.php');
$router->delete('/categorycontrol', 'controllers/admin/category/delete.php');
$router->patch('/categorycontrol', 'controllers/admin/category/update.php');

//subcategory cruds
$router->get('/subcategorycontrol', 'controllers/admin/subcategory/index.php');
$router->put('/subcategorycontrol', 'controllers/admin/subcategory/store.php');
$router->delete('/subcategorycontrol', 'controllers/admin/subcategory/delete.php');
$router->patch('/subcategorycontrol', 'controllers/admin/subcategory/update.php');

//equipment cruds

$router->get('/equipmentcontrol', 'controllers/admin/equipmentcontrol/index.php');
$router->store('/equipmentcontrol', 'controllers/admin/equipmentcontrol/store.php');
$router->delete('/equipmentcontrol', 'controllers/admin/equipmentcontrol/delete.php');
$router->patch('/equipmentcontrol', 'controllers/admin/equipmentcontrol/update.php');
$router->put('/equipmentcontrol', 'controllers/admin/equipmentcontrol/search.equipment.php');

//rapport 
$router->put('/generate', 'controllers/rapportgen/test.php');


//local assign
$router->get('/localassign', 'controllers/admin/localassign/index.php');
$router->put('/localassign', 'controllers/admin/localassign/store.php');
$router->delete('/localassign', 'controllers/admin/localassign/delete.php');
$router->patch('/localassign', 'controllers/admin/localassign/update.php');

//LOGS
$router->get('/logs', 'controllers/admin/logs/index.php');

//equipment assign
$router->get('/equipmentassign', 'controllers/equipmentassign/index.php');
// $router->put('/equipmentassign', 'controllers/equipmentassign/store.php');
// $router->delete('/equipmentassign', 'controllers/equipmentassign/delete.php');
// $router->patch('/equipmentassign', 'controllers/equipmentassign/update.php');
// $router->get('/equipmentassign/log', 'controllers/equipmentassign/history.php');

// all offcies views 
$router ->put('/offices', 'controllers/alloffices/search.local.php');
$router->get('/offices', 'controllers/alloffices/index.php');
$router ->store('/offices', 'controllers/alloffices/add.php');
$router ->delete('/offices', 'controllers/alloffices/delete.php');
$router ->patch('/offices', 'controllers/alloffices/update.php');
$router ->pdf('/offices', 'controllers/alloffices/Rapport.php');

// my office

$router ->get('/myoffice','controllers/office/show.php');
$router ->store('/myoffice', 'controllers/office/add.php');
$router ->delete('/myoffice', 'controllers/office/delete.php');
$router ->patch('/myoffice', 'controllers/office/update.php');
$router ->pdf('/myoffice', 'controllers/office/Rapport.php');



// histroy for equipments 
$router->get('/dashboard/log', 'controllers/history.php'); // the admin views these also as should the user maybe do copy the pages or idk , 
$router ->put('/offices', 'controllers/email.php');

// $router->put('/offices', 'controllers/myoffice/index.php');
$router ->get('/map', 'controllers/themap/index.php');
