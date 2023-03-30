<?php

class HTMLElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "html";
        $this->isHTML = true;
        $this->update();
    }
}