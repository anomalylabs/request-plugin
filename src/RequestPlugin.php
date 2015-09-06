<?php namespace Anomaly\RequestPlugin;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Illuminate\Http\Request;
use Twig_SimpleFunction;

/**
 * Class RequestPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Plugin\Request
 */
class RequestPlugin extends Plugin
{

    /**
     * Supported functions.
     *
     * @var array
     */
    protected $functions = [
        'ip',
        'is',
        'all',
        'get',
        'url',
        'has',
        'ajax',
        'json',
        'root',
        'path',
        'only',
        'user',
        'input',
        'query',
        'route',
        'cookie',
        'except',
        'exists',
        'header',
        'method',
        'secure',
        'server',
        'segment',
        'segments',
        'full_url',
        'has_cookie',
        'decoded_path',
    ];

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

                    $name = camel_case($name);

                    return call_user_func_array([$this->request, $name], $arguments);
                },
                [
                    'is_safe' => ['html']
                ]
            )
        ];
    }
}
