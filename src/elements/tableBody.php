<?php

class TableBodyElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "tbody";
        $this->className = "tbody";
        $this->update();
    }
}