<?php

class TitleElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "title";
        $this->update();
    }
}