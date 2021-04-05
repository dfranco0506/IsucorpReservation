<?php

namespace app\Libraries;

//WE INCLUDING THE AUTOLOAD VENDOR
include_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Doctrine\Common\ClassLoader;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Mapping\Driver\YamlDriver;

// TO OBTAIN THE ENTITY MANAGER
class Doctrine
{

    public $em;

    public function __construct()
    {

        // CONNECTION SETUP YOU NEED TO CHANGE WITH YOURS DBB
        $connection_options = array(
            'driver'        => 'pdo_mysql',
            'user'          => 'isucorp',
            'password'      => '123456',
            'host'          => 'localhost',
            'dbname'        => 'isucorp_db',
            'charset'       => 'utf8',
            'driverOptions' => array(
                'charset'   => 'utf8',
            ),
        );

        // PATH OF YOUR MODELS HERE ITS : APP/Models/Entities
        $models_namespace = 'Entities';
        $models_path = APPPATH . 'Models';
        $proxies_dir = APPPATH . 'Models/Proxies';
        $metadata_paths = array(APPPATH . 'Models/Entities');

        // DEV_MODE TRUE TO DISABLE CACHE
        $dev_mode = true;
        $cache = null;
        $useSimpleAnnotationReader = false;

        // METADATA CONFIGURATION: CHECK IN THE DOCUMENTATION IF YOU WANT TO USE XML OR YAML
        // createXMLMetadataConfiguration or createYAMLMetadataConfiguration
        $config = Setup::createAnnotationMetadataConfiguration($metadata_paths, $dev_mode, $proxies_dir, $cache, $useSimpleAnnotationReader);
        $this->em = EntityManager::create($connection_options, $config);

        //YAML
        $yamlDriver = new YamlDriver(APPPATH . 'Models/Mappings');
        $config->setMetadataDriverImpl($yamlDriver);
        $loader = new ClassLoader($models_namespace, $models_path);
        $loader->register();
    }

}