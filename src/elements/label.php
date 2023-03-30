<?php

class LabelElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "label";
        $this->className = "label";
        $this->update();
    }
}