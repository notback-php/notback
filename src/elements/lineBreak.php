<?php

class LineBreakElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "br";
        $this->isOpenTag = false;
        $this->update();
    }
}
