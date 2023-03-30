<?php

class UnorderedListElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "ul";
        $this->className = "ul";
        $this->update();
    }
}