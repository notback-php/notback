<?php

class BlockElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "block";
        $this->tag = "div";
        $this->isOpenTag = true;
        $this->update();
    }
}