<?php namespace Anomaly\Streams\Addon\Tag\Request;

use Anomaly\Streams\Platform\Addon\Tag\TagAddon;

/**
 * Class RequestTag
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Tag\Request
 */
class RequestTag extends TagAddon
{

    /**
     * Get the value from a URI segment.
     *
     * @param int $segment
     * @return mixed
     */
    public function segment($segment = 1)
    {
        return app('request')->segment($this->getAttribute('segment', $segment));
    }

    /**
     * Get the segments as an array.
     *
     * @return mixed
     */
    public function segments()
    {
        return array_map(
            function ($segment) {
                return compact('segment');
            },
            app('request')->segments()
        );
    }

    /**
     * Get the value of the first segment.
     *
     * @return mixed
     */
    public function first()
    {
        return array_shift(app('request')->segments());
    }

    /**
     * Get the value of the last segment.
     *
     * @return mixed
     */
    public function last()
    {
        $segments = app('request')->segments();

        return end($segments);
    }

    /**
     * Return whether the request is secure or not.
     *
     * @return mixed
     */
    public function isSecure()
    {
        return app('request')->isSecure();
    }

    /**
     * Return the request path.
     *
     * @return mixed
     */
    public function path()
    {
        return app('request')->path();
    }

    /**
     * Return the full request string.
     *
     * @return mixed
     */
    public function full()
    {
        return app('request')->full();
    }

    /**
     * Override the calls to look for segment values.
     *
     * @param       $method
     * @param array $arguments
     * @return mixed|null
     */
    public function __call($method, array $arguments = [])
    {
        if (substr($method, 0, 8) == 'segment_') {

            return $this->segment(substr($method, 8));
        }

        return parent::__call($method, $arguments);
    }
}
