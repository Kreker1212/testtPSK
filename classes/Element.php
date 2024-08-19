<?php

require_once 'Interface/RenderableInterface.php';

abstract class Element implements RenderableInterface
{
    protected $type;
    protected $payload;
    protected $parameters;
    protected $children;

    public function __construct($type, $payload = [], $parameters = [], $children = [])
    {
        $this->type = $type;
        $this->payload = $payload;
        $this->parameters = $parameters;
        $this->children = $children;
    }

    abstract public function render(): string;

    protected function renderChildren(): string
    {
        $html = '';
        foreach ($this->children as $child) {
            $html .= $child->render();
        }
        return $html;
    }

    protected function renderStyles(): string
    {
        $styles = [];
        foreach ($this->parameters as $key => $value) {
            switch ($key) {
                case 'align':
                case 'textAlign':
                    $styles[] = "text-align: $value;";
                    break;
                case 'backgroundColor':
                    $styles[] = "background-color: $value;";
                    break;
                case 'textColor':
                    $styles[] = "color: $value;";
                    break;
                case 'fontSize':
                    $fontSize = $value === 'large' ? '2em' : '1em';
                    $styles[] = "font-size: $fontSize;";
                    break;
            }
        }
        return implode(' ', $styles);
    }
}
