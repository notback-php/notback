<?php

class TdElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "td";
        $this->className = "td";
        $this->update();
    }
}