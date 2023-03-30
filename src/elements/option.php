<?php

class OptionElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "option";
        $this->className = "option";
        $this->update();
    }
}