<?php

class FooterElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "footer";
        $this->tag = "footer";
        $this->update();
    }
}