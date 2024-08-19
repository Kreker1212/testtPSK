<?php

class Text extends Element
{
    public function render(): string
    {
        $styles = $this->renderStyles();
        return "<p style='$styles'>{$this->payload['text']}</p>";
    }
}
