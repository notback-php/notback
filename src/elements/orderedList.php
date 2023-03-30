<?php

class OrderedListElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "ol";
        $this->className = "ol";
        $this->update();
    }
}