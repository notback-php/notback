<?php

class ScriptElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "script";
        $this->update();
    }
}