<?php

class DividerElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "divider";
        $this->tag = "hr";
        $this->isOpenTag = false;
        $this->update();
    }
}