<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require_once './siteController/AlunniController.php';
require_once './siteController/SiteController.php';
require_once './classi_php/Classe.php';

$app = AppFactory::create();

$app->get('/', 'SiteController:index');
$app->get('/alunni', 'AlunniController:alunni');
$app->get('/alunni/{nome}', 'AlunniController:selectAlunno');



$app->run();