<?php 


class Element {

    public $uniqueClass = '';

    public $innerHTML = '';
    public $content = [];
    public $styleAttributes = [];
    public $attributes = [];
    public $className = '';
    public $tag = 'div';
    public $isOpenTag = true; 
    public $isHTML = false; 
    public $type;


    public function update() {

        if ($this->uniqueClass == '' && $this->className != '') {
            $this->uniqueClass = $this->randomClassName();
            $this->class($this->uniqueClass);
        }

        PageStyle::addStylingClass($this->uniqueClass, $this->styleAttributes);

        if (isset($this->type)) {
            $this->setAttribute('type', $this->type);
        }

        $attributesHTML = "";
        foreach ($this->attributes as $attributeKey => $attributeValue) {
            $attributesHTML .= "$attributeKey=\"$attributeValue\" ";
        }

        if ($this->isOpenTag) {
            // Open tag - potential content
            if (is_array($this->content) && count($this->content) > 0 ) {
            
                $innerHTML = "";
                foreach ($this->content as $contentPart) {
                    if (is_string($contentPart)) {
                       $innerHTML .= $contentPart;
                    } else {
                        $innerHTML .= $this->getInnerHTMLFromContent($contentPart);
                    }
                }

                $this->innerHTML = "<$this->tag $attributesHTML>" . $innerHTML . "</$this->tag>";

            } else if (is_object($this->content)) {

                // Content is an object
                if (!empty($this->content->innerHTML)) {
                    $this->innerHTML = "<$this->tag $attributesHTML>" . $this->content->innerHTML . "</$this->tag>";
                }

            } else {
                if (is_string($this->content)) {
                    
                    // Content is a string
                    $this->innerHTML = $this->content;

                } else if (empty($this->content)) {
                    
                    // Element with no / empty content 
                    $this->innerHTML = "<$this->tag $attributesHTML></$this->tag>";

                } else {
                    // Content is something else
                    throw new exception("Element content is not a string, array or object");
                }
            } 
        } else if ($this->isHTML) {
            $this->innerHTML = $this->content[0];
        } else {
            // Not open tag - no content 
            $this->innerHTML = "<$this->tag $attributesHTML />";
        }
    }


    function getInnerHTMLFromContent($contentElement) {

        $innerHTML = "";

        if (!empty($contentElement->innerHTML)) {
            $innerHTML .= $contentElement->innerHTML; 
        } else if (is_array($contentElement)) {
            $contentElements = $contentElement;
            foreach ($contentElements as $contentElement) {
                $innerHTML .= $this->getInnerHTMLFromContent($contentElement);
            }
        }

        return $innerHTML;
    }


    function randomClassName() {
        return $this->className . "_" . uniqid();
    }


    /* Attributes */
    function accept($val = null) { return $this->setAttribute('accept', $val ?? null); }
    function acceptCharset($val = null) { return $this->setAttribute('accept-charset', $val ?? null); }
    function accessKey($val = null) { return $this->setAttribute('accesskey', $val ?? null); }
    function action($val = null) { return $this->setAttribute('action', $val ?? null); }
    function align($val = null) { return $this->setAttribute('align', $val ?? null); }
    function alt($val = null) { return $this->setAttribute('alt', $val ?? null); }
    function async($val = null) { return $this->setAttribute('async', $val ?? null); }
    function autocomplete($val = null) { return $this->setAttribute('autocomplete', $val ?? null); }
    function autofocus($val = null) { return $this->setAttribute('autofocus', $val ?? null); }
    function autoplay($val = null) { return $this->setAttribute('autoplay', $val ?? null); }
    function bgcolor($val = null) { return $this->setAttribute('bgcolor', $val ?? null); }
    function buffered($val = null) { return $this->setAttribute('buffered', $val ?? null); }
    function challenge($val = null) { return $this->setAttribute('challenge', $val ?? null); }
    function charset($val = null) { return $this->setAttribute('charset', $val ?? null); }
    function checked($val = null) { return $this->setAttribute('checked', $val ?? null); }
    function cite($val = null) { return $this->setAttribute('cite', $val ?? null); }
    function class($val = null) { return $this->setAttribute('class', $val ?? null); }
    function classid($val = null) { return $this->setAttribute('classid', $val ?? null); }
    function cols($val = null) { return $this->setAttribute('cols', $val ?? null); }
    function colspan($val = null) { return $this->setAttribute('colspan', $val ?? null); }
    function contenteditable($val = null) { return $this->setAttribute('contenteditable', $val ?? null); }
    function contextmenu($val = null) { return $this->setAttribute('contextmenu', $val ?? null); }
    function controls($val = null) { return $this->setAttribute('controls', $val ?? null); }
    function coords($val = null) { return $this->setAttribute('coords', $val ?? null); }
    function crossorigin($val = null) { return $this->setAttribute('crossorigin', $val ?? null); }
    function data($val = null) { return $this->setAttribute('data', $val ?? null); }
    function datetime($val = null) { return $this->setAttribute('datetime', $val ?? null); }
    function default($val = null) { return $this->setAttribute('default', $val ?? null); }
    function defer($val = null) { return $this->setAttribute('defer', $val ?? null); }
    function dir($val = null) { return $this->setAttribute('dir', $val ?? null); }
    function dirname($val = null) { return $this->setAttribute('dirname', $val ?? null); }
    function disabled($val = null) { return $this->setAttribute('disabled', $val ?? null); }
    function download($val = null) { return $this->setAttribute('download', $val ?? null); }
    function draggable($val = null) { return $this->setAttribute('draggable', $val ?? null); }
    function dropzone($val = null) { return $this->setAttribute('dropzone', $val ?? null); }
    function enctype($val = null) { return $this->setAttribute('enctype', $val ?? null); }
    function for($val = null) { return $this->setAttribute('for', $val ?? null); }
    function form($val = null) { return $this->setAttribute('form', $val ?? null); }
    function formaction($val = null) { return $this->setAttribute('formaction', $val ?? null); }
    function headers($val = null) { return $this->setAttribute('headers', $val ?? null); }
    function imageHeight($val = null) { return $this->setAttribute('height', $val ?? null); }
    function high($val = null) { return $this->setAttribute('high', $val ?? null); }
    function href($val = null) { return $this->setAttribute('href', $val ?? null); }
    function hreflang($val = null) { return $this->setAttribute('hreflang', $val ?? null); }
    function httpEquiv($val = null) { return $this->setAttribute('http-equiv', $val ?? null); }
    function icon($val = null) { return $this->setAttribute('icon', $val ?? null); }
    function id($val = null) { return $this->setAttribute('id', $val ?? null); }
    function ismap($val = null) { return $this->setAttribute('ismap', $val ?? null); }
    function itemprop($val = null) { return $this->setAttribute('itemprop', $val ?? null); }
    function keytype($val = null) { return $this->setAttribute('keytype', $val ?? null); }
    function kind($val = null) { return $this->setAttribute('kind', $val ?? null); }
    function label($val = null) { return $this->setAttribute('label', $val ?? null); }
    function lang($val = null) { return $this->setAttribute('lang', $val ?? null); }
    function language($val = null) { return $this->setAttribute('language', $val ?? null); }
    function list($val = null) { return $this->setAttribute('list', $val ?? null); }
    function loop($val = null) { return $this->setAttribute('loop', $val ?? null); }
    function low($val = null) { return $this->setAttribute('low', $val ?? null); }
    function manifest($val = null) { return $this->setAttribute('manifest', $val ?? null); }
    function max($val = null) { return $this->setAttribute('max', $val ?? null); }
    function maxlength($val = null) { return $this->setAttribute('maxlength', $val ?? null); }
    function media($val = null) { return $this->setAttribute('media', $val ?? null); }
    function method($val = null) { return $this->setAttribute('method', $val ?? null); }
    function min($val = null) { return $this->setAttribute('min', $val ?? null); }
    function multiple($val = null) { return $this->setAttribute('multiple', $val ?? null); }
    function muted($val = null) { return $this->setAttribute('muted', $val ?? null); }
    function name($val = null) { return $this->setAttribute('name', $val ?? null); }
    function novalidate($val = null) { return $this->setAttribute('novalidate', $val ?? null); }
    function open($val = null) { return $this->setAttribute('open', $val ?? null); }
    function optimum($val = null) { return $this->setAttribute('optimum', $val ?? null); }
    function pattern($val = null) { return $this->setAttribute('pattern', $val ?? null); }
    function ping($val = null) { return $this->setAttribute('ping', $val ?? null); }
    function poster($val = null) { return $this->setAttribute('poster', $val ?? null); }
    function preload($val = null) { return $this->setAttribute('preload', $val ?? null); }
    function placeholder($val = null) { return $this->setAttribute('placeholder', $val ?? null); }
    function playsInline($val = null) { return $this->setAttribute('playsinline', $val ?? null); }
    function radiogroup($val = null) { return $this->setAttribute('radiogroup', $val ?? null); }
    function readonly($val = null) { return $this->setAttribute('readonly', $val ?? null); }
    function rel($val = null) { return $this->setAttribute('rel', $val ?? null); }
    function required($val = null) { return $this->setAttribute('required', $val ?? null); }
    function reversed($val = null) { return $this->setAttribute('reversed', $val ?? null); }
    function rows($val = null) { return $this->setAttribute('rows', $val ?? null); }
    function rowspan($val = null) { return $this->setAttribute('rowspan', $val ?? null); }
    function sandbox($val = null) { return $this->setAttribute('sandbox', $val ?? null); }
    function scope($val = null) { return $this->setAttribute('scope', $val ?? null); }
    function scoped($val = null) { return $this->setAttribute('scoped', $val ?? null); }
    function seamless($val = null) { return $this->setAttribute('seamless', $val ?? null); }
    function selected($val = null) { return $this->setAttribute('selected', $val ?? null); }
    function shape($val = null) { return $this->setAttribute('shape', $val ?? null); }
    function size($val = null) { return $this->setAttribute('size', $val ?? null); }
    function sizes($val = null) { return $this->setAttribute('sizes', $val ?? null); }
    function span($val = null) { return $this->setAttribute('span', $val ?? null); }
    function spellcheck($val = null) { return $this->setAttribute('spellcheck', $val ?? null); }
    function src($val = null) { return $this->setAttribute('src', $val ?? null); }
    function srcdoc($val = null) { return $this->setAttribute('srcdoc', $val ?? null); }
    function srclang($val = null) { return $this->setAttribute('srclang', $val ?? null); }
    function srcset($val = null) { return $this->setAttribute('srcset', $val ?? null); }
    function start($val = null) { return $this->setAttribute('start', $val ?? null); }
    function step($val = null) { return $this->setAttribute('step', $val ?? null); }
    function style($val = null) { return $this->setAttribute('style', $val ?? null); }
    function tabindex($val = null) { return $this->setAttribute('tabindex', $val ?? null); }
    function target($val = null) { return $this->setAttribute('target', $val ?? null); }
    function title($val = null) { return $this->setAttribute('title', $val ?? null); }
    function type($val = null) { return $this->setAttribute('type', $val ?? null); }
    function usemap($val = null) { return $this->setAttribute('usemap', $val ?? null); }
    function value($val = null) { return $this->setAttribute('value', $val ?? null); }
    function imageWidth($val = null) { return $this->setAttribute('width', $val ?? null); }
    function wrap($val = null) { return $this->setAttribute('wrap', $val ?? null); }
    // function content($val = null) { return $this->setAttribute('content', $val ?? null); }
    // function hidden($val = null) { return $this->setAttribute('hidden', $val ?? null); }

