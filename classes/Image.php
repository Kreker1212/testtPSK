<?php

class Image extends Element
{
    public function render(): string
    {
        $url = $this->payload['image']['url'];
        $styles = $this->renderStyles();
        return "<img src='$url' style='$styles' alt='Image'/>";
    }
}
