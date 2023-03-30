<?php

class ListItemElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "li";
        $this->className = "li";
        $this->update();
    }
}