<?php

class TableHeaderElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "thead";
        $this->className = "thead";
        $this->update();
    }
}