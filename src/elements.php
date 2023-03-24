<?php 

require_once('element.php');


class HTMLElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "html";
        $this->isOpenTag = false;
        $this->isHTML = true;
        $this->update();
    }
}

class BodyElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "body";
        $this->tag = "body";
        $this->isOpenTag = true;
        $this->update();
    }
}

class HeadElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "head";
        $this->isOpenTag = true;
        $this->update();
    }
}

class TitleElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "title";
        $this->isOpenTag = true;
        $this->update();
    }
}

class ScriptElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "script";
        $this->isOpenTag = true;
        $this->update();
    }
}

class BlockElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "block";
        $this->tag = "div";
        $this->isOpenTag = true;
        $this->update();
    }
}

class FormElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "form";
        $this->tag = "form";
        $this->isOpenTag = true;
        $this->update();
    }
}

class DividerElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "divider";
        $this->tag = "hr";
        $this->isOpenTag = false;
        $this->update();
    }
}

class FooterElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "footer";
        $this->tag = "footer";
        $this->isOpenTag = true;
        $this->update();
    }
}

class GridElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "grid";
        $this->tag = "div";
        $this->css([
            "display" => "grid",
        ]);
        $this->isOpenTag = true;
        $this->update();
    }
}

class ColumnElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "column";
        $this->tag = "div";
        $this->css([
            "display" => "flex",
            "flex-direction" => "column",
        ]);
        $this->isOpenTag = true;
        $this->update();
    }
}

class RowElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->className = "row";
        $this->tag = "div";
        $this->css([
            "display" => "flex",
            "flex-direction" => "row",
        ]);
        $this->isOpenTag = true;
        $this->update();
    }
}

class TextElement extends Element {
    public function create($content, $tag = 'span', $name = 'text') {
        $this->content = $content;
        $this->tag = $tag;
        $this->className = $name;
        $this->isOpenTag = true;
        $this->update();
    }
}

class HyperlinkElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = 'a';
        $this->className = 'hyperlink';
        $this->isOpenTag = true;
        $this->update();
    }
}

class ImageElement extends Element {
    public function create($content) {
        $this->tag = "img";
        $this->className = "image";
        $this->isOpenTag = false;
        $this->update();
    }
}

class ButtonElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "button";
        $this->className = "button";
        $this->isOpenTag = true;
        $this->update();
    }
}

class CheckboxElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "input";
        $this->type = "checkbox";
        $this->className = "checkbox";
        $this->isOpenTag = false;
        $this->update();
    }
}

class LabelElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "label";
        $this->className = "label";
        $this->isOpenTag = true;
        $this->update();
    }
}

class TableElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "table";
        $this->className = "table";
        $this->isOpenTag = true;
        $this->update();
    }

    function cellSpacing($cellSpacing) {
        return  $this->setAttribute('cellspacing', $cellSpacing);
    }
}

class TrElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "tr";
        $this->className = "tr";
        $this->isOpenTag = true;
        $this->update();
    }
}

class ThElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "th";
        $this->className = "th";
        $this->isOpenTag = true;
        $this->update();
    }
}

class TdElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "td";
        $this->className = "td";
        $this->isOpenTag = true;
        $this->update();
    }
}

class TableHeaderElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "thead";
        $this->className = "thead";
        $this->isOpenTag = true;
        $this->update();
    }
}

class TableBodyElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "tbody";
        $this->className = "tbody";
        $this->isOpenTag = true;
        $this->update();
    }
}

class TableFooterElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "tfoot";
        $this->className = "tfoot";
        $this->isOpenTag = true;
        $this->update();
    }
}

class LiElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "li";
        $this->className = "li";
        $this->isOpenTag = true;
        $this->update();
    }
}

class LineBreakElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "br";
        $this->isOpenTag = false;
        $this->update();
    }
}

class TextInputElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "input";
        $this->type = "text";
        $this->className = "text-input";
        $this->isOpenTag = false;
        $this->update();
    }
}

class SelectElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "select";
        $this->className = "select";
        $this->isOpenTag = true;
        $this->update();
    }
}

class OptionElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "option";
        $this->className = "option";
        $this->isOpenTag = true;
        $this->update();
    }
}

class TextAreaElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "textarea";
        $this->className = "textarea";
        $this->isOpenTag = true;
        $this->update();
    }
}

class InputElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "input";
        $this->className = "input";
        $this->isOpenTag = false;
        $this->update();
    }
}

class iframeElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "iframe";
        $this->className = "iframe";
        $this->isOpenTag = true;
        $this->update();
    }
}

class OrderedListElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "ol";
        $this->className = "ol";
        $this->isOpenTag = true;
        $this->update();
    }
}

class UnorderedListElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "ul";
        $this->className = "ul";
        $this->isOpenTag = true;
        $this->update();
    }
}

class ListItemElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "li";
        $this->className = "li";
        $this->isOpenTag = true;
        $this->update();
    }
}

class NavigationElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "nav";
        $this->className = "nav";
        $this->isOpenTag = true;
        $this->update();
    }
}

class RadioElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "input";
        $this->type = "radio";
        $this->className = "radio";
        $this->isOpenTag = false;
        $this->update();
    }
}

class FieldsetElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "fieldset";
        $this->className = "fieldset";
        $this->isOpenTag = true;
        $this->update();
    }
}

