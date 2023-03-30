<?php

class HeadElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "head";
        $this->update();
    }
}