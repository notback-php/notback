<?php

require_once('elements.php');
    
class PageStyle {

    static public $pageStyleAttributes = [];
    static public $pageStyleReusableClassNames = [];

    static function addStylingClass($className, $styleAttributes) {


        $is_unique = true;
        $is_reuse_key = false;

        foreach (PageStyle::$pageStyleAttributes as $pageStyleAttributesKey => $pageStyleAttributesValue) {

            if ($pageStyleAttributesValue === $styleAttributes && $className !== $pageStyleAttributesKey && count($styleAttributes) > 0) {
                $is_unique = false;

                if (str_starts_with($pageStyleAttributesKey, 'reuse_')) {
                    $is_reuse_key = true;
                    PageStyle::$pageStyleAttributes[$className] = $pageStyleAttributesKey;
                }

                break;
            }
        }

        
        if ($is_unique) {
            // Unique styling
            PageStyle::$pageStyleAttributes[$className] = $styleAttributes;
        } else {

            if (!$is_reuse_key) {
                // Reuse styling
                $reuse_key = 'reuse_' . uniqid();

                PageStyle::$pageStyleAttributes[$reuse_key] = $styleAttributes;

                foreach (PageStyle::$pageStyleAttributes as $pageStyleAttributesKey => $pageStyleAttributesValue) {
                    if ($pageStyleAttributesValue === $styleAttributes && $className !== $pageStyleAttributesKey && count($styleAttributes) > 0) {
                        if (!str_starts_with($pageStyleAttributesKey, 'reuse_')) {
                            PageStyle::$pageStyleAttributes[$pageStyleAttributesKey] = $reuse_key;
                        }
                    }
                }

                PageStyle::$pageStyleAttributes[$className] = $reuse_key;
            }
            

        }

    }

    static public $breakPoints = [
        '2XL' => '1536px',
        'XL' => '1280px',
        'L' => '1024px',
        'M' => '768px',
        'S' => '640px',
        'XS' => '480px',
    ];

    static function getPageStyling() {

        $breakPointContent = ['default' => ''];
        foreach (PageStyle::$breakPoints as $breakPointKey => $breakPointSize) {
            $breakPointContent[$breakPointKey] = "";
        }

        foreach (PageStyle::$pageStyleAttributes as $className => $styleAttributes) {

            if (!str_starts_with($className, 'reuse_')) {

                // Reusable reference
                $isReusable = false;
                if (is_string($styleAttributes)) {
                    if (str_starts_with($styleAttributes, 'reuse_')) {
                        $reuse_key = $styleAttributes;
                    
                        // $styleAttributes = PageStyle::$pageStyleAttributes[$reuse_key]; 
                        $classNames = PageStyle::$pageStyleReusableClassNames[$reuse_key] ?? [];
                        $classNames[] = $className;
                        PageStyle::$pageStyleReusableClassNames[$reuse_key] = $classNames;

                        $isReusable = true;
                    }
                }

                if (!$isReusable) {
                    
                    foreach ($styleAttributes as $styleClassState => $styleClass) {

                        $isBreakpoint = false;
                        foreach (PageStyle::$breakPoints as $breakPointKey => $breakPointSize) {
                            if ($breakPointKey == $styleClassState) {
                                $isBreakpoint = true;
                                break;
                            }
                        }

                        $css = "";
                        if (!$isBreakpoint) {
                            if ($styleClassState === 'normal') {
                                $css .= ".$className {";
                            } else {
                                $css .= ".$className:$styleClassState {";
                            }

                            foreach ($styleClass as $attribute => $value) {

                                if (is_array($value)) {
                                    echo "det skete igen:";
                                    var_dump($value);
                                }

                                $css .= "$attribute: $value;";
                            }
                            $css .= "}";
                        } else {
                            $css .= ".$className {";
                            foreach ($styleClass as $attribute => $value) {
                                $css .= "$attribute: $value;";
                            }
                            $css .= "}";
                        }

                        $insertIntoBreakPoint = ($isBreakpoint) ? $styleClassState : 'default';
                        $breakPointContent[$insertIntoBreakPoint] .= $css;
                    }
                } 
            }
        }

        // reusable classes
        foreach (PageStyle::$pageStyleReusableClassNames as $reuseKey => $pageStyleReusableClassName) {

            $styleClasses = PageStyle::$pageStyleAttributes[$reuseKey];

            foreach ($styleClasses as $styleClassState => $styleClass) {

                if ($styleClassState === 'normal') {
                    $className = implode(', .', $pageStyleReusableClassName);
                } else {
                    $className = implode(":$styleClassState, .", $pageStyleReusableClassName);
                }

                $isBreakpoint = false;
                foreach (PageStyle::$breakPoints as $breakPointKey => $breakPointSize) {
                    if ($breakPointKey == $styleClassState) {
                        $isBreakpoint = true;
                        break;
                    }
                }

                $css = "";
                if (!$isBreakpoint) {
                    if ($styleClassState === 'normal') {
                        $css .= ".$className {";
                    } else {
                        $css .= ".$className:$styleClassState {";
                    }

                    foreach ($styleClass as $attribute => $value) {

                        if (is_array($value)) {
                            echo "det skete igen:";
                            var_dump($value);
                        }

                        $css .= "$attribute: $value;";
                    }
                    $css .= "}";
                } else {
                    $css .= ".$className {";
                    foreach ($styleClass as $attribute => $value) {
                        $css .= "$attribute: $value;";
                    }
                    $css .= "}";
                }

                $insertIntoBreakPoint = ($isBreakpoint) ? $styleClassState : 'default';
                $breakPointContent[$insertIntoBreakPoint] .= $css;
            
            }
        }
        

        $css = ""; // ?????

        $css = ((isset($css) ? $css : '')) . $breakPointContent['default'];

        $reversedBreakPointContent = array_reverse($breakPointContent);

        foreach ($reversedBreakPointContent as $breakPointContentKey => $breakPointContentCSS) {

            if ($breakPointContentKey !== 'default' && $breakPointContentCSS !== '') {
                $css .= "@media only screen and (min-width: " . PageStyle::$breakPoints[$breakPointContentKey] . ") {";
                $css .= $breakPointContentCSS;
                $css .= "}";
            }
        }

        return (
            "<style>$css</style>"
        );
    }
}


