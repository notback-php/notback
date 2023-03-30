<?php

class BodyElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "body";
        $this->tag = "body";
        $this->update();
    }
}