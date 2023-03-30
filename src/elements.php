<?php 

require_once('element.php');
require_once('elements/index.php');

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
    $element->create($content, 'p');
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