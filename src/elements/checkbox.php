<?php

class CheckboxElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "input";
        $this->type = "checkbox";
        $this->className = "checkbox";
        $this->isOpenTag = false;
        $this->update();
    }
}