<?php namespace Anomaly\Streams\Addon\Plugin\Request;

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
     * The request object from Laravel.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new input extension
     *
     * @param \Illuminate\Http\Request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('segment', [$this->request, 'segment']),
        ];
    }
}
