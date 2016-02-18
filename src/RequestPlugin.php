<?php namespace Anomaly\RequestPlugin;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Illuminate\Http\Request;
use Twig_SimpleFunction;

/**
 * Class RequestPlugin
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\Streams\Addon\Plugin\Request
 */
class RequestPlugin extends Plugin
{

    /**
     * The request object from Laravel.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new RequestPlugin instance.
     *
     * @param \Illuminate\Http\Request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Return plugin functions.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction(
                'request_*',
                function ($name) {

                    $arguments = array_slice(func_get_args(), 1);

                    return call_user_func_array([$this->request, camel_case($name)], $arguments);
                }
            )
        ];
    }
}
