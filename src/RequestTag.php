<?php namespace Anomaly\Streams\Tag\Request;

use Streams\Core\Addon\TagAbstract;

class RequestTag extends TagAbstract
{
    /**
     * Return a segment of the request.
     *
     * @return string
     */
    public function segment($segment = 1)
    {
        return \Request::segment($this->getAttribute('segment', 0, $segment));
    }

    /**
     * Return the segments of the request.
     *
     * @return array
     */
    public function segments()
    {
        return \Request::segments();
    }

    /**
     * Return the first segment of the request.
     *
     * @return mixed
     */
    public function first()
    {
        return array_shift(\Request::segments());
    }

    /**
     * Return the last segment of the request.
     *
     * @return mixed
     */
    public function last()
    {
        $segments = \Request::segments();

        return end($segments);
    }

    /**
     * Return a boolean flagging the request as secure or not.
     *
     * @return bool
     */
    public function isSecure()
    {
        return \Request::isSecure();
    }

    /**
     * Request path
     *
     * @return string
     */
    public function path()
    {
        return \Request::path();
    }

    /**
     * Magically map segments.
     *
     * @param $method
     * @param $arguments
     * @return null|string
     */
    public function __call($method, $arguments)
    {
        if (substr($method, 0, 8) == 'segment_') {
            return $this->segment(substr($method, 8));
        }

        return parent::__call($method, $arguments);
    }
}
