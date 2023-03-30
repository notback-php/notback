<?php

class ImageElement extends Element {
    public function create($content) {
        $this->tag = "img";
        $this->className = "image";
        $this->isOpenTag = false;
        $this->update();
    }
}