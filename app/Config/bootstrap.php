<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models/', '/next/path/to/models/'),
 *     'Model/Behavior'            => array('/path/to/behaviors/', '/next/path/to/behaviors/'),
 *     'Model/Datasource'          => array('/path/to/datasources/', '/next/path/to/datasources/'),
 *     'Model/Datasource/Database' => array('/path/to/databases/', '/next/path/to/database/'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions/', '/next/path/to/sessions/'),
 *     'Controller'                => array('/path/to/controllers/', '/next/path/to/controllers/'),
 *     'Controller/Component'      => array('/path/to/components/', '/next/path/to/components/'),
 *     'Controller/Component/Auth' => array('/path/to/auths/', '/next/path/to/auths/'),
 *     'Controller/Component/Acl'  => array('/path/to/acls/', '/next/path/to/acls/'),
 *     'View'                      => array('/path/to/views/', '/next/path/to/views/'),
 *     'View/Helper'               => array('/path/to/helpers/', '/next/path/to/helpers/'),
 *     'Console'                   => array('/path/to/consoles/', '/next/path/to/consoles/'),
 *     'Console/Command'           => array('/path/to/commands/', '/next/path/to/commands/'),
 *     'Console/Command/Task'      => array('/path/to/tasks/', '/next/path/to/tasks/'),
 *     'Lib'                       => array('/path/to/libs/', '/next/path/to/libs/'),
 *     'Locale'                    => array('/path/to/locales/', '/next/path/to/locales/'),
 *     'Vendor'                    => array('/path/to/vendors/', '/next/path/to/vendors/'),
 *     'Plugin'                    => array('/path/to/plugins/', '/next/path/to/plugins/'),
 * ));
 *
 */

/**
 * Custom Inflector rules can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */

Inflector::rules('plural', array('irregular' => array('professor' => 'professores')));
Inflector::rules('plural', array('irregular' => array('colaborador' => 'colaboradores')));
Inflector::rules('plural', array('irregular' => array('distribuidor' => 'distribuidores')));
Inflector::rules('plural', array('irregular' => array('notafiscal' => 'notasfiscais')));
Inflector::rules('plural', array('irregular' => array('material' => 'materiais')));
//Inflector::rules('singular', array('irregular' => array('material' => 'materiai')));
//Inflector::rules('singular', array('uninflected' => array('singulars'), 'irregular' => array('materials' => 'materiais')));

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. Make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */

// CakePlugin::load('Kadmin',array('bootstrap' => false));
//CakePlugin::load('DebugKit');
CakePlugin::loadAll();

/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter. By default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *      'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *      'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 *      array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *      array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
    'AssetDispatcher',
    'CacheDispatcher'
));

//Site
Configure::write('Site.url','http://pastoral.videiracampinas.com.br/');
Configure::write('Site.nome','Curso Pastoral');
Configure::write('Site.email','pastoral@videiracampinas.com.br');

//Sistema
Configure::write('Sistema.nome','CURSOS');
Configure::write('Sistema.aluno_id','6');
Configure::write('Sistema.professor_id','4');
Configure::write('Sistema.diretor_id','5');
Configure::write('Sistema.administrador_id','1');

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
    'engine' => 'File',
    'types' => array('notice', 'info', 'debug'),
    'file' => 'debug',
));
CakeLog::config('error', array(
    'engine' => 'File',
    'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
    'file' => 'error',
));


App::uses('ConnectionManager', 'Model');
App::uses('Inflector', 'Utility');
App::uses('ClassRegistry', 'Utility');
App::uses('CakeRequest', 'Network');



$adminIsAuthorized = (function_exists('adminIsAuthorized')) ? adminIsAuthorized() : true;
if ($adminIsAuthorized === false) {
    throw new MethodNotAllowedException();
} 

$Request = new CakeRequest();
if (isset($Request->url)) {
    $parts = explode('/', $Request->url);

    $createCont = true;
    if(isset($parts[0])){
        if(strtolower($parts[0]) == 'kadmin'){
            $createCont = true;
        } else {
            $createCont = false;
        }
    }
    if(isset($parts[1])){
        if(strtolower($parts[1]) == 'usuarios' || strtolower($parts[1]) == 'kadmin'){
            $createCont = false;
        } else {
            $createCont = true;
        }
    }
    if(isset($parts[2])){
        if (strtolower($parts[2]) == 'login' || strtolower($parts[2]) == 'entrar' || strtolower($parts[2]) == 'sair') {
            $createCont = false;
        } else {
            $createCont = true;
        }
    }

    if($createCont){
        if ((isset($parts[0])) && ($parts[0] == 'kadmin')) {
            if (isset($parts[1])) {
                $modelClassName = Inflector::camelize(Inflector::singularize($parts[1]));
                $Model = ClassRegistry::init($modelClassName);
                $DataSource = $Model->getDataSource();
                $controllerClassName = Inflector::camelize($parts[1]) . 'Controller';
                $controllerClass = 'App::uses(\'AppController\',\'Controller\');class ' . $controllerClassName . ' extends KadminAppController{public $uses = \'' . $modelClassName . '\';}';
               // eval($controllerClass);
            }
        }
    }

}
