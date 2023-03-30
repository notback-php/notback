<?php

class ThElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "th";
        $this->className = "th";
        $this->update();
    }
}