    function onabort($val = null) { return $this->setAttribute('onabort', $val ?? null); }
    function onafterprint($val = null) { return $this->setAttribute('onafterprint', $val ?? null); }
    function onbeforeprint($val = null) { return $this->setAttribute('onbeforeprint', $val ?? null); }
    function onbeforeunload($val = null) { return $this->setAttribute('onbeforeunload', $val ?? null); }
    function onblur($val = null) { return $this->setAttribute('onblur', $val ?? null); }
    function oncanplay($val = null) { return $this->setAttribute('oncanplay', $val ?? null); }
    function oncanplaythrough($val = null) { return $this->setAttribute('oncanplaythrough', $val ?? null); }
    function onchange($val = null) { return $this->setAttribute('onchange', $val ?? null); }
    function onclick($val = null) { return $this->setAttribute('onclick', $val ?? null); }
    function oncontextmenu($val = null) { return $this->setAttribute('oncontextmenu', $val ?? null); }
    function oncopy($val = null) { return $this->setAttribute('oncopy', $val ?? null); }
    function oncuechange($val = null) { return $this->setAttribute('oncuechange', $val ?? null); }
    function oncut($val = null) { return $this->setAttribute('oncut', $val ?? null); }
    function ondblclick($val = null) { return $this->setAttribute('ondblclick', $val ?? null); }
    function ondrag($val = null) { return $this->setAttribute('ondrag', $val ?? null); }
    function ondragend($val = null) { return $this->setAttribute('ondragend', $val ?? null); }
    function ondragenter($val = null) { return $this->setAttribute('ondragenter', $val ?? null); }
    function ondragleave($val = null) { return $this->setAttribute('ondragleave', $val ?? null); }
    function ondragover($val = null) { return $this->setAttribute('ondragover', $val ?? null); }
    function ondragstart($val = null) { return $this->setAttribute('ondragstart', $val ?? null); }
    function ondrop($val = null) { return $this->setAttribute('ondrop', $val ?? null); }
    function ondurationchange($val = null) { return $this->setAttribute('ondurationchange', $val ?? null); }
    function onemptied($val = null) { return $this->setAttribute('onemptied', $val ?? null); }
    function onended($val = null) { return $this->setAttribute('onended', $val ?? null); }
    function onerror($val = null) { return $this->setAttribute('onerror', $val ?? null); }
    function onfocus($val = null) { return $this->setAttribute('onfocus', $val ?? null); }
    function onhashchange($val = null) { return $this->setAttribute('onhashchange', $val ?? null); }
    function oninput($val = null) { return $this->setAttribute('oninput', $val ?? null); }
    function oninvalid($val = null) { return $this->setAttribute('oninvalid', $val ?? null); }
    function onkeydown($val = null) { return $this->setAttribute('onkeydown', $val ?? null); }
    function onkeypress($val = null) { return $this->setAttribute('onkeypress', $val ?? null); }
    function onkeyup($val = null) { return $this->setAttribute('onkeyup', $val ?? null); }
    function onload($val = null) { return $this->setAttribute('onload', $val ?? null); }
    function onloadeddata($val = null) { return $this->setAttribute('onloadeddata', $val ?? null); }
    function onloadedmetadata($val = null) { return $this->setAttribute('onloadedmetadata', $val ?? null); }
    function onloadstart($val = null) { return $this->setAttribute('onloadstart', $val ?? null); }
    function onmessage($val = null) { return $this->setAttribute('onmessage', $val ?? null); }
    function onmousedown($val = null) { return $this->setAttribute('onmousedown', $val ?? null); }
    function onmousemove($val = null) { return $this->setAttribute('onmousemove', $val ?? null); }
    function onmouseout($val = null) { return $this->setAttribute('onmouseout', $val ?? null); }
    function onmouseover($val = null) { return $this->setAttribute('onmouseover', $val ?? null); }
    function onmouseup($val = null) { return $this->setAttribute('onmouseup', $val ?? null); }
    function onmousewheel($val = null) { return $this->setAttribute('onmousewheel', $val ?? null); }
    function onoffline($val = null) { return $this->setAttribute('onoffline', $val ?? null); }
    function ononline($val = null) { return $this->setAttribute('ononline', $val ?? null); }
    function onpagehide($val = null) { return $this->setAttribute('onpagehide', $val ?? null); }
    function onpageshow($val = null) { return $this->setAttribute('onpageshow', $val ?? null); }
    function onpaste($val = null) { return $this->setAttribute('onpaste', $val ?? null); }
    function onpause($val = null) { return $this->setAttribute('onpause', $val ?? null); }
    function onplay($val = null) { return $this->setAttribute('onplay', $val ?? null); }
    function onplaying($val = null) { return $this->setAttribute('onplaying', $val ?? null); }
    function onpopstate($val = null) { return $this->setAttribute('onpopstate', $val ?? null); }
    function onprogress($val = null) { return $this->setAttribute('onprogress', $val ?? null); }
    function onratechange($val = null) { return $this->setAttribute('onratechange', $val ?? null); }
    function onreset($val = null) { return $this->setAttribute('onreset', $val ?? null); }
    function onresize($val = null) { return $this->setAttribute('onresize', $val ?? null); }
    function onscroll($val = null) { return $this->setAttribute('onscroll', $val ?? null); }
    function onsearch($val = null) { return $this->setAttribute('onsearch', $val ?? null); }
    function onseeked($val = null) { return $this->setAttribute('onseeked', $val ?? null); }
    function onseeking($val = null) { return $this->setAttribute('onseeking', $val ?? null); }
    function onselect($val = null) { return $this->setAttribute('onselect', $val ?? null); }
    function onshow($val = null) { return $this->setAttribute('onshow', $val ?? null); }
    function onstalled($val = null) { return $this->setAttribute('onstalled', $val ?? null); }
    function onstorage($val = null) { return $this->setAttribute('onstorage', $val ?? null); }
    function onsubmit($val = null) { return $this->setAttribute('onsubmit', $val ?? null); }
    function onsuspend($val = null) { return $this->setAttribute('onsuspend', $val ?? null); }
    function ontimeupdate($val = null) { return $this->setAttribute('ontimeupdate', $val ?? null); }
    function onunload($val = null) { return $this->setAttribute('onunload', $val ?? null); }
    function onvolumechange($val = null) { return $this->setAttribute('onvolumechange', $val ?? null); }
    function onwaiting($val = null) { return $this->setAttribute('onwaiting', $val ?? null); }
    function onwheel($val = null) { return $this->setAttribute('onwheel', $val ?? null); }


    function css($value = []) {

        if (is_string($value)) {
            $s = explode(":", $value);
            if (count($s) == 2) {
                $this->styleAttributes['normal'][$s[0]] = $s[1];
            }
        } else if (is_array($value)) {
            $values = $value;
            foreach($values as $key => $value) {
                $this->styleAttributes['normal'][$key] = $value;
            }
        }
        
        $this->update();
        return $this;
    }


    function setStyleProperty($states, $key, $value) { 
       
        foreach ($states as $state) {
            if (isPseudoClassOrBreakPoint($state)) {
                $this->styleAttributes[$state][$key] = $value;
            } else {
                $this->styleAttributes['normal'][$key] = $value;
            }
        }
        $this->update();
        return $this;
    }
    

    function setAttribute(...$a) {

        if (count($a) == 1) {
            $key = $a[0];
            $value = '';
        } else {
            $key = $a[0];
            $value = $a[1];
        }

        if ($key != '') {
            if ((($this->attributes[$key] ?? '') != $value && $value != '') || ($value == '' && !isset($this->attributes[$key]))) {
                $this->attributes[$key] = $value;
                $this->update();
            }
        }

        return $this;
    }


    function attr(...$a) {

        if (count($a) == 1) {
            $key = $a[0];
            return $this->setAttribute($key);
        } else {

            $key = $a[0];
            $value = $a[1];

            return $this->setAttribute($key, $value);
        }

    }


