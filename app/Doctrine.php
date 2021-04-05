<?php
//DEFINE ENV
define('APPPATH', dirname(__FILE__) . '/');
define('ENVIRONMENT', 'development');
chdir(APPPATH);

//CALL THE ENTITY MANAGER
require __DIR__ . '/Libraries/Doctrine.php';

//GET THE HELPERS
foreach ($GLOBALS as $helperSetCandidate) {
    if ($helperSetCandidate instanceof \Symfony\Component\Console\Helper\HelperSet) {
        $helperSet = $helperSetCandidate;
        break;
    }
}

//CALL THE ENTITY
$doctrine = new App\Libraries\Doctrine;
$em = $doctrine->em;

//MAKE THE CONNECTION
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

\Doctrine\ORM\Tools\Console\ConsoleRunner::run($helperSet);