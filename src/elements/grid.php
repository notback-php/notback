<?php

class GridElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "grid";
        $this->tag = "div";
        $this->grid();
        $this->update();
    }
}