<?php

class VideoElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "video";
        $this->className = "video";
        $this->update();
    }
}