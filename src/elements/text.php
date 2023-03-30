<?php

class TextElement extends Element {
    public function create($content, $tag = 'span', $name = 'text') {
        $this->content = $content;
        $this->tag = $tag;
        $this->className = $name;
        $this->update();
    }
}