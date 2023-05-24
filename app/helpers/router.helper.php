<?php

class Router
{
    private $routes = [];
    private $notFound;
    public function register($url, $file)
    {
        $this->routes[$url] = $file;
    }
    public function registerNotFound($file)
    {
        $this->notFound = $file;
    }
    public function getRoutes()
    {
        return $this->routes;
    }
    public function getRoute($url) {
        return $this->routes[$url] ?? null;
    }
    public function route()
    {
        $componentes_url = parse_url($_SERVER['REQUEST_URI']);
        $ruta = $componentes_url['path'];
        if (isset($this->routes[$ruta])) {
            return $this->routes[$ruta];
        } else {
            return $this->notFound;
        }
    }
    public function getUrlParts() {
        $componentes_url = parse_url($_SERVER['REQUEST_URI']);
        $ruta = $componentes_url['path'];
        $url_parts = explode('/', $ruta);
        array_shift($url_parts);
        return $url_parts;
    }
}