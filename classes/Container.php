<?php

class Container extends Element
{
    public function render(): string
    {
        $styles = $this->renderStyles();
        $childrenHtml = $this->renderChildren();
        return "<div style='$styles'>$childrenHtml</div>";
    }
}
