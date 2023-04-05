<?php

class SectionElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "section";
        $this->tag = "section";
        $this->isOpenTag = true;
        $this->update();
    }
}