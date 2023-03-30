<?php

class ColumnElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "column";
        $this->tag = "div";
        $this->flex();
        $this->flexDirection('column');
        $this->update();
    }
}