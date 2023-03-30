<?php


class InputElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "input";
        $this->className = "input";
        $this->isOpenTag = false;
        $this->update();
    }
}