<?php

class TextInputElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "input";
        $this->type = "text";
        $this->className = "text-input";
        $this->isOpenTag = false;
        $this->update();
    }
}