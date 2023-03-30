<?php

class SelectElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "select";
        $this->className = "select";
        $this->update();
    }
}