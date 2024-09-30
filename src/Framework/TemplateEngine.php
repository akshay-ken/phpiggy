<?php

declare(strict_types=1);

namespace Framework;


class TemplateEngine
{
    private array $globalTemplateData = [];

    public function __construct(private string $basePath) {}

    public function render(string $template, array $data = [])
    {
        extract($data, EXTR_SKIP);
        extract($this->globalTemplateData, EXTR_SKIP);
        ob_start(); # to store content in output buffer
        include $this->resolve($template);

        $output = ob_get_contents(); # return content from active buffer : string
        ob_end_clean(); # turn off output buffer
        return $output;
    }
    public function resolve(string $path)
    {
        return "{$this->basePath}/{$path}";
    }
    public function addGlobal(string $key, mixed $value)
    {
        $this->globalTemplateData[$key] = $value;
    }
}
