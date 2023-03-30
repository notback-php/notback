<?php

class ButtonElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "button";
        $this->className = "button";
        $this->update();
    }
}