    // Full size
    function fullSize(...$a) {
        return $this->setWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), '100%')
                    ->setHeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), '100%');
    }

    // Rect
    function rect(...$a) {
        $w = $a[count($a)-2] ?? '100%';
        $h = $a[count($a)-1] ?? '100%';
        return $this->setWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), $w)
                    ->setHeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), $h);
    }

    // Accent color
    function accent(...$a) { return $this->setAccentColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function accentColor(...$a) { return $this->setAccentColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    
    // Align content
    function alignContent(...$a) { return $this->setAlignContent((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    
    // Align items
    function alignItems(...$a) { return $this->setAlignItems((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Align self
    function alignSelf(...$a) { return $this->setAlignSelf((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // All
    function all(...$a) { return $this->setAll((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Animation
    function animation(...$a) { return $this->setAnimation((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Animation delay
    function animationDelay(...$a) { return $this->setAnimationDelay((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Animation direction
    function animationDirection(...$a) { return $this->setAnimationDirection((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Animation duration
    function animationDuration(...$a) { return $this->setAnimationDuration((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Animation fill mode
    function animationFillMode(...$a) { return $this->setAnimationFillMode((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Animation iteration count
    function animationIterationCount(...$a) { return $this->setAnimationIterationCount((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Animation name
    function animationName(...$a) { return $this->setAnimationName((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Animation play state
    function animationPlayState(...$a) { return $this->setAnimationPlayState((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Animation timing function
    function animationTimingFunction(...$a) { return $this->setAnimationTimingFunction((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Appearance
    function appearance(...$a) { return $this->setAppearance((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Aspect ratio
    function squared(...$a) { return $this->setAspectRatio((is_array($a[0] ?? null) ? $a[0] : ['normal']), '1/1', ...$a); }
    function landscape(...$a) { return $this->setAspectRatio((is_array($a[0] ?? null) ? $a[0] : ['normal']), '16/9', ...$a); }
    function portrait(...$a) { return $this->setAspectRatio((is_array($a[0] ?? null) ? $a[0] : ['normal']), '9/16', ...$a); }
    function aspectRatio(...$a) { return $this->setAspectRatio((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Backdrop filter
    function backdropFilter(...$a) { return $this->setBackdropFilter((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Backdrop blur
    function backdropBlurXS(...$a) { return $this->setBackdropFilter((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'blur(4px)', ...$a); }
    function backdropBlurS(...$a) { return $this->setBackdropFilter((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'blur(8px)', ...$a); }
    function backdropBlurM(...$a) { return $this->setBackdropFilter((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'blur(16px)', ...$a); }
    function backdropBlurL(...$a) { return $this->setBackdropFilter((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'blur(32px)', ...$a); }
    function backdropBlurXL(...$a) { return $this->setBackdropFilter((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'blur(64px)', ...$a); }
    function backdropBlur2XL(...$a) { return $this->setBackdropFilter((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'blur(128px)', ...$a); }
    function backdropBlur(...$a) { return $this->setBackdropBlur((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Backdrop brightness
    function backdropBrightness(...$a) { return $this->setBackdropBrightness((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Backdrop contrast
    function backdropContrast(...$a) { return $this->setBackdropContrast((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Backdrop drop shadow
    function backdropDropShadow(...$a) { return $this->setBackdropDropShadow((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Backdrop grayscale
    function backdropGrayscale(...$a) { return $this->setBackdropGrayscale((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Backdrop hue rotate
    function backdropHueRotate(...$a) { return $this->setBackdropHueRotate((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Backdrop invert
    function backdropInvert(...$a) { return $this->setBackdropInvert((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Backdrop opacity
    function backdropOpacity(...$a) { return $this->setBackdropOpacity((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Backdrop saturate
    function backdropSaturate(...$a) { return $this->setBackdropSaturate((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Backdrop sepia
    function backdropSepia(...$a) { return $this->setBackdropSepia((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Backface visibility
    function backfaceVisibility(...$a) { return $this->setBackfaceVisibility((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Background
    function bg(...$a) { return $this->setBackground((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function background(...$a) { return $this->setBackground((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Background attachment
    function backgroundAttachment(...$a) { return $this->setBackgroundAttachment((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Background blend mode
    function backgroundBlendMode(...$a) { return $this->setBackgroundBlendMode((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Background clip
    function backgroundClip(...$a) { return $this->setBackgroundClip((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Background color
    function backgroundColor(...$a) { return $this->setBackgroundColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Background image
    function backgroundImage(...$a) { return $this->setBackgroundImage((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Background origin
    function backgroundOrigin(...$a) { return $this->setBackgroundOrigin((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Background position
    function backgroundPosition(...$a) { return $this->setBackgroundPosition((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Background repeat
    function backgroundRepeat(...$a) { return $this->setBackgroundRepeat((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Background size
    function backgroundSize(...$a) { return $this->setBackgroundSize((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Block size
    function blockSize(...$a) { return $this->setBlockSize((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border
    function border(...$a) { return $this->setBorder((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border block end
    function borderBlockEnd(...$a) { return $this->setBorderBlockEnd((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border block end color
    function borderBlockEndColor(...$a) { return $this->setBorderBlockEndColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border block end style
    function borderBlockEndStyle(...$a) { return $this->setBorderBlockEndStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border block end width
    function borderBlockEndWidth(...$a) { return $this->setBorderBlockEndWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border block start
    function borderBlockStart(...$a) { return $this->setBorderBlockStart((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border block start color
    function borderBlockStartColor(...$a) { return $this->setBorderBlockStartColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border block start style
    function borderBlockStartStyle(...$a) { return $this->setBorderBlockStartStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border block start width
    function borderBlockStartWidth(...$a) { return $this->setBorderBlockStartWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border bottom
    function borderB(...$a) { return $this->setBorderBottom((is_array($a[0] ?? null) ? $a[0] : ['normal']), '1px', ...$a); }
    function borderB2(...$a) { return $this->setBorderBottom((is_array($a[0] ?? null) ? $a[0] : ['normal']), '2px', ...$a); }
    function borderBottom(...$a) { return $this->setBorderBottom((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border bottom color
    function borderBottomColor(...$a) { return $this->setBorderBottomColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border bottom left radius
    function borderBottomLeftRadius(...$a) { return $this->setBorderBottomLeftRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border bottom right radius
    function borderBottomRightRadius(...$a) { return $this->setBorderBottomRightRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border bottom style
    function borderBottomSolid(...$a) { return $this->setBorderBottomStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'solid', ...$a); }
    function borderBottomDashed(...$a) { return $this->setBorderBottomStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'dashed', ...$a); }
    function borderBottomDotted(...$a) { return $this->setBorderBottomStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'dotted', ...$a); }
    function borderBottomNone(...$a) { return $this->setBorderBottomStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'none', ...$a); }
    function borderBottomHidden(...$a) { return $this->setBorderBottomStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'hidden', ...$a); }
    function borderBottomDouble(...$a) { return $this->setBorderBottomStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'double', ...$a); }
    function borderBottomGroove(...$a) { return $this->setBorderBottomStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'groove', ...$a); }
    function borderBottomRidge(...$a) { return $this->setBorderBottomStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'ridge', ...$a); }
    function borderBottomInset(...$a) { return $this->setBorderBottomStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'inset', ...$a); }
    function borderBottomOutset(...$a) { return $this->setBorderBottomStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'outset', ...$a); }
    function borderBottomStyle(...$a) { return $this->setBorderBottomStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border bottom width
    function borderBottomWidth(...$a) { return $this->setBorderBottomWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border collapse
    function borderCollapse(...$a) { return $this->setBorderCollapse((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border color
    function borderColor(...$a) { return $this->setBorderColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border end end radius
    function borderEndEndRadius(...$a) { return $this->setBorderEndEndRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border end start radius
    function borderEndStartRadius(...$a) { return $this->setBorderEndStartRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border image
    function borderImage(...$a) { return $this->setBorderImage((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border image outset
    function borderImageOutset(...$a) { return $this->setBorderImageOutset((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border image repeat
    function borderImageRepeat(...$a) { return $this->setBorderImageRepeat((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border image slice
    function borderImageSlice(...$a) { return $this->setBorderImageSlice((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border image source
    function borderImageSource(...$a) { return $this->setBorderImageSource((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border image width
    function borderImageWidth(...$a) { return $this->setBorderImageWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border inline end
    function borderInlineEnd(...$a) { return $this->setBorderInlineEnd((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border inline end color
    function borderInlineEndColor(...$a) { return $this->setBorderInlineEndColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border inline end style
    function borderInlineEndStyle(...$a) { return $this->setBorderInlineEndStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border inline end width
    function borderInlineEndWidth(...$a) { return $this->setBorderInlineEndWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border inline start
    function borderInlineStart(...$a) { return $this->setBorderInlineStart((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border inline start color
    function borderInlineStartColor(...$a) { return $this->setBorderInlineStartColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border inline start style
    function borderInlineStartStyle(...$a) { return $this->setBorderInlineStartStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border inline start width
    function borderInlineStartWidth(...$a) { return $this->setBorderInlineStartWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border left
    function borderL(...$a) { return $this->setBorderLeft((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function borderLeft(...$a) { return $this->setBorderLeft((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border left color
    function borderLeftColor(...$a) { return $this->setBorderLeftColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border left style
    function borderLeftSolid(...$a) { return $this->setBorderLeftStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'solid', ...$a); }
    function borderLeftDashed(...$a) { return $this->setBorderLeftStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'dashed', ...$a); }
    function borderLeftDotted(...$a) { return $this->setBorderLeftStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'dotted', ...$a); }
    function borderLeftDouble(...$a) { return $this->setBorderLeftStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'double', ...$a); }
    function borderLeftNone(...$a) { return $this->setBorderLeftStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'none', ...$a); }
    function borderLeftHidden(...$a) { return $this->setBorderLeftStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'hidden', ...$a); }
    function borderLeftGroove(...$a) { return $this->setBorderLeftStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'groove', ...$a); }
    function borderLeftRidge(...$a) { return $this->setBorderLeftStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'ridge', ...$a); }
    function borderLeftInset(...$a) { return $this->setBorderLeftStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'inset', ...$a); }
    function borderLeftOutset(...$a) { return $this->setBorderLeftStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'outset', ...$a); }
    function borderLeftStyle(...$a) { return $this->setBorderLeftStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border left width
    function borderLeftWidth(...$a) { return $this->setBorderLeftWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border radius
    function roundedFull(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '9999px', ...$a); }
    function roundedNone(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0, ...$a'); }
    function rounded(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function roundedTop(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '9999px 9999px 0 0', ...$a); }
    function roundedT(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '9999px 9999px 0 0', ...$a); }
    function roundedBottom(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 0 9999px 9999px', ...$a); }
    function roundedB(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 0 9999px 9999px', ...$a); }
    function roundedLeft(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '9999px 0 0 9999px', ...$a); }
    function roundedL(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '9999px 0 0 9999px', ...$a); }
    function roundedRight(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 9999px 9999px 0', ...$a); }
    function roundedR(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 9999px 9999px 0', ...$a); }
    function roundedTL(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '9999px 0 0 0', ...$a); }
    function roundedTR(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 9999px 0 0', ...$a); }
    function roundedBL(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 0 0 9999px', ...$a); }
    function roundedBR(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 0 9999px 0', ...$a); }
    function borderRadius(...$a) { return $this->setBorderRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border right
    function borderR(...$a) { return $this->setBorderRight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function borderRight(...$a) { return $this->setBorderRight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border right color
    function borderRightColor(...$a) { return $this->setBorderRightColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border right style
    function borderRightSolid(...$a) { return $this->setBorderRightStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'solid', ...$a); }
    function borderRightDashed(...$a) { return $this->setBorderRightStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'dashed', ...$a); }
    function borderRightDotted(...$a) { return $this->setBorderRightStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'dotted', ...$a); }
    function borderRightDouble(...$a) { return $this->setBorderRightStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'double', ...$a); }
    function borderRightNone(...$a) { return $this->setBorderRightStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'none', ...$a); }
    function borderRightHidden(...$a) { return $this->setBorderRightStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'hidden', ...$a); }
    function borderRightGroove(...$a) { return $this->setBorderRightStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'groove', ...$a); }
    function borderRightRidge(...$a) { return $this->setBorderRightStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'ridge', ...$a); }
    function borderRightInset(...$a) { return $this->setBorderRightStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'inset', ...$a); }
    function borderRightOutset(...$a) { return $this->setBorderRightStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'outset', ...$a); }
    function borderRightStyle(...$a) { return $this->setBorderRightStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border right width
    function borderRightWidth(...$a) { return $this->setBorderRightWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border spacing
    function borderSpacing(...$a) { return $this->setBorderSpacing((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border start end radius
    function borderStartEndRadius(...$a) { return $this->setBorderStartEndRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border start start radius
    function borderStartStartRadius(...$a) { return $this->setBorderStartStartRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border style
    function borderSolid(...$a) { return $this->setBorderStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'solid'); }
    function borderDashed(...$a) { return $this->setBorderStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'dashed'); }
    function borderDotted(...$a) { return $this->setBorderStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'dotted'); }
    function borderDouble(...$a) { return $this->setBorderStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'double'); }
    function borderNone(...$a) { return $this->setBorderStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'none'); }
    function borderStyle(...$a) { return $this->setBorderStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border top
    function borderT(...$a) { return $this->setBorderTop((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function borderTop(...$a) { return $this->setBorderTop((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border top color
    function borderTopColor(...$a) { return $this->setBorderTopColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border top left radius
    function borderTopLeftRadius(...$a) { return $this->setBorderTopLeftRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border top right radius
    function borderTopRightRadius(...$a) { return $this->setBorderTopRightRadius((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border top style
    function borderTopStyle(...$a) { return $this->setBorderTopStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border top width
    function borderTopSolid(...$a) { return $this->setBorderTopWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'solid'); }
    function borderTopDashed(...$a) { return $this->setBorderTopWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'dashed'); }
    function borderTopDotted(...$a) { return $this->setBorderTopWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'dotted'); }
    function borderTopDouble(...$a) { return $this->setBorderTopWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'double'); }
    function borderTopNone(...$a) { return $this->setBorderTopWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'none'); }
    function borderTopWidth(...$a) { return $this->setBorderTopWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Border width
    function borderWidth(...$a) { return $this->setBorderWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Bottom
    function bottom(...$a) { return $this->setBottom((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Box shadow
    function shadowXS(...$a) { return $this->setBoxShadow((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 1px 2px 0 rgba(0, 0, 0, 0.05)', ...$a); }
    function shadowS(...$a) { return $this->setBoxShadow((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)', ...$a); }
    function shadowM(...$a) { return $this->setBoxShadow((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)', ...$a); }
    function shadowL(...$a) { return $this->setBoxShadow((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)', ...$a); }
    function shadowXL(...$a) { return $this->setBoxShadow((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)', ...$a); }
    function shadow2XL(...$a) { return $this->setBoxShadow((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 25px 50px -12px rgba(0, 0, 0, 0.25)', ...$a); }
    function shadowInner(...$a) { return $this->setBoxShadow((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)', ...$a); }
    function shadowOutline(...$a) { return $this->setBoxShadow((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0 0 0 3px rgba(66, 153, 225, 0.5)', ...$a); }
    function shadowNone(...$a) { return $this->setBoxShadow((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'none', ...$a); }
    function boxShadow(...$a) { return $this->setBoxShadow((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Box sizing
    function boxSizing(...$a) { return $this->setBoxSizing((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Break after
    function breakAfter(...$a) { return $this->setBreakAfter((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Break before
    function breakBefore(...$a) { return $this->setBreakBefore((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Break inside
    function breakInside(...$a) { return $this->setBreakInside((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Caption side
    function captionSide(...$a) { return $this->setCaptionSide((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Caret color
    function caretColor(...$a) { return $this->setCaretColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Clear
    function clear(...$a) { return $this->setClear((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Clip
    function clip(...$a) { return $this->setClip((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Clip path
    function clipPath(...$a) { return $this->setClipPath((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Clip rule
    function clipRule(...$a) { return $this->setClipRule((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Color
    function textColor(...$a) { return $this->setColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function color(...$a) { return $this->setColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Color interpolation
    function colorInterpolation(...$a) { return $this->setColorInterpolation((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Color interpolation filters
    function colorInterpolationFilters(...$a) { return $this->setColorInterpolationFilters((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Color profile
    function colorProfile(...$a) { return $this->setColorProfile((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Color rendering
    function colorRendering(...$a) { return $this->setColorRendering((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Column count
    function columnCount(...$a) { return $this->setColumnCount((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Column fill
    function columnFill(...$a) { return $this->setColumnFill((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Column gap
    function columnGap(...$a) { return $this->setColumnGap((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Column rule
    function columnRule(...$a) { return $this->setColumnRule((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Column rule color
    function columnRuleColor(...$a) { return $this->setColumnRuleColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Column rule style
    function columnRuleStyle(...$a) { return $this->setColumnRuleStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Column rule width
    function columnRuleWidth(...$a) { return $this->setColumnRuleWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Column span
    function columnSpan(...$a) { return $this->setColumnSpan((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Column width
    function columnWidth(...$a) { return $this->setColumnWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Columns
    function columns(...$a) { return $this->setColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Contain
    function contain(...$a) { return $this->setContain((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Content
    function content(...$a) { return $this->setContent((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Counter increment
    function counterIncrement(...$a) { return $this->setCounterIncrement((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Counter reset
    function counterReset(...$a) { return $this->setCounterReset((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Cursor
    function pointer(...$a) { return $this->setCursor((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'pointer'); }
    function cursor(...$a) { return $this->setCursor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Direction
    function direction(...$a) { return $this->setDirection((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Display
    function block(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'block'); }
    function inline(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'inline'); }
    function inlineBlock(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'inline-block'); }
    function inlineFlex(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'inline-flex'); }
    function inlineGrid(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'inline-grid'); }
    function inlineTable(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'inline-table'); }
    function grid(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'grid'); }
    function table(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'table'); }
    function tableCaption(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'table-caption'); }
    function tableCell(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'table-cell'); }
    function tableColumn(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'table-column'); }
    function tableColumnGroup(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'table-column-group'); }
    function tableFooterGroup(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'table-footer-group'); }
    function tableHeaderGroup(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'table-header-group'); }
    function tableRowGroup(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'table-row-group'); }
    function tableRow(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'table-row'); }
    function hidden(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'none'); }
    function initial(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'initial'); }
    function inherit(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'inherit'); }
    function display(...$a) { return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Dominant baseline
    function dominantBaseline(...$a) { return $this->setDominantBaseline((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Empty cells
    function emptyCells(...$a) { return $this->setEmptyCells((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Fill
    function fill(...$a) { return $this->setFill((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Fill opacity
    function fillOpacity(...$a) { return $this->setFillOpacity((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Fill rule
    function fillRule(...$a) { return $this->setFillRule((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Filter
    function filter(...$a) { return $this->setFilter((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Flex basis
    function flexBasis(...$a) { return $this->setFlexBasis((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Flex direction
    function flexDirection(...$a) { return $this->setFlexDirection((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Flex flow
    function flexFlow(...$a) { return $this->setFlexFlow((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Flex grow
    function flexGrow(...$a) { return $this->setFlexGrow((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Flex shrink
    function flexShrink(...$a) { return $this->setFlexShrink((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Flex wrap
    function flexWrap(...$a) { return $this->setFlexWrap((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Flex 1
    function flex(...$a) { 
        if (count($a) == 0) {
            return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'flex');
        } else {
            return $this->setDisplay((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'flex')
                    ->setFlex((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a);
        }
    }
    function flex1(...$a) { return $this->setFlex((is_array($a[0] ?? null) ? $a[0] : ['normal']), '1 1 0%'); }

    // Float
    function floatLeft(...$a) { return $this->setFloat((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'left'); }
    function floatRight(...$a) { return $this->setFloat((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'right'); }
    function floatNone(...$a) { return $this->setFloat((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'none'); }
    function float(...$a) { return $this->setFloat((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Flood color
    function floodColor(...$a) { return $this->setFloodColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Flood opacity
    function floodOpacity(...$a) { return $this->setFloodOpacity((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Font
    function font(...$a) { return $this->setFontFamily((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Font family
    function fontFamily(...$a) { return $this->setFontFamily((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Font feature settings
    function fontFeatureSettings(...$a) { return $this->setFontFeatureSettings((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Font size
    function fontSize(...$a) { return $this->setFontSize((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Font size adjust
    function fontSizeAdjust(...$a) { return $this->setFontSizeAdjust((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Font stretch
    function fontStretch(...$a) { return $this->setFontStretch((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Font style
    function italic(...$a) { return $this->setFontStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'italic'); }
    function oblique(...$a) { return $this->setFontStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'oblique'); }
    function normal(...$a) { return $this->setFontStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'normal'); }
    function fontStyle(...$a) { return $this->setFontStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Font variant
    function fontVariant(...$a) { return $this->setFontVariant((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Font weight
    function hairline(...$a) { return $this->setFontWeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), '100'); }
    function thin(...$a) { return $this->setFontWeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), '200'); }
    function light(...$a) { return $this->setFontWeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), '300'); }
    function regular(...$a) { return $this->setFontWeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), '400'); }
    function medium(...$a) { return $this->setFontWeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), '500'); }
    function semibold(...$a) { return $this->setFontWeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), '600'); }
    function bold(...$a) { return $this->setFontWeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), '700'); }
    function extrabold(...$a) { return $this->setFontWeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), '800'); }
    function black(...$a) { return $this->setFontWeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), '900'); }
    function fontWeight(...$a) { return $this->setFontWeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Gap
    function gap(...$a) { return $this->setGap((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid area
    function gridArea(...$a) { return $this->setGridArea((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid auto columns
    function gridAutoColumns(...$a) { return $this->setGridAutoColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid auto flow
    function gridAutoFlow(...$a) { return $this->setGridAutoFlow((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid auto rows
    function gridAutoRows(...$a) { return $this->setGridAutoRows((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid column
    function gridColumn(...$a) { return $this->setGridColumn((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid column end
    function gridColumnEnd(...$a) { return $this->setGridColumnEnd((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid column gap
    function gridColumnGap(...$a) { return $this->setGridColumnGap((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid column start
    function gridColumnStart(...$a) { return $this->setGridColumnStart((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid gap
    function gridGap(...$a) { return $this->setGridGap((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid row
    function gridRow(...$a) { return $this->setGridRow((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid row end
    function gridRowEnd(...$a) { return $this->setGridRowEnd((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid row gap
    function gridRowGap(...$a) { return $this->setGridRowGap((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid row start
    function gridRowStart(...$a) { return $this->setGridRowStart((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid template
    function gridCols1(...$a) { return $this->setGridTemplateColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'repeat(1, minmax(0, 1fr));'); }
    function gridCols2(...$a) { return $this->setGridTemplateColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'repeat(2, minmax(0, 1fr));'); }
    function gridCols3(...$a) { return $this->setGridTemplateColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'repeat(3, minmax(0, 1fr));'); }
    function gridCols4(...$a) { return $this->setGridTemplateColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'repeat(4, minmax(0, 1fr));'); }
    function gridCols5(...$a) { return $this->setGridTemplateColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'repeat(5, minmax(0, 1fr));'); }
    function gridCols6(...$a) { return $this->setGridTemplateColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'repeat(6, minmax(0, 1fr));'); }
    function gridCols7(...$a) { return $this->setGridTemplateColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'repeat(7, minmax(0, 1fr));'); }
    function gridCols8(...$a) { return $this->setGridTemplateColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'repeat(8, minmax(0, 1fr));'); }
    function gridCols9(...$a) { return $this->setGridTemplateColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'repeat(9, minmax(0, 1fr));'); }
    function gridCols10(...$a) { return $this->setGridTemplateColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'repeat(10, minmax(0, 1fr));'); }
    function gridCols11(...$a) { return $this->setGridTemplateColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'repeat(11, minmax(0, 1fr));'); }
    function gridCols12(...$a) { return $this->setGridTemplateColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'repeat(12, minmax(0, 1fr));'); }
    function gridTemplate(...$a) { return $this->setGridTemplate((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid template areas
    function gridTemplateAreas(...$a) { return $this->setGridTemplateAreas((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid template columns
    function gridTemplateColumns(...$a) { return $this->setGridTemplateColumns((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Grid template rows
    function gridTemplateRows(...$a) { return $this->setGridTemplateRows((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Height
    function h(...$a) { return $this->setHeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function fullH(...$a) { return $this->setHeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), '100%'); }
    function height(...$a) { return $this->setHeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Hyphens
    function hyphens(...$a) { return $this->setHyphens((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Image rendering
    function imageRendering(...$a) { return $this->setImageRendering((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Inline size
    function inlineSize(...$a) { return $this->setInlineSize((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Inset
    function inset(...$a) { return $this->setInset((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Inset block
    function insetBlock(...$a) { return $this->setInsetBlock((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Inset block end
    function insetBlockEnd(...$a) { return $this->setInsetBlockEnd((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Inset block start
    function insetBlockStart(...$a) { return $this->setInsetBlockStart((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Inset inline
    function insetInline(...$a) { return $this->setInsetInline((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Inset inline end
    function insetInlineEnd(...$a) { return $this->setInsetInlineEnd((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Inset inline start
    function insetInlineStart(...$a) { return $this->setInsetInlineStart((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Isolation
    function isolation(...$a) { return $this->setIsolation((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Justify content
    function justifyContent(...$a) { return $this->setJustifyContent((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Justify items
    function justifyItems(...$a) { return $this->setJustifyItems((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Justify self
    function justifySelf(...$a) { return $this->setJustifySelf((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Left
    function left(...$a) { return $this->setLeft((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Letter spacing
    function letterSpacing(...$a) { return $this->setLetterSpacing((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Line height
    function lineHeight(...$a) { return $this->setLineHeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // List style
    function listStyle(...$a) { return $this->setListStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // List style image
    function listStyleImage(...$a) { return $this->setListStyleImage((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // List style position
    function listStylePosition(...$a) { return $this->setListStylePosition((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // List style type
    function listStyleType(...$a) { return $this->setListStyleType((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Margin
    function m(...$a) { return $this->setMargin((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function margin(...$a) { return $this->setMargin((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Margin block
    function marginBlock(...$a) { return $this->setMarginBlock((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Margin block end
    function marginBlockEnd(...$a) { return $this->setMarginBlockEnd((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Margin block start
    function marginBlockStart(...$a) { return $this->setMarginBlockStart((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Margin bottom
    function mb(...$a) { return $this->setMarginBottom((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function marginBottom(...$a) { return $this->setMarginBottom((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Margin inline
    function marginInline(...$a) { return $this->setMarginInline((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Margin inline end
    function marginInlineEnd(...$a) { return $this->setMarginInlineEnd((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Margin inline start
    function marginInlineStart(...$a) { return $this->setMarginInlineStart((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Margin left
    function ml(...$a) { return $this->setMarginLeft((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function marginLeft(...$a) { return $this->setMarginLeft((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Margin right
    function mr(...$a) { return $this->setMarginRight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function marginRight(...$a) { return $this->setMarginRight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Margin top
    function mt(...$a) { return $this->setMarginTop((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function marginTop(...$a) { return $this->setMarginTop((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }


    // Margin horizontal
    function mx(...$a) { 
        return $this->setMarginLeft((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a)
                    ->setMarginRight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); 
    }

    // Margin vertical
    function my(...$a) { 
        return $this->setMarginTop((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a)
                    ->setMarginBottom((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); 
    }

    // Mask
    function mask(...$a) { return $this->setMask((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask border mode
    function maskBorderMode(...$a) { return $this->setMaskBorderMode((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask border outset   
    function maskBorderOutset(...$a) { return $this->setMaskBorderOutset((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask border repeat
    function maskBorderRepeat(...$a) { return $this->setMaskBorderRepeat((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask border slice
    function maskBorderSlice(...$a) { return $this->setMaskBorderSlice((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask border source
    function maskBorderSource(...$a) { return $this->setMaskBorderSource((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask border width
    function maskBorderWidth(...$a) { return $this->setMaskBorderWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask clip
    function maskClip(...$a) { return $this->setMaskClip((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask composite
    function maskComposite(...$a) { return $this->setMaskComposite((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask image
    function maskImage(...$a) { return $this->setMaskImage((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask mode
    function maskMode(...$a) { return $this->setMaskMode((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask origin
    function maskOrigin(...$a) { return $this->setMaskOrigin((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask position
    function maskPosition(...$a) { return $this->setMaskPosition((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask repeat
    function maskRepeat(...$a) { return $this->setMaskRepeat((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask size
    function maskSize(...$a) { return $this->setMaskSize((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mask type
    function maskType(...$a) { return $this->setMaskType((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Max height
    function maxH(...$a) { return $this->setMaxHeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function maxHeight(...$a) { return $this->setMaxHeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Max width
    function maxW(...$a) { return $this->setMaxWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function maxWidthXS(...$a) { return $this->setMaxWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), '320px'); }
    function maxWidthS(...$a) { return $this->setMaxWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), '640px'); }
    function maxWidthM(...$a) { return $this->setMaxWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), '768px'); }
    function maxWidthL(...$a) { return $this->setMaxWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), '1024px'); }
    function maxWidthXL(...$a) { return $this->setMaxWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), '1280px'); }
    function maxWidth2XL(...$a) { return $this->setMaxWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), '1536px'); }
    function maxWidth3XL(...$a) { return $this->setMaxWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), '1920px'); }
    function maxWidth(...$a) { return $this->setMaxWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Min height
    function minH(...$a) { return $this->setMinHeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function minHeight(...$a) { return $this->setMinHeight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Min width
    function minW(...$a) { return $this->setMinWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function minWidth(...$a) { return $this->setMinWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Mix blend mode
    function mixBlendMode(...$a) { return $this->setMixBlendMode((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Object fit
    function objectFit(...$a) { return $this->setObjectFit((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Object position
    function objectPosition(...$a) { return $this->setObjectPosition((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Offset anchor
    function offsetAnchor(...$a) { return $this->setOffsetAnchor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Offset distance
    function offsetDistance(...$a) { return $this->setOffsetDistance((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Offset path
    function offsetPath(...$a) { return $this->setOffsetPath((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Offset position
    function offsetPosition(...$a) { return $this->setOffsetPosition((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Offset rotate
    function offsetRotate(...$a) { return $this->setOffsetRotate((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Opacity
    function opacity(...$a) { return $this->setOpacity((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Order
    function order(...$a) { return $this->setOrder((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Orphans
    function orphans(...$a) { return $this->setOrphans((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Outline color
    function outlineColor(...$a) { return $this->setOutlineColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Outline offset
    function outlineOffset(...$a) { return $this->setOutlineOffset((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Outline style
    function outlineStyle(...$a) { return $this->setOutlineStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Outline width
    function outlineWidth(...$a) { return $this->setOutlineWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Overflow
    function overflow(...$a) { return $this->setOverflow((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Overflow x
    function overflowX(...$a) { return $this->setOverflowX((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Overflow y
    function overflowY(...$a) { return $this->setOverflowY((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Overscroll behavior
    function overscrollBehavior(...$a) { return $this->setOverscrollBehavior((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Overscroll behavior x
    function overscrollBehaviorX(...$a) { return $this->setOverscrollBehaviorX((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Overscroll behavior y
    function overscrollBehaviorY(...$a) { return $this->setOverscrollBehaviorY((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Padding
    function p(...$a) { return $this->setPadding((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function padding(...$a) { return $this->setPadding((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Padding bottom
    function pb(...$a) { return $this->setPaddingBottom((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function paddingBottom(...$a) { return $this->setPaddingBottom((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Padding left
    function pl(...$a) { return $this->setPaddingLeft((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function paddingLeft(...$a) { return $this->setPaddingLeft((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Padding right
    function pr(...$a) { return $this->setPaddingRight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function paddingRight(...$a) { return $this->setPaddingRight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Padding top
    function pt(...$a) { return $this->setPaddingTop((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function paddingTop(...$a) { return $this->setPaddingTop((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Padding horizontal
    function px(...$a) { 
        return $this->setPaddingLeft((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a)
                    ->setPaddingRight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); 
    }

    // Padding vertical
    function py(...$a) { 
        return $this->setPaddingTop((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a)
                    ->setPaddingBottom((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); 
    }

    // Page break after
    function pageBreakAfter(...$a) { return $this->setPageBreakAfter((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Page break before
    function pageBreakBefore(...$a) { return $this->setPageBreakBefore((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Page break inside
    function pageBreakInside(...$a) { return $this->setPageBreakInside((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Perspective
    function perspective(...$a) { return $this->setPerspective((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Perspective origin
    function perspectiveOrigin(...$a) { return $this->setPerspectiveOrigin((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Place content
    function placeContent(...$a) { return $this->setPlaceContent((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Place items
    function placeItems(...$a) { return $this->setPlaceItems((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Place self
    function placeSelf(...$a) { return $this->setPlaceSelf((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Pointer events
    function pointerEvents(...$a) { return $this->setPointerEvents((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Position
    function absolute(...$a) { return $this->setPosition((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'absolute', ...$a); }
    function fixed(...$a) { return $this->setPosition((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'fixed', ...$a); }
    function relative(...$a) { return $this->setPosition((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'relative', ...$a); }
    function static(...$a) { return $this->setPosition((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'static', ...$a); }
    function sticky(...$a) { return $this->setPosition((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'sticky', ...$a); }
    function position(...$a) { return $this->setPosition((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Quotes
    function quotes(...$a) { return $this->setQuotes((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Resize
    function resize(...$a) { return $this->setResize((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Right
    function right(...$a) { return $this->setRight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Rotate
    function rotate(...$a) { return $this->setRotate((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Row gap
    function rowGap(...$a) { return $this->setRowGap((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Ruby align
    function rubyAlign(...$a) { return $this->setRubyAlign((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Ruby merge
    function rubyMerge(...$a) { return $this->setRubyMerge((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Ruby position
    function rubyPosition(...$a) { return $this->setRubyPosition((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scale
    function scale(...$a) { return $this->setScale((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll behavior
    function scrollBehavior(...$a) { return $this->setScrollBehavior((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll margin
    function scrollMargin(...$a) { return $this->setScrollMargin((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll margin block
    function scrollMarginBlock(...$a) { return $this->setScrollMarginBlock((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll margin block end
    function scrollMarginBlockEnd(...$a) { return $this->setScrollMarginBlockEnd((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll margin block start
    function scrollMarginBlockStart(...$a) { return $this->setScrollMarginBlockStart((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll margin bottom
    function scrollMarginBottom(...$a) { return $this->setScrollMarginBottom((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll margin inline
    function scrollMarginInline(...$a) { return $this->setScrollMarginInline((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll margin inline end
    function scrollMarginInlineEnd(...$a) { return $this->setScrollMarginInlineEnd((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll margin inline start
    function scrollMarginInlineStart(...$a) { return $this->setScrollMarginInlineStart((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll margin left
    function scrollMarginLeft(...$a) { return $this->setScrollMarginLeft((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll margin right
    function scrollMarginRight(...$a) { return $this->setScrollMarginRight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll margin top
    function scrollMarginTop(...$a) { return $this->setScrollMarginTop((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll padding
    function scrollPadding(...$a) { return $this->setScrollPadding((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll padding block
    function scrollPaddingBlock(...$a) { return $this->setScrollPaddingBlock((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll padding block end
    function scrollPaddingBlockEnd(...$a) { return $this->setScrollPaddingBlockEnd((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll padding block start
    function scrollPaddingBlockStart(...$a) { return $this->setScrollPaddingBlockStart((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll padding bottom
    function scrollPaddingBottom(...$a) { return $this->setScrollPaddingBottom((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll padding inline
    function scrollPaddingInline(...$a) { return $this->setScrollPaddingInline((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll padding inline end
    function scrollPaddingInlineEnd(...$a) { return $this->setScrollPaddingInlineEnd((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll padding inline start
    function scrollPaddingInlineStart(...$a) { return $this->setScrollPaddingInlineStart((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll padding left
    function scrollPaddingLeft(...$a) { return $this->setScrollPaddingLeft((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll padding right
    function scrollPaddingRight(...$a) { return $this->setScrollPaddingRight((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll padding top
    function scrollPaddingTop(...$a) { return $this->setScrollPaddingTop((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll snap align
    function scrollSnapAlign(...$a) { return $this->setScrollSnapAlign((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll snap stop
    function scrollSnapStop(...$a) { return $this->setScrollSnapStop((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll snap type
    function scrollSnapType(...$a) { return $this->setScrollSnapType((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll snap type x
    function scrollSnapTypeX(...$a) { return $this->setScrollSnapTypeX((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Scroll snap type y
    function scrollSnapTypeY(...$a) { return $this->setScrollSnapTypeY((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Shape image threshold
    function shapeImageThreshold(...$a) { return $this->setShapeImageThreshold((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Shape margin
    function shapeMargin(...$a) { return $this->setShapeMargin((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Shape outside
    function shapeOutside(...$a) { return $this->setShapeOutside((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Tab size
    function tabSize(...$a) { return $this->setTabSize((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Table layout
    function tableLayout(...$a) { return $this->setTableLayout((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text align
    function textCenter(...$a) { return $this->setTextAlign((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'center', ...$a); }
    function textJustify(...$a) { return $this->setTextAlign((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'justify', ...$a); }
    function textLeft(...$a) { return $this->setTextAlign((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'left', ...$a); }
    function textRight(...$a) { return $this->setTextAlign((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'right', ...$a); }
    function textStart(...$a) { return $this->setTextAlign((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'start', ...$a); }
    function textEnd(...$a) { return $this->setTextAlign((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'end', ...$a); }
    function textAlign(...$a) { return $this->setTextAlign((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text align last
    function textAlignLast(...$a) { return $this->setTextAlignLast((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text combine horizontal
    function textCombineHorizontal(...$a) { return $this->setTextCombineHorizontal((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text decoration
    function underline(...$a) { return $this->setTextDecoration((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'underline', ...$a); }
    function overline(...$a) { return $this->setTextDecoration((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'overline', ...$a); }
    function lineThrough(...$a) { return $this->setTextDecoration((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'line-through', ...$a); }
    function noUnderline(...$a) { return $this->setTextDecoration((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'none', ...$a); }
    function textDecoration(...$a) { return $this->setTextDecoration((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text decoration color
    function decorationColor(...$a) { return $this->setTextDecorationColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function textDecorationColor(...$a) { return $this->setTextDecorationColor((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text decoration line
    function decorationLine(...$a) { return $this->setTextDecorationLine((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function textDecorationLine(...$a) { return $this->setTextDecorationLine((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text decoration skip
    function decorationSkip(...$a) { return $this->setTextDecorationSkip((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function textDecorationSkip(...$a) { return $this->setTextDecorationSkip((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text decoration skip ink
    function decorationSkipInk(...$a) { return $this->setTextDecorationSkipInk((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function textDecorationSkipInk(...$a) { return $this->setTextDecorationSkipInk((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text decoration style
    function decorationStyle(...$a) { return $this->setTextDecorationStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function textDecorationStyle(...$a) { return $this->setTextDecorationStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text decoration thickness
    function decorationThickness(...$a) { return $this->setTextDecorationThickness((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function textDecorationThickness(...$a) { return $this->setTextDecorationThickness((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text decoration width
    function decorationWidth(...$a) { return $this->setTextDecorationWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function textDecorationWidth(...$a) { return $this->setTextDecorationWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text indent
    function indent(...$a) { return $this->setTextIndent((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function textIndent(...$a) { return $this->setTextIndent((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text orientation 
    function orientation(...$a) { return $this->setTextOrientation((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function textOrientation(...$a) { return $this->setTextOrientation((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text overflow
    function textOverflow(...$a) { return $this->setTextOverflow((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text shadow
    function textShadow(...$a) { return $this->setTextShadow((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text size adjust
    function textSizeAdjust(...$a) { return $this->setTextSizeAdjust((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text transform
    function textTransform(...$a) { return $this->setTextTransform((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Text underline position
    function textUnderlinePosition(...$a) { return $this->setTextUnderlinePosition((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Top
    function top(...$a) { return $this->setTop((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Touch action
    function touchAction(...$a) { return $this->setTouchAction((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    
    // Transform
    function transform(...$a) { return $this->setTransform((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Transform box
    function transformBox(...$a) { return $this->setTransformBox((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Transform origin
    function transformOrigin(...$a) { return $this->setTransformOrigin((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Transform style
    function transformStyle(...$a) { return $this->setTransformStyle((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Transition
    function transition(...$a) { 
        return $this->setTransitionDelay((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0s')
                    ->setTransitionDuration((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0.15s')
                    ->setTransitionProperty((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter')
                    ->setTransitionTimingFunction((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'cubic-bezier(0.4, 0, 0.2, 1)');
    }

    // transition all
    function transtionAll(...$a) { 
        return $this->setTransitionDelay((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0s')
                    ->setTransitionDuration((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0.15s')
                    ->setTransitionProperty((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'all')
                    ->setTransitionTimingFunction((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'cubic-bezier(0.4, 0, 0.2, 1)');
    }
    
    // Transition color
    function transitionColor(...$a) { 
        return $this->setTransitionDelay((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0s')
                    ->setTransitionDuration((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0.15s')
                    ->setTransitionProperty((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'color')
                    ->setTransitionTimingFunction((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'cubic-bezier(0.4, 0, 0.2, 1)');
    }

    // Transition opacity
    function transitionOpacity(...$a) { 
        return $this->setTransitionDelay((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0s')
                    ->setTransitionDuration((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0.15s')
                    ->setTransitionProperty((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'opacity')
                    ->setTransitionTimingFunction((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'cubic-bezier(0.4, 0, 0.2, 1)');
    }

    // Transition shadow
    function transitionShadow(...$a) { 
        return $this->setTransitionDelay((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0s')
                    ->setTransitionDuration((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0.15s')
                    ->setTransitionProperty((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'box-shadow')
                    ->setTransitionTimingFunction((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'cubic-bezier(0.4, 0, 0.2, 1)');
    }

    // Transition transform
    function transitionTransform(...$a) { 
        return $this->setTransitionDelay((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0s')
                    ->setTransitionDuration((is_array($a[0] ?? null) ? $a[0] : ['normal']), '0.15s')
                    ->setTransitionProperty((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'transform')
                    ->setTransitionTimingFunction((is_array($a[0] ?? null) ? $a[0] : ['normal']), 'cubic-bezier(0.4, 0, 0.2, 1)');
    }


    // Transition delay
    function transitionDelay(...$a) { return $this->setTransitionDelay((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Transition duration
    function duration(...$a) { return $this->setTransitionDuration((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function transitionDuration(...$a) { return $this->setTransitionDuration((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Transition property
    function transitionProperty(...$a) { return $this->setTransitionProperty((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Transition timing function
    function transitionTimingFunction(...$a) { return $this->setTransitionTimingFunction((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Translate
    function translate(...$a) { return $this->setTranslate((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Translate x
    function translateX(...$a) { return $this->setTranslateX((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Translate y
    function translateY(...$a) { return $this->setTranslateY((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Translate z
    function translateZ(...$a) { return $this->setTranslateZ((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Translate 3d
    function translate3d(...$a) { return $this->setTranslate3d((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Unicode bidi
    function unicodeBidi(...$a) { return $this->setUnicodeBidi((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // User select
    function userSelect(...$a) { return $this->setUserSelect((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Vertical align
    function verticalAlign(...$a) { return $this->setVerticalAlign((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Visibility
    function visibility(...$a) { return $this->setVisibility((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // White space
    function whiteSpace(...$a) { return $this->setWhiteSpace((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Width
    function w(...$a) { return $this->setWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function fullW(...$a) { return $this->setWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), '100%'); }
    function width(...$a) { return $this->setWidth((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Will change
    function willChange(...$a) { return $this->setWillChange((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Word break
    function wordBreak(...$a) { return $this->setWordBreak((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Word spacing
    function wordSpacing(...$a) { return $this->setWordSpacing((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Word wrap
    function wordWrap(...$a) { return $this->setWordWrap((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Writing mode
    function writingMode(...$a) { return $this->setWritingMode((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Z index
    function z(...$a) { return $this->setZIndex((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }
    function zIndex(...$a) { return $this->setZIndex((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }

    // Zoom
    function zoom(...$a) { return $this->setZoom((is_array($a[0] ?? null) ? $a[0] : ['normal']), ...$a); }




    /*** Properties ***/
    function setAccentColor($states, ...$a) {
        return $this->setStyleProperty($states, 'accent-color', styleProperty('accent-color', $a), $a);
    }

    function setAlignContent($states, ...$a) {
        return $this->setStyleProperty($states, 'align-content', styleProperty('align-content', $a), $a);
    }

    function setAlignItems($states, ...$a) {
        return $this->setStyleProperty($states, 'align-items', styleProperty('align-items', $a), $a);
    }

    function setAlignSelf($states, ...$a) {
        return $this->setStyleProperty($states, 'align-self', styleProperty('align-self', $a), $a);
    }

    function setAnimation($states, ...$a) {
        return $this->setStyleProperty($states, 'animation', styleProperty('animation', $a), $a);
    }

    function setAnimationDelay($states, ...$a) {
        return $this->setStyleProperty($states, 'animation-delay', styleProperty('animation-delay', $a), $a);
    }

    function setAnimationDirection($states, ...$a) {
        return $this->setStyleProperty($states, 'animation-direction', styleProperty('animation-direction', $a), $a);
    }

    function setAnimationDuration($states, ...$a) {
        return $this->setStyleProperty($states, 'animation-duration', styleProperty('animation-duration', $a), $a);
    }

    function setAnimationFillMode($states, ...$a) {
        return $this->setStyleProperty($states, 'animation-fill-mode', styleProperty('animation-fill-mode', $a), $a);
    }

    function setAnimationIterationCount($states, ...$a) {
        return $this->setStyleProperty($states, 'animation-iteration-count', styleProperty('animation-iteration-count', $a), $a);
    }

    function setAnimationName($states, ...$a) {
        return $this->setStyleProperty($states, 'animation-name', styleProperty('animation-name', $a), $a);
    }

    function setAnimationPlayState($states, ...$a) {
        return $this->setStyleProperty($states, 'animation-play-state', styleProperty('animation-play-state', $a), $a);
    }

    function setAnimationTimingFunction($states, ...$a) {
        return $this->setStyleProperty($states, 'animation-timing-function', styleProperty('animation-timing-function', $a), $a);
    }

    function setAspectRatio($states, ...$a) {
        return $this->setStyleProperty($states, 'aspect-ratio', styleProperty('aspect-ratio', $a), $a);
    }

    function setBackdropBlur($states, ...$a) {
        return $this->setStyleProperty($states, 'backdrop-blur', styleProperty('backdrop-blur', $a), $a);
    }

    function setBackdropBrightness($states, ...$a) {
        return $this->setStyleProperty($states, 'backdrop-brightness', styleProperty('backdrop-brightness', $a), $a);
    }

    function setBackdropContrast($states, ...$a) {
        return $this->setStyleProperty($states, 'backdrop-contrast', styleProperty('backdrop-contrast', $a), $a);
    }

    function setBackdropGrayscale($states, ...$a) {
        return $this->setStyleProperty($states, 'backdrop-grayscale', styleProperty('backdrop-grayscale', $a), $a);
    }

    function setBackdropHueRotate($states, ...$a) {
        return $this->setStyleProperty($states, 'backdrop-hue-rotate', styleProperty('backdrop-hue-rotate', $a), $a);
    }

    function setBackdropInvert($states, ...$a) {
        return $this->setStyleProperty($states, 'backdrop-invert', styleProperty('backdrop-invert', $a), $a);
    }

    function setBackdropOpacity($states, ...$a) {
        return $this->setStyleProperty($states, 'backdrop-opacity', styleProperty('backdrop-opacity', $a), $a);
    }

    function setBackdropSaturate($states, ...$a) {
        return $this->setStyleProperty($states, 'backdrop-saturate', styleProperty('backdrop-saturate', $a), $a);
    }

    function setBackdropSepia($states, ...$a) {
        return $this->setStyleProperty($states, 'backdrop-sepia', styleProperty('backdrop-sepia', $a), $a);
    }

    function setBackfaceVisibility($states, ...$a) {
        return $this->setStyleProperty($states, 'backface-visibility', styleProperty('backface-visibility', $a), $a);
    }
    
    function setBackdropFilter($states, ...$a) {
        return $this->setStyleProperty($states, 'backdrop-filter', styleProperty('backdrop-filter', $a), $a);
    }

    function setBackground($states, ...$a) {
        return $this->setStyleProperty($states, 'background', styleProperty('background', $a), $a);
    }

    function setBackgroundAttachment($states, ...$a) {
        return $this->setStyleProperty($states, 'background-attachment', styleProperty('background-attachment', $a), $a);
    }

    function setBackgroundColor($states, ...$a) {
        return $this->setStyleProperty($states, 'background-color', styleProperty('background-color', $a), $a);
    }

    function setBackgroundImage($states, ...$a) {
        return $this->setStyleProperty($states, 'background-image', styleProperty('background-image', $a), $a);
    }

    function setBackgroundOrigin($states, ...$a) {
        return $this->setStyleProperty($states, 'background-origin', styleProperty('background-origin', $a), $a);
    }

    function setBackgroundPosition($states, ...$a) {
        return $this->setStyleProperty($states, 'background-position', styleProperty('background-position', $a), $a);
    }

    function setBackgroundPositionX($states, ...$a) {
        return $this->setStyleProperty($states, 'background-position-x', styleProperty('background-position-x', $a), $a);
    }

    function setBackgroundPositionY($states, ...$a) {
        return $this->setStyleProperty($states, 'background-position-y', styleProperty('background-position-y', $a), $a);
    }

    function setBackgroundRepeat($states, ...$a) {
        return $this->setStyleProperty($states, 'background-repeat', styleProperty('background-repeat', $a), $a);
    }

    function setBackgroundSize($states, ...$a) {
        return $this->setStyleProperty($states, 'background-size', styleProperty('background-size', $a), $a);
    }

    function setBlockOverflow($states, ...$a) {
        return $this->setStyleProperty($states, 'block-overflow', styleProperty('block-overflow', $a), $a);
    }

    function setBorder($states, ...$a) {
        return $this->setStyleProperty($states, 'border', styleProperty('border', $a), $a);
    }

    function setBorderBlock($states, ...$a) {
        return $this->setStyleProperty($states, 'border-block', styleProperty('border-block', $a), $a);
    }

    function setBorderBlockColor($states, ...$a) {
        return $this->setStyleProperty($states, 'border-block-color', styleProperty('border-block-color', $a), $a);
    }

    function setBorderBlockEnd($states, ...$a) {
        return $this->setStyleProperty($states, 'border-block-end', styleProperty('border-block-end', $a), $a);
    }

    function setBorderBlockEndColor($states, ...$a) {
        return $this->setStyleProperty($states, 'border-block-end-color', styleProperty('border-block-end-color', $a), $a);
    }

    function setBorderBlockEndStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'border-block-end-style', styleProperty('border-block-end-style', $a), $a);
    }

    function setBorderBlockEndWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'border-block-end-width', styleProperty('border-block-end-width', $a), $a);
    }

    function setBorderBlockStart($states, ...$a) {
        return $this->setStyleProperty($states, 'border-block-start', styleProperty('border-block-start', $a), $a);
    }

    function setBorderBlockStartColor($states, ...$a) {
        return $this->setStyleProperty($states, 'border-block-start-color', styleProperty('border-block-start-color', $a), $a);
    }

    function setBorderBlockStartStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'border-block-start-style', styleProperty('border-block-start-style', $a), $a);
    }

    function setBorderBlockStartWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'border-block-start-width', styleProperty('border-block-start-width', $a), $a);
    }

    function setBorderBlockStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'border-block-style', styleProperty('border-block-style', $a), $a);
    }

    function setBorderBlockWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'border-block-width', styleProperty('border-block-width', $a), $a);
    }

    function setBorderBottom($states, ...$a) {
        return $this->setStyleProperty($states, 'border-bottom', styleProperty('border-bottom', $a), $a);
    }

    function setBorderBottomColor($states, ...$a) {
        return $this->setStyleProperty($states, 'border-bottom-color', styleProperty('border-bottom-color', $a), $a);
    }

    function setBorderBottomLeftRadius($states, ...$a) {
        return $this->setStyleProperty($states, 'border-bottom-left-radius', styleProperty('border-bottom-left-radius', $a), $a);
    }

    function setBorderBottomRightRadius($states, ...$a) {
        return $this->setStyleProperty($states, 'border-bottom-right-radius', styleProperty('border-bottom-right-radius', $a), $a);
    }

    function setBorderBottomStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'border-bottom-style', styleProperty('border-bottom-style', $a), $a);
    }

    function setBorderBottomWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'border-bottom-width', styleProperty('border-bottom-width', $a), $a);
    }

    function setBorderCollapse($states, ...$a) {
        return $this->setStyleProperty($states, 'border-collapse', styleProperty('border-collapse', $a), $a);
    }

    function setBorderColor($states, ...$a) {
        return $this->setStyleProperty($states, 'border-color', styleProperty('border-color', $a), $a);
    }

    function setBorderEndEndRadius($states, ...$a) {
        return $this->setStyleProperty($states, 'border-end-end-radius', styleProperty('border-end-end-radius', $a), $a);
    }

    function setBorderEndStartRadius($states, ...$a) {
        return $this->setStyleProperty($states, 'border-end-start-radius', styleProperty('border-end-start-radius', $a), $a);
    }

    function setBorderImage($states, ...$a) {
        return $this->setStyleProperty($states, 'border-image', styleProperty('border-image', $a), $a);
    }

    function setBorderImageOutset($states, ...$a) {
        return $this->setStyleProperty($states, 'border-image-outset', styleProperty('border-image-outset', $a), $a);
    }

    function setBorderImageRepeat($states, ...$a) {
        return $this->setStyleProperty($states, 'border-image-repeat', styleProperty('border-image-repeat', $a), $a);
    }

    function setBorderImageSlice($states, ...$a) {
        return $this->setStyleProperty($states, 'border-image-slice', styleProperty('border-image-slice', $a), $a);
    }

    function setBorderImageSource($states, ...$a) {
        return $this->setStyleProperty($states, 'border-image-source', styleProperty('border-image-source', $a), $a);
    }

    function setBorderImageWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'border-image-width', styleProperty('border-image-width', $a), $a);
    }

    function setBorderInline($states, ...$a) {
        return $this->setStyleProperty($states, 'border-inline', styleProperty('border-inline', $a), $a);
    }

    function setBorderInlineColor($states, ...$a) {
        return $this->setStyleProperty($states, 'border-inline-color', styleProperty('border-inline-color', $a), $a);
    }

    function setBorderInlineEnd($states, ...$a) {
        return $this->setStyleProperty($states, 'border-inline-end', styleProperty('border-inline-end', $a), $a);
    }

    function setBorderInlineEndColor($states, ...$a) {
        return $this->setStyleProperty($states, 'border-inline-end-color', styleProperty('border-inline-end-color', $a), $a);
    }

    function setBorderInlineEndStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'border-inline-end-style', styleProperty('border-inline-end-style', $a), $a);
    }

    function setBorderInlineEndWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'border-inline-end-width', styleProperty('border-inline-end-width', $a), $a);
    }

    function setBorderInlineStart($states, ...$a) {
        return $this->setStyleProperty($states, 'border-inline-start', styleProperty('border-inline-start', $a), $a);
    }

    function setBorderInlineStartColor($states, ...$a) {
        return $this->setStyleProperty($states, 'border-inline-start-color', styleProperty('border-inline-start-color', $a), $a);
    }

    function setBorderInlineStartStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'border-inline-start-style', styleProperty('border-inline-start-style', $a), $a);
    }

    function setBorderInlineStartWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'border-inline-start-width', styleProperty('border-inline-start-width', $a), $a);
    }

    function setBorderInlineStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'border-inline-style', styleProperty('border-inline-style', $a), $a);
    }

    function setBorderInlineWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'border-inline-width', styleProperty('border-inline-width', $a), $a);
    }

    function setBorderLeft($states, ...$a) {
        return $this->setStyleProperty($states, 'border-left', styleProperty('border-left', $a), $a);
    }

    function setBorderLeftColor($states, ...$a) {
        return $this->setStyleProperty($states, 'border-left-color', styleProperty('border-left-color', $a), $a);
    }

    function setBorderLeftStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'border-left-style', styleProperty('border-left-style', $a), $a);
    }

    function setBorderLeftWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'border-left-width', styleProperty('border-left-width', $a), $a);
    }

    function setBorderRadius($states, ...$a) {
        return $this->setStyleProperty($states, 'border-radius', styleProperty('border-radius', $a), $a);
    }

    function setBorderRight($states, ...$a) {
        return $this->setStyleProperty($states, 'border-right', styleProperty('border-right', $a), $a);
    }

    function setBorderRightColor($states, ...$a) {
        return $this->setStyleProperty($states, 'border-right-color', styleProperty('border-right-color', $a), $a);
    }

    function setBorderRightStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'border-right-style', styleProperty('border-right-style', $a), $a);
    }

    function setBorderRightWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'border-right-width', styleProperty('border-right-width', $a), $a);
    }

    function setBorderSpacing($states, ...$a) {
        return $this->setStyleProperty($states, 'border-spacing', styleProperty('border-spacing', $a), $a);
    }

    function setBorderStartEndRadius($states, ...$a) {
        return $this->setStyleProperty($states, 'border-start-end-radius', styleProperty('border-start-end-radius', $a), $a);
    }

    function setBorderStartStartRadius($states, ...$a) {
        return $this->setStyleProperty($states, 'border-start-start-radius', styleProperty('border-start-start-radius', $a), $a);
    }

    function setBorderStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'border-style', styleProperty('border-style', $a), $a);
    }

    function setBorderTop($states, ...$a) {
        return $this->setStyleProperty($states, 'border-top', styleProperty('border-top', $a), $a);
    }

    function setBorderTopColor($states, ...$a) {
        return $this->setStyleProperty($states, 'border-top-color', styleProperty('border-top-color', $a), $a);
    }

    function setBorderTopLeftRadius($states, ...$a) {
        return $this->setStyleProperty($states, 'border-top-left-radius', styleProperty('border-top-left-radius', $a), $a);
    }

    function setBorderTopRightRadius($states, ...$a) {
        return $this->setStyleProperty($states, 'border-top-right-radius', styleProperty('border-top-right-radius', $a), $a);
    }

    function setBorderTopStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'border-top-style', styleProperty('border-top-style', $a), $a);
    }

    function setBorderTopWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'border-top-width', styleProperty('border-top-width', $a), $a);
    }

    function setBorderWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'border-width', styleProperty('border-width', $a), $a);
    }

    function setBottom($states, ...$a) {
        return $this->setStyleProperty($states, 'bottom', styleProperty('bottom', $a), $a);
    }

    function setBoxDecorationBreak($states, ...$a) {
        return $this->setStyleProperty($states, 'box-decoration-break', styleProperty('box-decoration-break', $a), $a);
    }

    function setBoxShadow($states, ...$a) {
        return $this->setStyleProperty($states, 'box-shadow', styleProperty('box-shadow', $a), $a);
    }

    function setBoxSizing($states, ...$a) {
        return $this->setStyleProperty($states, 'box-sizing', styleProperty('box-sizing', $a), $a);
    }

    function setBreakAfter($states, ...$a) {
        return $this->setStyleProperty($states, 'break-after', styleProperty('break-after', $a), $a);
    }

    function setBreakBefore($states, ...$a) {
        return $this->setStyleProperty($states, 'break-before', styleProperty('break-before', $a), $a);
    }

    function setBreakInside($states, ...$a) {
        return $this->setStyleProperty($states, 'break-inside', styleProperty('break-inside', $a), $a);
    }

    function setCaptionSide($states, ...$a) {
        return $this->setStyleProperty($states, 'caption-side', styleProperty('caption-side', $a), $a);
    }

    function setCaretColor($states, ...$a) {
        return $this->setStyleProperty($states, 'caret-color', styleProperty('caret-color', $a), $a);
    }

    function setClear($states, ...$a) {
        return $this->setStyleProperty($states, 'clear', styleProperty('clear', $a), $a);
    }

    function setClip($states, ...$a) {
        return $this->setStyleProperty($states, 'clip', styleProperty('clip', $a), $a);
    }

    function setClipPath($states, ...$a) {
        return $this->setStyleProperty($states, 'clip-path', styleProperty('clip-path', $a), $a);
    }

    function setClipRule($states, ...$a) {
        return $this->setStyleProperty($states, 'clip-rule', styleProperty('clip-rule', $a), $a);
    }

    function setColor($states, ...$a) {
        return $this->setStyleProperty($states, 'color', styleProperty('color', $a), $a);
    }

    function setColorInterpolation($states, ...$a) {
        return $this->setStyleProperty($states, 'color-interpolation', styleProperty('color-interpolation', $a), $a);
    }

    function setColorInterpolationFilters($states, ...$a) {
        return $this->setStyleProperty($states, 'color-interpolation-filters', styleProperty('color-interpolation-filters', $a), $a);
    }

    function setColorRendering($states, ...$a) {
        return $this->setStyleProperty($states, 'color-rendering', styleProperty('color-rendering', $a), $a);
    }

    function setColumnCount($states, ...$a) {
        return $this->setStyleProperty($states, 'column-count', styleProperty('column-count', $a), $a);
    }

    function setColumnFill($states, ...$a) {
        return $this->setStyleProperty($states, 'column-fill', styleProperty('column-fill', $a), $a);
    }

    function setColumnGap($states, ...$a) {
        return $this->setStyleProperty($states, 'column-gap', styleProperty('column-gap', $a), $a);
    }

    function setColumnRule($states, ...$a) {
        return $this->setStyleProperty($states, 'column-rule', styleProperty('column-rule', $a), $a);
    }

    function setColumnRuleColor($states, ...$a) {
        return $this->setStyleProperty($states, 'column-rule-color', styleProperty('column-rule-color', $a), $a);
    }

    function setColumnRuleStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'column-rule-style', styleProperty('column-rule-style', $a), $a);
    }

    function setColumnRuleWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'column-rule-width', styleProperty('column-rule-width', $a), $a);
    }

    function setColumnSpan($states, ...$a) {
        return $this->setStyleProperty($states, 'column-span', styleProperty('column-span', $a), $a);
    }

    function setColumnWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'column-width', styleProperty('column-width', $a), $a);
    }

    function setColumns($states, ...$a) {
        return $this->setStyleProperty($states, 'columns', styleProperty('columns', $a), $a);
    }

    function setContent($states, ...$a) {
        return $this->setStyleProperty($states, 'content', styleProperty('content', $a), $a);
    }

    function setCounterIncrement($states, ...$a) {
        return $this->setStyleProperty($states, 'counter-increment', styleProperty('counter-increment', $a), $a);
    }

    function setCounterReset($states, ...$a) {
        return $this->setStyleProperty($states, 'counter-reset', styleProperty('counter-reset', $a), $a);
    }

    function setCursor($states, ...$a) {
        return $this->setStyleProperty($states, 'cursor', styleProperty('cursor', $a), $a);
    }

    function setDirection($states, ...$a) {
        return $this->setStyleProperty($states, 'direction', styleProperty('direction', $a), $a);
    }

    function setDisplay($states, ...$a) {
        return $this->setStyleProperty($states, 'display', styleProperty('display', $a), $a);
    }

    function setEmptyCells($states, ...$a) {
        return $this->setStyleProperty($states, 'empty-cells', styleProperty('empty-cells', $a), $a);
    }

    function setFill($states, ...$a) {
        return $this->setStyleProperty($states, 'fill', styleProperty('fill', $a), $a);
    }

    function setFillOpacity($states, ...$a) {
        return $this->setStyleProperty($states, 'fill-opacity', styleProperty('fill-opacity', $a), $a);
    }

    function setFillRule($states, ...$a) {
        return $this->setStyleProperty($states, 'fill-rule', styleProperty('fill-rule', $a), $a);
    }

    function setFilter($states, ...$a) {
        return $this->setStyleProperty($states, 'filter', styleProperty('filter', $a), $a);
    }

    function setFlex($states, ...$a) {
        return $this->setStyleProperty($states, 'flex', styleProperty('flex', $a), $a);
    }

    function setFlexBasis($states, ...$a) {
        return $this->setStyleProperty($states, 'flex-basis', styleProperty('flex-basis', $a), $a);
    }

    function setFlexDirection($states, ...$a) {
        return $this->setStyleProperty($states, 'flex-direction', styleProperty('flex-direction', $a), $a);
    }

    function setFlexFlow($states, ...$a) {
        return $this->setStyleProperty($states, 'flex-flow', styleProperty('flex-flow', $a), $a);
    }

    function setFlexGrow($states, ...$a) {
        return $this->setStyleProperty($states, 'flex-grow', styleProperty('flex-grow', $a), $a);
    }

    function setFlexShrink($states, ...$a) {
        return $this->setStyleProperty($states, 'flex-shrink', styleProperty('flex-shrink', $a), $a);
    }

    function setFlexWrap($states, ...$a) {
        return $this->setStyleProperty($states, 'flex-wrap', styleProperty('flex-wrap', $a), $a);
    }

    function setFloat($states, ...$a) {
        return $this->setStyleProperty($states, 'float', styleProperty('float', $a), $a);
    }

    function setFloodColor($states, ...$a) {
        return $this->setStyleProperty($states, 'flood-color', styleProperty('flood-color', $a), $a);
    }

    function setFloodOpacity($states, ...$a) {
        return $this->setStyleProperty($states, 'flood-opacity', styleProperty('flood-opacity', $a), $a);
    }

    function setFont($states, ...$a) {
        return $this->setStyleProperty($states, 'font', styleProperty('font', $a), $a);
    }

    function setFontFamily($states, ...$a) {
        return $this->setStyleProperty($states, 'font-family', styleProperty('font-family', $a), $a);
    }

    function setFontSize($states, ...$a) {
        return $this->setStyleProperty($states, 'font-size', styleProperty('font-size', $a), $a);
    }

    function setFontSizeAdjust($states, ...$a) {
        return $this->setStyleProperty($states, 'font-size-adjust', styleProperty('font-size-adjust', $a), $a);
    }

    function setFontStretch($states, ...$a) {
        return $this->setStyleProperty($states, 'font-stretch', styleProperty('font-stretch', $a), $a);
    }

    function setFontStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'font-style', styleProperty('font-style', $a), $a);
    }

    function setFontVariant($states, ...$a) {
        return $this->setStyleProperty($states, 'font-variant', styleProperty('font-variant', $a), $a);
    }

    function setFontWeight($states, ...$a) {
        return $this->setStyleProperty($states, 'font-weight', styleProperty('font-weight', $a), $a);
    }

    function setGap($states, ...$a) {
        return $this->setStyleProperty($states, 'gap', styleProperty('gap', $a), $a);
    }

    function setGrid($states, ...$a) {
        return $this->setStyleProperty($states, 'grid', styleProperty('grid', $a), $a);
    }

    function setGridArea($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-area', styleProperty('grid-area', $a), $a);
    }

    function setGridAutoColumns($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-auto-columns', styleProperty('grid-auto-columns', $a), $a);
    }

    function setGridAutoFlow($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-auto-flow', styleProperty('grid-auto-flow', $a), $a);
    }

    function setGridAutoRows($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-auto-rows', styleProperty('grid-auto-rows', $a), $a);
    }

    function setGridColumn($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-column', styleProperty('grid-column', $a), $a);
    }

    function setGridColumnEnd($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-column-end', styleProperty('grid-column-end', $a), $a);
    }

    function setGridColumnGap($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-column-gap', styleProperty('grid-column-gap', $a), $a);
    }

    function setGridColumnStart($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-column-start', styleProperty('grid-column-start', $a), $a);
    }

    function setGridGap($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-gap', styleProperty('grid-gap', $a), $a);
    }

    function setGridRow($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-row', styleProperty('grid-row', $a), $a);
    }

    function setGridRowEnd($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-row-end', styleProperty('grid-row-end', $a), $a);
    }

    function setGridRowGap($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-row-gap', styleProperty('grid-row-gap', $a), $a);
    }

    function setGridRowStart($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-row-start', styleProperty('grid-row-start', $a), $a);
    }

    function setGridTemplate($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-template', styleProperty('grid-template', $a), $a);
    }

    function setGridTemplateAreas($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-template-areas', styleProperty('grid-template-areas', $a), $a);
    }

    function setGridTemplateColumns($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-template-columns', styleProperty('grid-template-columns', $a), $a);
    }

    function setGridTemplateRows($states, ...$a) {
        return $this->setStyleProperty($states, 'grid-template-rows', styleProperty('grid-template-rows', $a), $a);
    }

    function setHangingPunctuation($states, ...$a) {
        return $this->setStyleProperty($states, 'hanging-punctuation', styleProperty('hanging-punctuation', $a), $a);
    }

    function setHeight($states, ...$a) {
        return $this->setStyleProperty($states, 'height', styleProperty('height', $a), $a);
    }

    function setHyphens($states, ...$a) {
        return $this->setStyleProperty($states, 'hyphens', styleProperty('hyphens', $a), $a);
    }

    function setImageOrientation($states, ...$a) {
        return $this->setStyleProperty($states, 'image-orientation', styleProperty('image-orientation', $a), $a);
    }

    function setImageRendering($states, ...$a) {
        return $this->setStyleProperty($states, 'image-rendering', styleProperty('image-rendering', $a), $a);
    }

    function setImageResolution($states, ...$a) {
        return $this->setStyleProperty($states, 'image-resolution', styleProperty('image-resolution', $a), $a);
    }

    function setImeMode($states, ...$a) {
        return $this->setStyleProperty($states, 'ime-mode', styleProperty('ime-mode', $a), $a);
    }

    function setInitialLetter($states, ...$a) {
        return $this->setStyleProperty($states, 'initial-letter', styleProperty('initial-letter', $a), $a);
    }

    function setInitialLetterAlign($states, ...$a) {
        return $this->setStyleProperty($states, 'initial-letter-align', styleProperty('initial-letter-align', $a), $a);
    }

    function setInitialLetterWrap($states, ...$a) {
        return $this->setStyleProperty($states, 'initial-letter-wrap', styleProperty('initial-letter-wrap', $a), $a);
    }

    function setInlineBoxAlign($states, ...$a) {
        return $this->setStyleProperty($states, 'inline-box-align', styleProperty('inline-box-align', $a), $a);
    }

    function setJustifyContent($states, ...$a) {
        return $this->setStyleProperty($states, 'justify-content', styleProperty('justify-content', $a), $a);
    }

    function setJustifyItems($states, ...$a) {
        return $this->setStyleProperty($states, 'justify-items', styleProperty('justify-items', $a), $a);
    }

    function setJustifySelf($states, ...$a) {
        return $this->setStyleProperty($states, 'justify-self', styleProperty('justify-self', $a), $a);
    }

    function setLayoutGrid($states, ...$a) {
        return $this->setStyleProperty($states, 'layout-grid', styleProperty('layout-grid', $a), $a);
    }

    function setLayoutGridChar($states, ...$a) {
        return $this->setStyleProperty($states, 'layout-grid-char', styleProperty('layout-grid-char', $a), $a);
    }

    function setLayoutGridLine($states, ...$a) {
        return $this->setStyleProperty($states, 'layout-grid-line', styleProperty('layout-grid-line', $a), $a);
    }

    function setLayoutGridMode($states, ...$a) {
        return $this->setStyleProperty($states, 'layout-grid-mode', styleProperty('layout-grid-mode', $a), $a);
    }

    function setLayoutGridType($states, ...$a) {
        return $this->setStyleProperty($states, 'layout-grid-type', styleProperty('layout-grid-type', $a), $a);
    }

    function setLeft($states, ...$a) {
        return $this->setStyleProperty($states, 'left', styleProperty('left', $a), $a);
    }

    function setLetterSpacing($states, ...$a) {
        return $this->setStyleProperty($states, 'letter-spacing', styleProperty('letter-spacing', $a), $a);
    }

    function setLineBreak($states, ...$a) {
        return $this->setStyleProperty($states, 'line-break', styleProperty('line-break', $a), $a);
    }

    function setLineHeight($states, ...$a) {
        return $this->setStyleProperty($states, 'line-height', styleProperty('line-height', $a), $a);
    }

    function setListStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'list-style', styleProperty('list-style', $a), $a);
    }

    function setListStyleImage($states, ...$a) {
        return $this->setStyleProperty($states, 'list-style-image', styleProperty('list-style-image', $a), $a);
    }

    function setListStylePosition($states, ...$a) {
        return $this->setStyleProperty($states, 'list-style-position', styleProperty('list-style-position', $a), $a);
    }

    function setListStyleType($states, ...$a) {
        return $this->setStyleProperty($states, 'list-style-type', styleProperty('list-style-type', $a), $a);
    }

    function setMargin($states, ...$a) {
        return $this->setStyleProperty($states, 'margin', styleProperty('margin', $a), $a);
    }

    function setMarginBlock($states, ...$a) {
        return $this->setStyleProperty($states, 'margin-block', styleProperty('margin-block', $a), $a);
    }

    function setMarginBlockEnd($states, ...$a) {
        return $this->setStyleProperty($states, 'margin-block-end', styleProperty('margin-block-end', $a), $a);
    }

    function setMarginBlockStart($states, ...$a) {
        return $this->setStyleProperty($states, 'margin-block-start', styleProperty('margin-block-start', $a), $a);
    }

    function setMarginBottom($states, ...$a) {
        return $this->setStyleProperty($states, 'margin-bottom', styleProperty('margin-bottom', $a), $a);
    }

    function setMarginInline($states, ...$a) {
        return $this->setStyleProperty($states, 'margin-inline', styleProperty('margin-inline', $a), $a);
    }

    function setMarginInlineEnd($states, ...$a) {
        return $this->setStyleProperty($states, 'margin-inline-end', styleProperty('margin-inline-end', $a), $a);
    }

    function setMarginInlineStart($states, ...$a) {
        return $this->setStyleProperty($states, 'margin-inline-start', styleProperty('margin-inline-start', $a), $a);
    }

    function setMarginLeft($states, ...$a) {
        return $this->setStyleProperty($states, 'margin-left', styleProperty('margin-left', $a), $a);
    }

    function setMarginRight($states, ...$a) {
        return $this->setStyleProperty($states, 'margin-right', styleProperty('margin-right', $a), $a);
    }

    function setMarginTop($states, ...$a) {
        return $this->setStyleProperty($states, 'margin-top', styleProperty('margin-top', $a), $a);
    }

    function setMask($states, ...$a) {
        return $this->setStyleProperty($states, 'mask', styleProperty('mask', $a), $a);
    }

    function setMaskClip($states, ...$a) {
        return $this->setStyleProperty($states, 'mask-clip', styleProperty('mask-clip', $a), $a);
    }

    function setMaskComposite($states, ...$a) {
        return $this->setStyleProperty($states, 'mask-composite', styleProperty('mask-composite', $a), $a);
    }

    function setMaskImage($states, ...$a) {
        return $this->setStyleProperty($states, 'mask-image', styleProperty('mask-image', $a), $a);
    }

    function setMaskMode($states, ...$a) {
        return $this->setStyleProperty($states, 'mask-mode', styleProperty('mask-mode', $a), $a);
    }

    function setMaskOrigin($states, ...$a) {
        return $this->setStyleProperty($states, 'mask-origin', styleProperty('mask-origin', $a), $a);
    }

    function setMaskPosition($states, ...$a) {
        return $this->setStyleProperty($states, 'mask-position', styleProperty('mask-position', $a), $a);
    }

    function setMaskRepeat($states, ...$a) {
        return $this->setStyleProperty($states, 'mask-repeat', styleProperty('mask-repeat', $a), $a);
    }

    function setMaskSize($states, ...$a) {
        return $this->setStyleProperty($states, 'mask-size', styleProperty('mask-size', $a), $a);
    }

    function setMaskType($states, ...$a) {
        return $this->setStyleProperty($states, 'mask-type', styleProperty('mask-type', $a), $a);
    }

    function setMaxHeight($states, ...$a) {
        return $this->setStyleProperty($states, 'max-height', styleProperty('max-height', $a), $a);
    }

    function setMaxWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'max-width', styleProperty('max-width', $a), $a);
    }

    function setMinHeight($states, ...$a) {
        return $this->setStyleProperty($states, 'min-height', styleProperty('min-height', $a), $a);
    }

    function setMinWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'min-width', styleProperty('min-width', $a), $a);
    }

    function setMixBlendMode($states, ...$a) {
        return $this->setStyleProperty($states, 'mix-blend-mode', styleProperty('mix-blend-mode', $a), $a);
    }

    function setMotion($states, ...$a) {
        return $this->setStyleProperty($states, 'motion', styleProperty('motion', $a), $a);
    }

    function setMotionOffset($states, ...$a) {
        return $this->setStyleProperty($states, 'motion-offset', styleProperty('motion-offset', $a), $a);
    }

    function setMotionPath($states, ...$a) {
        return $this->setStyleProperty($states, 'motion-path', styleProperty('motion-path', $a), $a);
    }

    function setMotionRotation($states, ...$a) {
        return $this->setStyleProperty($states, 'motion-rotation', styleProperty('motion-rotation', $a), $a);
    }

    function setObjectFit($states, ...$a) {
        return $this->setStyleProperty($states, 'object-fit', styleProperty('object-fit', $a), $a);
    }

    function setObjectPosition($states, ...$a) {
        return $this->setStyleProperty($states, 'object-position', styleProperty('object-position', $a), $a);
    }

    function setOffset($states, ...$a) {
        return $this->setStyleProperty($states, 'offset', styleProperty('offset', $a), $a);
    }

    function setOffsetAnchor($states, ...$a) {
        return $this->setStyleProperty($states, 'offset-anchor', styleProperty('offset-anchor', $a), $a);
    }

    function setOffsetDistance($states, ...$a) {
        return $this->setStyleProperty($states, 'offset-distance', styleProperty('offset-distance', $a), $a);
    }

    function setOffsetPath($states, ...$a) {
        return $this->setStyleProperty($states, 'offset-path', styleProperty('offset-path', $a), $a);
    }

    function setOffsetPosition($states, ...$a) {
        return $this->setStyleProperty($states, 'offset-position', styleProperty('offset-position', $a), $a);
    }

    function setOffsetRotate($states, ...$a) {
        return $this->setStyleProperty($states, 'offset-rotate', styleProperty('offset-rotate', $a), $a);
    }

    function setOpacity($states, ...$a) {
        return $this->setStyleProperty($states, 'opacity', styleProperty('opacity', $a), $a);
    }

    function setOrder($states, ...$a) {
        return $this->setStyleProperty($states, 'order', styleProperty('order', $a), $a);
    }

    function setOrphans($states, ...$a) {
        return $this->setStyleProperty($states, 'orphans', styleProperty('orphans', $a), $a);
    }

    function setOutline($states, ...$a) {
        return $this->setStyleProperty($states, 'outline', styleProperty('outline', $a), $a);
    }

    function setOutlineColor($states, ...$a) {
        return $this->setStyleProperty($states, 'outline-color', styleProperty('outline-color', $a), $a);
    }

    function setOutlineOffset($states, ...$a) {
        return $this->setStyleProperty($states, 'outline-offset', styleProperty('outline-offset', $a), $a);
    }

    function setOutlineStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'outline-style', styleProperty('outline-style', $a), $a);
    }

    function setOutlineWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'outline-width', styleProperty('outline-width', $a), $a);
    }

    function setOverflow($states, ...$a) {
        return $this->setStyleProperty($states, 'overflow', styleProperty('overflow', $a), $a);
    }

    function setOverflowWrap($states, ...$a) {
        return $this->setStyleProperty($states, 'overflow-wrap', styleProperty('overflow-wrap', $a), $a);
    }

    function setOverflowX($states, ...$a) {
        return $this->setStyleProperty($states, 'overflow-x', styleProperty('overflow-x', $a), $a);
    }

    function setOverflowY($states, ...$a) {
        return $this->setStyleProperty($states, 'overflow-y', styleProperty('overflow-y', $a), $a);
    }

    function setPadding($states, ...$a) {
        return $this->setStyleProperty($states, 'padding', styleProperty('padding', $a), $a);
    }

    function setPaddingBottom($states, ...$a) {
        return $this->setStyleProperty($states, 'padding-bottom', styleProperty('padding-bottom', $a), $a);
    }

    function setPaddingLeft($states, ...$a) {
        return $this->setStyleProperty($states, 'padding-left', styleProperty('padding-left', $a), $a);
    }

    function setPaddingRight($states, ...$a) {
        return $this->setStyleProperty($states, 'padding-right', styleProperty('padding-right', $a), $a);
    }

    function setPaddingTop($states, ...$a) {
        return $this->setStyleProperty($states, 'padding-top', styleProperty('padding-top', $a), $a);
    }

    function setPage($states, ...$a) {
        return $this->setStyleProperty($states, 'page', styleProperty('page', $a), $a);
    }

    function setPageBreakAfter($states, ...$a) {
        return $this->setStyleProperty($states, 'page-break-after', styleProperty('page-break-after', $a), $a);
    }

    function setPageBreakBefore($states, ...$a) {
        return $this->setStyleProperty($states, 'page-break-before', styleProperty('page-break-before', $a), $a);
    }

    function setPageBreakInside($states, ...$a) {
        return $this->setStyleProperty($states, 'page-break-inside', styleProperty('page-break-inside', $a), $a);
    }

    function setPaintOrder($states, ...$a) {
        return $this->setStyleProperty($states, 'paint-order', styleProperty('paint-order', $a), $a);
    }

    function setPerspective($states, ...$a) {
        return $this->setStyleProperty($states, 'perspective', styleProperty('perspective', $a), $a);
    }

    function setPerspectiveOrigin($states, ...$a) {
        return $this->setStyleProperty($states, 'perspective-origin', styleProperty('perspective-origin', $a), $a);
    }

    function setPointerEvents($states, ...$a) {
        return $this->setStyleProperty($states, 'pointer-events', styleProperty('pointer-events', $a), $a);
    }

    function setPosition($states, ...$a) {
        return $this->setStyleProperty($states, 'position', styleProperty('position', $a), $a);
    }

    function setQuotes($states, ...$a) {
        return $this->setStyleProperty($states, 'quotes', styleProperty('quotes', $a), $a);
    }

    function setResize($states, ...$a) {
        return $this->setStyleProperty($states, 'resize', styleProperty('resize', $a), $a);
    }

    function setRight($states, ...$a) {
        return $this->setStyleProperty($states, 'right', styleProperty('right', $a), $a);
    }

    function setRotate($states, ...$a) {
        return $this->setStyleProperty($states, 'rotate', styleProperty('rotate', $a), $a);
    }

    function setRowGap($states, ...$a) {
        return $this->setStyleProperty($states, 'row-gap', styleProperty('row-gap', $a), $a);
    }

    function setScale($states, ...$a) {
        return $this->setStyleProperty($states, 'scale', styleProperty('scale', $a), $a);
    }

    function setScrollBehavior($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-behavior', styleProperty('scroll-behavior', $a), $a);
    }

    function setScrollMargin($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-margin', styleProperty('scroll-margin', $a), $a);
    }

    function setScrollMarginBlock($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-margin-block', styleProperty('scroll-margin-block', $a), $a);
    }

    function setScrollMarginBlockEnd($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-margin-block-end', styleProperty('scroll-margin-block-end', $a), $a);
    }

    function setScrollMarginBlockStart($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-margin-block-start', styleProperty('scroll-margin-block-start', $a), $a);
    }

    function setScrollMarginBottom($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-margin-bottom', styleProperty('scroll-margin-bottom', $a), $a);
    }

    function setScrollMarginInline($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-margin-inline', styleProperty('scroll-margin-inline', $a), $a);
    }

    function setScrollMarginInlineEnd($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-margin-inline-end', styleProperty('scroll-margin-inline-end', $a), $a);
    }

    function setScrollMarginInlineStart($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-margin-inline-start', styleProperty('scroll-margin-inline-start', $a), $a);
    }

    function setScrollMarginLeft($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-margin-left', styleProperty('scroll-margin-left', $a), $a);
    }

    function setScrollMarginRight($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-margin-right', styleProperty('scroll-margin-right', $a), $a);
    }

    function setScrollMarginTop($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-margin-top', styleProperty('scroll-margin-top', $a), $a);
    }

    function setScrollPadding($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-padding', styleProperty('scroll-padding', $a), $a);
    }

    function setScrollPaddingBlock($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-padding-block', styleProperty('scroll-padding-block', $a), $a);
    }

    function setScrollPaddingBlockEnd($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-padding-block-end', styleProperty('scroll-padding-block-end', $a), $a);
    }

    function setScrollPaddingBlockStart($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-padding-block-start', styleProperty('scroll-padding-block-start', $a), $a);
    }

    function setScrollPaddingBottom($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-padding-bottom', styleProperty('scroll-padding-bottom', $a), $a);
    }

    function setScrollPaddingInline($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-padding-inline', styleProperty('scroll-padding-inline', $a), $a);
    }

    function setScrollPaddingInlineEnd($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-padding-inline-end', styleProperty('scroll-padding-inline-end', $a), $a);
    }

    function setScrollPaddingInlineStart($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-padding-inline-start', styleProperty('scroll-padding-inline-start', $a), $a);
    }

    function setScrollPaddingLeft($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-padding-left', styleProperty('scroll-padding-left', $a), $a);
    }

    function setScrollPaddingRight($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-padding-right', styleProperty('scroll-padding-right', $a), $a);
    }

    function setScrollPaddingTop($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-padding-top', styleProperty('scroll-padding-top', $a), $a);
    }

    function setScrollSnapAlign($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-snap-align', styleProperty('scroll-snap-align', $a), $a);
    }

    function setScrollSnapStop($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-snap-stop', styleProperty('scroll-snap-stop', $a), $a);
    }

    function setScrollSnapType($states, ...$a) {
        return $this->setStyleProperty($states, 'scroll-snap-type', styleProperty('scroll-snap-type', $a), $a);
    }

    function setScrollbarColor($states, ...$a) {
        return $this->setStyleProperty($states, 'scrollbar-color', styleProperty('scrollbar-color', $a), $a);
    }

    function setScrollbarWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'scrollbar-width', styleProperty('scrollbar-width', $a), $a);
    }

    function setShapeImageThreshold($states, ...$a) {
        return $this->setStyleProperty($states, 'shape-image-threshold', styleProperty('shape-image-threshold', $a), $a);
    }

    function setShapeMargin($states, ...$a) {
        return $this->setStyleProperty($states, 'shape-margin', styleProperty('shape-margin', $a), $a);
    }

    function setShapeOutside($states, ...$a) {
        return $this->setStyleProperty($states, 'shape-outside', styleProperty('shape-outside', $a), $a);
    }

    function setSpeak($states, ...$a) {
        return $this->setStyleProperty($states, 'speak', styleProperty('speak', $a), $a);
    }

    function setSpeakAs($states, ...$a) {
        return $this->setStyleProperty($states, 'speak-as', styleProperty('speak-as', $a), $a);
    }

    function setStringSet($states, ...$a) {
        return $this->setStyleProperty($states, 'string-set', styleProperty('string-set', $a), $a);
    }

    function setStroke($states, ...$a) {
        return $this->setStyleProperty($states, 'stroke', styleProperty('stroke', $a), $a);
    }

    function setStrokeDasharray($states, ...$a) {
        return $this->setStyleProperty($states, 'stroke-dasharray', styleProperty('stroke-dasharray', $a), $a);
    }

    function setStrokeDashoffset($states, ...$a) {
        return $this->setStyleProperty($states, 'stroke-dashoffset', styleProperty('stroke-dashoffset', $a), $a);
    }

    function setStrokeLinecap($states, ...$a) {
        return $this->setStyleProperty($states, 'stroke-linecap', styleProperty('stroke-linecap', $a), $a);
    }

    function setStrokeLinejoin($states, ...$a) {
        return $this->setStyleProperty($states, 'stroke-linejoin', styleProperty('stroke-linejoin', $a), $a);
    }

    function setStrokeMiterlimit($states, ...$a) {
        return $this->setStyleProperty($states, 'stroke-miterlimit', styleProperty('stroke-miterlimit', $a), $a);
    }

    function setStrokeOpacity($states, ...$a) {
        return $this->setStyleProperty($states, 'stroke-opacity', styleProperty('stroke-opacity', $a), $a);
    }

    function setStrokeWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'stroke-width', styleProperty('stroke-width', $a), $a);
    }

    function setTabSize($states, ...$a) {
        return $this->setStyleProperty($states, 'tab-size', styleProperty('tab-size', $a), $a);
    }

    function setTableLayout($states, ...$a) {
        return $this->setStyleProperty($states, 'table-layout', styleProperty('table-layout', $a), $a);
    }

    function setTextAlign($states, ...$a) {
        return $this->setStyleProperty($states, 'text-align', styleProperty('text-align', $a), $a);
    }

    function setTextAlignAll($states, ...$a) {
        return $this->setStyleProperty($states, 'text-align-all', styleProperty('text-align-all', $a), $a);
    }

    function setTextAlignLast($states, ...$a) {
        return $this->setStyleProperty($states, 'text-align-last', styleProperty('text-align-last', $a), $a);
    }

    function setTextCombineUpright($states, ...$a) {
        return $this->setStyleProperty($states, 'text-combine-upright', styleProperty('text-combine-upright', $a), $a);
    }

    function setTextDecoration($states, ...$a) {
        return $this->setStyleProperty($states, 'text-decoration', styleProperty('text-decoration', $a), $a);
    }

    function setTextDecorationColor($states, ...$a) {
        return $this->setStyleProperty($states, 'text-decoration-color', styleProperty('text-decoration-color', $a), $a);
    }

    function setTextDecorationLine($states, ...$a) {
        return $this->setStyleProperty($states, 'text-decoration-line', styleProperty('text-decoration-line', $a), $a);
    }

    function setTextDecorationSkip($states, ...$a) {
        return $this->setStyleProperty($states, 'text-decoration-skip', styleProperty('text-decoration-skip', $a), $a);
    }

    function setTextDecorationSkipInk($states, ...$a) {
        return $this->setStyleProperty($states, 'text-decoration-skip-ink', styleProperty('text-decoration-skip-ink', $a), $a);
    }

    function setTextDecorationStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'text-decoration-style', styleProperty('text-decoration-style', $a), $a);
    }

    function setTextDecorationThickness($states, ...$a) {
        return $this->setStyleProperty($states, 'text-decoration-thickness', styleProperty('text-decoration-thickness', $a), $a);
    }

    function setTextDecorationWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'text-decoration-width', styleProperty('text-decoration-width', $a), $a);
    }

    function setTextEmphasis($states, ...$a) {
        return $this->setStyleProperty($states, 'text-emphasis', styleProperty('text-emphasis', $a), $a);
    }

    function setTextEmphasisColor($states, ...$a) {
        return $this->setStyleProperty($states, 'text-emphasis-color', styleProperty('text-emphasis-color', $a), $a);
    }

    function setTextEmphasisPosition($states, ...$a) {
        return $this->setStyleProperty($states, 'text-emphasis-position', styleProperty('text-emphasis-position', $a), $a);
    }

    function setTextEmphasisStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'text-emphasis-style', styleProperty('text-emphasis-style', $a), $a);
    }

    function setTextIndent($states, ...$a) {
        return $this->setStyleProperty($states, 'text-indent', styleProperty('text-indent', $a), $a);
    }

    function setTextJustify($states, ...$a) {
        return $this->setStyleProperty($states, 'text-justify', styleProperty('text-justify', $a), $a);
    }

    function setTextOrientation($states, ...$a) {
        return $this->setStyleProperty($states, 'text-orientation', styleProperty('text-orientation', $a), $a);
    }

    function setTextOverflow($states, ...$a) {
        return $this->setStyleProperty($states, 'text-overflow', styleProperty('text-overflow', $a), $a);
    }

    function setTextRendering($states, ...$a) {
        return $this->setStyleProperty($states, 'text-rendering', styleProperty('text-rendering', $a), $a);
    }

    function setTextShadow($states, ...$a) {
        return $this->setStyleProperty($states, 'text-shadow', styleProperty('text-shadow', $a), $a);
    }

    function setTextSizeAdjust($states, ...$a) {
        return $this->setStyleProperty($states, 'text-size-adjust', styleProperty('text-size-adjust', $a), $a);
    }

    function setTextTransform($states, ...$a) {
        return $this->setStyleProperty($states, 'text-transform', styleProperty('text-transform', $a), $a);
    }

    function setTextUnderlinePosition($states, ...$a) {
        return $this->setStyleProperty($states, 'text-underline-position', styleProperty('text-underline-position', $a), $a);
    }

    function setTop($states, ...$a) {
        return $this->setStyleProperty($states, 'top', styleProperty('top', $a), $a);
    }

    function setTouchAction($states, ...$a) {
        return $this->setStyleProperty($states, 'touch-action', styleProperty('touch-action', $a), $a);
    }

    function setTransform($states, ...$a) {
        return $this->setStyleProperty($states, 'transform', styleProperty('transform', $a), $a);
    }

    function setTransformBox($states, ...$a) {
        return $this->setStyleProperty($states, 'transform-box', styleProperty('transform-box', $a), $a);
    }

    function setTransformOrigin($states, ...$a) {
        return $this->setStyleProperty($states, 'transform-origin', styleProperty('transform-origin', $a), $a);
    }

    function setTransformStyle($states, ...$a) {
        return $this->setStyleProperty($states, 'transform-style', styleProperty('transform-style', $a), $a);
    }

    function setTransition($states, ...$a) {
        return $this->setStyleProperty($states, 'transition', styleProperty('transition', $a), $a);
    }

    function setTransitionDelay($states, ...$a) {
        return $this->setStyleProperty($states, 'transition-delay', styleProperty('transition-delay', $a), $a);
    }

    function setTransitionDuration($states, ...$a) {
        return $this->setStyleProperty($states, 'transition-duration', styleProperty('transition-duration', $a), $a);
    }

    function setTransitionProperty($states, ...$a) {
        return $this->setStyleProperty($states, 'transition-property', styleProperty('transition-property', $a), $a);
    }

    function setTransitionTimingFunction($states, ...$a) {
        return $this->setStyleProperty($states, 'transition-timing-function', styleProperty('transition-timing-function', $a), $a);
    }

    function setUnicodeBidi($states, ...$a) {
        return $this->setStyleProperty($states, 'unicode-bidi', styleProperty('unicode-bidi', $a), $a);
    }

    function setUserSelect($states, ...$a) {
        return $this->setStyleProperty($states, 'user-select', styleProperty('user-select', $a), $a);
    }

    function setVerticalAlign($states, ...$a) {
        return $this->setStyleProperty($states, 'vertical-align', styleProperty('vertical-align', $a), $a);
    }

    function setVisibility($states, ...$a) {
        return $this->setStyleProperty($states, 'visibility', styleProperty('visibility', $a), $a);
    }

    function setWhiteSpace($states, ...$a) {
        return $this->setStyleProperty($states, 'white-space', styleProperty('white-space', $a), $a);
    }

    function setWidows($states, ...$a) {
        return $this->setStyleProperty($states, 'widows', styleProperty('widows', $a), $a);
    }

    function setWidth($states, ...$a) {
        return $this->setStyleProperty($states, 'width', styleProperty('width', $a), $a);
    }

    function setWillChange($states, ...$a) {
        return $this->setStyleProperty($states, 'will-change', styleProperty('will-change', $a), $a);
    }

    function setWordBreak($states, ...$a) {
        return $this->setStyleProperty($states, 'word-break', styleProperty('word-break', $a), $a);
    }

    function setWordSpacing($states, ...$a) {
        return $this->setStyleProperty($states, 'word-spacing', styleProperty('word-spacing', $a), $a);
    }

    function setWordWrap($states, ...$a) {
        return $this->setStyleProperty($states, 'word-wrap', styleProperty('word-wrap', $a), $a);
    }

    function setWritingMode($states, ...$a) {
        return $this->setStyleProperty($states, 'writing-mode', styleProperty('writing-mode', $a), $a);
    }

    function setZIndex($states, ...$a) {
        return $this->setStyleProperty($states, 'z-index', styleProperty('z-index', $a), $a);
    }

    function setZoom($states, ...$a) {
        return $this->setStyleProperty($states, 'zoom', styleProperty('zoom', $a), $a);
    }
}