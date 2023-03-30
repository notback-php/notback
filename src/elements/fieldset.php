<?php

class FieldsetElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "fieldset";
        $this->className = "fieldset";
        $this->update();
    }
}
