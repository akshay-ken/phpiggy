<?php

declare(strict_types=1);

namespace Framework;

class Router {
    private array $routes = [];

    public function add(string $method ,string $path) {
        $path = $this->normalizePath($path);
        
        $this->routes[] = [
            'ptah' => $path,
            'method' => strtoupper($method)
        ];
    }
    private function normalizePath(string $path) : string {
        $path = trim($path, '/');
        $path = "/{$path}/";

        return $path;
    }
}