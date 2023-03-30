<?php

class TextAreaElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "textarea";
        $this->className = "textarea";
        $this->update();
    }
}