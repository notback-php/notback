<?php

class MainElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "main";
        $this->tag = "main";
        $this->isOpenTag = true;
        $this->update();
    }
}