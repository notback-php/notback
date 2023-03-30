<?php

class TrElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "tr";
        $this->className = "tr";
        $this->update();
    }
}