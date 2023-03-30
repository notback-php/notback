<?php

class RadioElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "input";
        $this->type = "radio";
        $this->className = "radio";
        $this->isOpenTag = false;
        $this->update();
    }
}