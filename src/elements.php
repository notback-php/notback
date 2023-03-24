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

    // Todo: states
    function src($source) {
        return  $this->setAttribute('src', $source);
    }

    function async() {
        return  $this->setAttribute('async', '');
    }

    function defer() {
        return  $this->setAttribute('defer', '');
    }

    function type($type) {
        return  $this->setAttribute('type', $type);
    }

    function charset($charset) {
        return  $this->setAttribute('charset', $charset);
    }

    function integrity($integrity) {
        return  $this->setAttribute('integrity', $integrity);
    }

    function crossorigin($crossorigin) {
        return  $this->setAttribute('crossorigin', $crossorigin);
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

    function href($u) {
        return  $this->setAttribute('href', $u);
    }

    function target($t) {
        return  $this->setAttribute('target', $t);
    }
}

class ImageElement extends Element {
    public function create($content) {
        $this->tag = "img";
        $this->className = "image";
        $this->isOpenTag = false;
        $this->update();
    }

    // Todo: states
    function src($source) {
        return  $this->setAttribute('src', $source);
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

    function checked() {
        return  $this->setAttribute('checked', '');
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

    public function selected() {
        return  $this->setAttribute('selected', '');
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

    function placeholder($placeholder) {
        return  $this->setAttribute('placeholder', $placeholder);
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

    function type($type) {
        return  $this->setAttribute('type', $type);
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

    function src($source) {
        return  $this->setAttribute('src', $source);
    }

    function frameBorder($frameBorder) {
        return  $this->setAttribute('frameborder', $frameBorder);
    }

    function allowFullScreen($allowFullScreen) {
        return  $this->setAttribute('allowfullscreen', $allowFullScreen);
    }

    function allow($allow) {
        return  $this->setAttribute('allow', $allow);
    }

    function sandbox($sandbox) {
        return  $this->setAttribute('sandbox', $sandbox);
    }

    function referrerPolicy($referrerPolicy) {
        return  $this->setAttribute('referrerpolicy', $referrerPolicy);
    }

    function srcDoc($srcDoc) {
        return  $this->setAttribute('srcdoc', $srcDoc);
    }

    function name($name) {
        return  $this->setAttribute('name', $name);
    }

    function title($title) {
        return  $this->setAttribute('title', $title);
    }

    function loading($loading) {
        return  $this->setAttribute('loading', $loading);
    }

    function seamless($seamless) {
        return  $this->setAttribute('seamless', $seamless);
    }

    function allowPaymentRequest($allowPaymentRequest) {
        return  $this->setAttribute('allowpaymentrequest', $allowPaymentRequest);
    }

    function csp($csp) {
        return  $this->setAttribute('csp', $csp);
    }

    function allowUserMedia($allowUserMedia) {
        return  $this->setAttribute('allowusermedia', $allowUserMedia);
    }

    function allowPopupsToEscapeSandbox($allowPopupsToEscapeSandbox) {
        return  $this->setAttribute('allowpopupstoescapesandbox', $allowPopupsToEscapeSandbox);
    }

    function allowTopNavigationByUserActivation($allowTopNavigationByUserActivation) {
        return  $this->setAttribute('allowtopnavigationbyuseractivation', $allowTopNavigationByUserActivation);
    }

    function allowTopNavigation($allowTopNavigation) {
        return  $this->setAttribute('allowtopnavigation', $allowTopNavigation);
    }

    function allowPresentation($allowPresentation) {
        return  $this->setAttribute('allowpresentation', $allowPresentation);
    }

    function allowOrientationLock($allowOrientationLock) {
        return  $this->setAttribute('alloworientationlock', $allowOrientationLock);
    }

    function allowPointerLock($allowPointerLock) {
        return  $this->setAttribute('allowpointerlock', $allowPointerLock);
    }

    function allowModals($allowModals) {
        return  $this->setAttribute('allowmodals', $allowModals);
    }

    function allowMicrophone($allowMicrophone) {
        return  $this->setAttribute('allowmicrophone', $allowMicrophone);
    }

    function allowMagnet($allowMagnet) {
        return  $this->setAttribute('allowmagnet', $allowMagnet);
    }

    function allowKeyboard($allowKeyboard) {
        return  $this->setAttribute('allowkeyboard', $allowKeyboard);
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

    function checked() {
        return  $this->setAttribute('checked', null);
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

    function src($source) {
        return  $this->setAttribute('src', $source);
    }

    function poster($poster) {
        return  $this->setAttribute('poster', $poster);
    }

    function preload($preload) {
        return  $this->setAttribute('preload', $preload);
    }

    function autoplay($autoplay = null) {
        return  $this->setAttribute('autoplay', $autoplay);
    }

    function loop($loop = null) {
        return  $this->setAttribute('loop', $loop);
    }

    function muted($muted = null) {
        return  $this->setAttribute('muted', $muted);
    }

    function controls($controls = null) {
        return  $this->setAttribute('controls', $controls);
    }

    function playsInline($playsInline = null) {
        return  $this->setAttribute('playsinline', $playsInline);
    }

    function crossOrigin($crossOrigin) {
        return  $this->setAttribute('crossorigin', $crossOrigin);
    }

    function mediaGroup($mediaGroup) {
        return  $this->setAttribute('mediagroup', $mediaGroup);
    }

    function disablePictureInPicture($disablePictureInPicture) {
        return  $this->setAttribute('disablepictureinpicture', $disablePictureInPicture);
    }

    function disableRemotePlayback($disableRemotePlayback) {
        return  $this->setAttribute('disableremoteplayback', $disableRemotePlayback);
    }

    function referrerPolicy($referrerPolicy) {
        return  $this->setAttribute('referrerpolicy', $referrerPolicy);
    }

    function preloadDefault($preloadDefault) {
        return  $this->setAttribute('preloaddefault', $preloadDefault);
    }

    function preloadMetadata($preloadMetadata) {
        return  $this->setAttribute('preloadmetadata', $preloadMetadata);
    }

    function preloadNone($preloadNone) {
        return  $this->setAttribute('preloadnone', $preloadNone);
    }

    function preloadAuto($preloadAuto) {
        return  $this->setAttribute('preloadauto', $preloadAuto);
    }

    function srcObject($srcObject) {
        return  $this->setAttribute('srcobject', $srcObject);
    }

    function srcLang($srcLang) {
        return  $this->setAttribute('srclang', $srcLang);
    }

    function default($default) {
        return  $this->setAttribute('default', $default);
    }

    function kind($kind) {
        return  $this->setAttribute('kind', $kind);
    }

    function label($label) {
        return  $this->setAttribute('label', $label);
    }

    function srcType($srcType) {
        return  $this->setAttribute('srctype', $srcType);
    }

    function trackDefault($trackDefault) {
        return  $this->setAttribute('trackdefault', $trackDefault);
    }

    function trackKind($trackKind) {
        return  $this->setAttribute('trackkind', $trackKind);
    }

    function trackLabel($trackLabel) {
        return  $this->setAttribute('tracklabel', $trackLabel);
    }

    function trackSrc($trackSrc) {
        return  $this->setAttribute('tracksrc', $trackSrc);
    }

    function trackSrcLang($trackSrcLang) {
        return  $this->setAttribute('tracksrclang', $trackSrcLang);
    }

    function trackSrcType($trackSrcType) {
        return  $this->setAttribute('tracksrctype', $trackSrcType);
    }

    function track($track) {
        return  $this->setAttribute('track', $track);
    }

    function mediaSessionKeySystem($mediaSessionKeySystem) {
        return  $this->setAttribute('mediasessionkeysystem', $mediaSessionKeySystem);
    }

    function mediaSessionKeySystemConfiguration($mediaSessionKeySystemConfiguration) {
        return  $this->setAttribute('mediasessionkeysystemconfiguration', $mediaSessionKeySystemConfiguration);
    }

    function mediaSessionKeySystemMediaCapability($mediaSessionKeySystemMediaCapability) {
        return  $this->setAttribute('mediasessionkeysystemmediacapability', $mediaSessionKeySystemMediaCapability);
    }

    function mediaSessionKeySystemMediaCapabilityContentType($mediaSessionKeySystemMediaCapabilityContentType) {
        return  $this->setAttribute('mediasessionkeysystemmediacapabilitycontenttype', $mediaSessionKeySystemMediaCapabilityContentType);
    }

    function mediaSessionKeySystemMediaCapabilityRobustness($mediaSessionKeySystemMediaCapabilityRobustness) {
        return  $this->setAttribute('mediasessionkeysystemmediacapabilityrobustness', $mediaSessionKeySystemMediaCapabilityRobustness);
    }

    function mediaSessionKeySystemMediaCapabilityInitializationData($mediaSessionKeySystemMediaCapabilityInitializationData) {
        return  $this->setAttribute('mediasessionkeysystemmediacapabilityinitializationdata', $mediaSessionKeySystemMediaCapabilityInitializationData);
    }

    function mediaSessionKeySystemMediaCapabilityInitializationDataInitDataType($mediaSessionKeySystemMediaCapabilityInitializationDataInitDataType) {
        return  $this->setAttribute('mediasessionkeysystemmediacapabilityinitializationdatainitdatatype', $mediaSessionKeySystemMediaCapabilityInitializationDataInitDataType);
    }

    function mediaSessionKeySystemMediaCapabilityInitializationDataInitData($mediaSessionKeySystemMediaCapabilityInitializationDataInitData) {
        return  $this->setAttribute('mediasessionkeysystemmediacapabilityinitializationdatainitdata', $mediaSessionKeySystemMediaCapabilityInitializationDataInitData);
    }

    function mediaSessionKeySystemMediaCapabilityAudioCapabilities($mediaSessionKeySystemMediaCapabilityAudioCapabilities) {
        return  $this->setAttribute('mediasessionkeysystemmediacapabilityaudiocapabilities', $mediaSessionKeySystemMediaCapabilityAudioCapabilities);
    }

    function mediaSessionKeySystemMediaCapabilityAudioCapabilitiesContentType($mediaSessionKeySystemMediaCapabilityAudioCapabilitiesContentType) {
        return  $this->setAttribute('mediasessionkeysystemmediacapabilityaudiocapabilitiescontenttype', $mediaSessionKeySystemMediaCapabilityAudioCapabilitiesContentType);
    }

    function mediaSessionKeySystemMediaCapabilityAudioCapabilitiesRobustness($mediaSessionKeySystemMediaCapabilityAudioCapabilitiesRobustness) {
        return  $this->setAttribute('mediasessionkeysystemmediacapabilityaudiocapabilitiesrobustness', $mediaSessionKeySystemMediaCapabilityAudioCapabilitiesRobustness);
    }

    function mediaSessionKeySystemMediaCapabilityAudioCapabilitiesChannels($mediaSessionKeySystemMediaCapabilityAudioCapabilitiesChannels) {
        return  $this->setAttribute('mediasessionkeysystemmediacapabilityaudiocapabilitieschannels', $mediaSessionKeySystemMediaCapabilityAudioCapabilitiesChannels);
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