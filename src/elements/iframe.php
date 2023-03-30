<?php

class iframeElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "iframe";
        $this->className = "iframe";
        $this->update();
    }
}