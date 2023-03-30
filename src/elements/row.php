<?php

class RowElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "row";
        $this->tag = "div";
        $this->flex();
        $this->flexDirection('row');
        $this->update();
    }
}