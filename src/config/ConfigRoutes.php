<?php

namespace Ken\SpiderAdmin\Config;

trait ConfigRoutes
{
    protected function prefixRoutes()
    {
        $this->config('spider.config.route_prefix');
    }

    protected function loginPath()
    {
        $this->prefixRoutes().'/login';
    }

    protected function redirectTo()
    {
        $this->prefixRoutes().'/dashboard';
    }

    protected function redirectAfterLogout()
    {
        $this->prefixRoutes();
    }
}