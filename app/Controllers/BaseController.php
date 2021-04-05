<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class ContactController extends BaseController
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param LoggerInterface $logger
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.: $this->session = \Config\Services::session();
    }

    public function getSortOptions($sort_by)
    {
        $sort_options = array();
        switch ($sort_by) {
            case 2:
                {
                    $sort_options['col'] = 'date';
                    $sort_options['dir'] = 'desc';
                    break;
                }
            case 3:
                {
                    $sort_options['col'] = 'name';
                    $sort_options['dir'] = 'asc';
                    break;
                }
            case 4:
                {
                    $sort_options['col'] = 'name';
                    $sort_options['dir'] = 'desc';
                    break;
                }
            case 5:
                {
                    $sort_options['col'] = 'rating';
                    $sort_options['dir'] = 'desc';
                    break;
                }
            default:
                {
                    $sort_options['col'] = 'date';
                    $sort_options['dir'] = 'asc';
                    break;
                }
        }

        return $sort_options;
    }

    public function getLocale()
    {
        return service('request')->getLocale();
    }
}