function is_attribute_array($arr) {
    return ($arr == (array) $arr);
}


function Page(...$content) {
    echo PageStyle::getPageStyling();

    $pageContent = "";
    foreach ($content as $part) {
        if (is_string($part)) {
            $pageContent .= $part;
        } else if (is_object($part)) {
            $pageContent .= $part->innerHTML;
        }
    }

    echo $pageContent;
}


function is_class_state($value) {
    return  $value === 'hover' || 
            $value === 'focus' || 
            $value === 'active' || 
            $value === 'visited' || 
            $value === 'disabled' ||
            $value === 'XS' ||
            $value === 'S' ||
            $value === 'M' ||
            $value === 'L' ||
            $value === 'XL' ||
            $value === '2XL' ||
            $value === '3XL' ||
            $value === '4XL' ||
            $value === '5XL';
}


function styleProperty($property_key, $args) {

    $length_properties = [
        'background-position-x',
        'background-position-y',
        'background-size',
        'border-bottom-width',
        'border-bottom',
        'border-image-width',
        'border-left-width',
        'border-left',
        'border-right-width',
        'border-right',
        'border-spacing',
        'border-top-width',
        'border-top',
        'border-width',
        'border',
        'bottom',
        'box-shadow',
        'clip-path',
        'column-gap',
        'column-rule-width',
        'column-width',
        'font-size',
        'gap',
        'height',
        'image-rendering',
        'image-resolution',
        'left',
        'letter-spacing',
        'line-height',
        'margin-bottom',
        'margin-left',
        'margin-right',
        'margin-top',
        'margin',
        'mask-position-x',
        'mask-position-y',
        'mask-size',
        'object-position',
        'offset-anchor',
        'offset-distance',
        'offset-path',
        'offset',
        'outline-width',
        'padding-bottom',
        'padding-left',
        'padding-right',
        'padding-top',
        'padding',
        'perspective-origin',
        'perspective',
        'right',
        'rotate',
        'scale-x',
        'scale-y',
        'scale',
        'scroll-snap-coordinate',
        'scroll-snap-margin-bottom',
        'scroll-snap-margin-left',
        'scroll-snap-margin-right',
        'scroll-snap-margin-top',
        'scroll-snap-margin',
        'shape-image-threshold',
        'shape-margin',
        'shape-outside',
        'skew-x',
        'skew-y',
        'skew',
        'stroke-width',
        'text-decoration-thickness',
        'text-indent',
        'text-shadow',
        'text-stroke-width',
        'text-stroke',
        'top',
        'transform-origin',
        'translate-x',
        'translate-y',
        'translate',
        'width',
        'word-break',
        'word-spacing',
    ];

    $arguments = [];
    if (is_array($args)) {
        $extraAttributes = is_array($args[0]) ? $args[0] : ['normal'];

        foreach ($extraAttributes as $extraAttribute) {

            if (is_class_state($extraAttribute)) {
                $arguments = $args;
                $value = $args[1] ?? '';
            } else {
                $arguments = $args;

                if (count($args) > 0) {
                    $value = $args[0];
                } else {
                    throw new Exception("No value provided for style property: $property_key");
                }
            }
        }
    } else {
        $value = $args;
    }

    if (in_array($property_key, $length_properties)) {
        $unit = is_int($value) ? 'px' : '';
        $value = $value . $unit;
    }

    return $value;

}