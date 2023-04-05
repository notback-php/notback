<?php

class AsideElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "aside";
        $this->tag = "aside";
        $this->isOpenTag = true;
        $this->update();
    }
}