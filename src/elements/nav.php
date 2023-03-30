<?php

class NavigationElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "nav";
        $this->className = "nav";
        $this->update();
    }
}