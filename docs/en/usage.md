# Usage

To use the request object simply call any of the public methods from the request class prefixed with `request_*`.

For documentation on the request class and what methods are available check out the [Laravel Documentation](https://laravel.com/docs/5.1/requests).

    {% verbatim %}{{ request_url(1) }}{% endverbatim %} // http://pyrocms.com/documentation/request-plugin/usage

    {% verbatim %}{{ request_segment(1) }}{% endverbatim %} // documentation

    {% verbatim %}{{ request_is("admin/*") ? "Nope" : "Yes" }}{% endverbatim %} // Nope

    {% verbatim %}{{ request_route().getParameter('project') }}{% endverbatim %} // request-plugin
