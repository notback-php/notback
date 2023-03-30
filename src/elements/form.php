<?php

class FormElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "form";
        $this->tag = "form";
        $this->update();
    }
}