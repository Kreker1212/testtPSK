<?php

class Button extends Element
{
    public function render(): string
    {
        $text = $this->payload['text'];
        $link = $this->payload['link']['payload'];
        $styles = $this->renderStyles();
        return "<a href='$link' style='$styles' class='btn'>$text</a>";
    }
}
