<?php

class TableElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "table";
        $this->className = "table";
        $this->update();
    }
}