class VideoElement extends Element {
    public function create($content) {
        $this->content = $content;
        $this->tag = "video";
        $this->className = "video";
        $this->isOpenTag = true;
        $this->update();
    }
}

/* Elements */

function HTML(...$content) {
    $element = new HTMLElement();
    $element->create($content);
    return $element;
}

function Body(...$content) {
    $element = new BodyElement();
    $element->create($content);
    $element->p(0);
    $element->m(0);
    return $element;
}

function Form(...$content) {
    $element = new FormElement();
    $element->create($content);
    return $element;
}

function Divider(...$content) {
    $element = new DividerElement();
    $element->create($content);
    return $element;
}

function Head(...$content) {
    $element = new HeadElement();
    $element->create($content);
    return $element;
}

function Title(...$content) {
    $element = new TitleElement();
    $element->create($content);
    return $element;
}

function Script(...$content) {
    $element = new ScriptElement();
    $element->create($content);
    return $element;
}

function Block(...$content) {        
    $element = new BlockElement();
    $element->create($content);
    return $element;
}

function Column(...$content) {        
    $element = new ColumnElement();
    $element->create($content);
    return $element;
}

function Grid(...$content) {        
    $element = new GridElement();
    $element->create($content);
    return $element;
}

function Footer(...$content) {        
    $element = new FooterElement();
    $element->create($content);
    return $element;
}

function Row(...$content) {        
    $element = new RowElement();
    $element->create($content);
    return $element;
}

function Text(...$content) {        
    $element = new TextElement();
    $element->create($content);
    return $element;
}

function Image(...$content) {        
    $element = new ImageElement();
    $element->create($content);
    return $element;
}

function Hyperlink(...$content) {  
    $element = new HyperlinkElement();
    $element->create($content);
    return $element;
}

function H1(...$content) {        
    $element = new TextElement();
    $element->create($content, 'h1');
    $element->fontSize(100);
    return $element;
}

function H2(...$content) {        
    $element = new TextElement();
    $element->create($content, 'h2');
    $element->fontSize(70);
    return $element;
}

function H3(...$content) {        
    $element = new TextElement();
    $element->create($content, 'h3');
    $element->fontSize(40);
    return $element;
}

function H4(...$content) {        
    $element = new TextElement();
    $element->create($content, 'h4');
    $element->fontSize(30);
    return $element;
}

function H5(...$content) {        
    $element = new TextElement();
    $element->create($content, 'h5');
    $element->fontSize(24);
    return $element;
}

function H6(...$content) {        
    $element = new TextElement();
    $element->create($content, 'h6');
    $element->fontSize(20);
    return $element;
}

function Code(...$content) {
    $element = new TextElement();
    $element->create($content, 'code');
    $element->fontSize(20);
    return $element;
}

function LineBreak() {
    $element = new LineBreakElement();
    $element->create(null);
    return $element;
}

function P(...$content) {        
    $element = new TextElement();
    $element->create($content);
    return $element;
}

function Pre(...$content) {        
    $element = new TextElement();
    $element->create($content, 'pre');
    return $element;
}

function Button(...$content) {
    $element = new ButtonElement();
    $element->create($content);
    return $element;
}

function Table(...$content) {
    $element = new TableElement();
    $element->create($content);
    return $element;
}

function Tr(...$content) {
    $element = new TrElement();
    $element->create($content);
    return $element;
}

function Th(...$content) {
    $element = new ThElement();
    $element->create($content);
    return $element;
}

function Td(...$content) {
    $element = new TdElement();
    $element->create($content);
    return $element;
}

function THead(...$content) {
    $element = new TableHeaderElement();
    $element->create($content);
    return $element;
}

function TBody(...$content) {
    $element = new TableBodyElement();
    $element->create($content);
    return $element;
}

function TFoot(...$content) {
    $element = new TableFooterElement();
    $element->create($content);
    return $element;
}

function Checkbox() {
    $element = new CheckboxElement();
    $element->create(null);
    return $element;
}

function Label(...$content) {
    $element = new LabelElement();
    $element->create($content);
    return $element;
}

function TextInput() {
    $element = new TextInputElement();
    $element->create(null);
    return $element;
}

function Select(...$content) {
    $element = new SelectElement();
    $element->create($content);
    return $element;
}

function Option(...$content) {
    $element = new OptionElement();
    $element->create($content);
    return $element;
}

function TextArea(...$content) {
    $element = new TextAreaElement();
    $element->create($content);
    return $element;
}

function Input(...$content) {
    $element = new InputElement();
    $element->create($content);
    return $element;
}

function Legend(...$content) {
    $element = new LegendElement();
    $element->create($content);
    return $element;
}

function Iframe(...$content) {
    $element = new IframeElement();
    $element->create($content);
    return $element;
}

function UnorderedList(...$content) {
    $element = new UnorderedListElement();
    $element->create($content);
    return $element;
}

function OrderedList(...$content) {
    $element = new OrderedListElement();
    $element->create($content);
    return $element;
}

function ListItem(...$content) {
    $element = new ListItemElement();
    $element->create($content);
    return $element;
}

function Navigation(...$content) {
    $element = new NavigationElement();
    $element->create($content);
    return $element;
}


function Radio() {
    $element = new RadioElement();
    $element->create(null);
    return $element;
}

function Fieldset(...$content) {
    $element = new FieldsetElement();
    $element->create($content);
    return $element;
}

function Video(...$content) {
    $element = new VideoElement();
    $element->create($content);
    return $element;
}