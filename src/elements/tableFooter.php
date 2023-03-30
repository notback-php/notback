<?php

class TableFooterElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "tfoot";
        $this->className = "tfoot";
        $this->update();
    }
}