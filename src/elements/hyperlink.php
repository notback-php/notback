<?php

class HyperlinkElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = 'a';
        $this->className = 'hyperlink';
        $this->update();
    }
}