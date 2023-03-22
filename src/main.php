<?php


require_once('elements.php');
    
$pageStyle = [];


class Main {

    static $startTime;
    static $endTime;
    static $showStats = false;
    static $showErrors = false;

    static function setStartTime() {
        Main::$startTime = microtime(true);
    }

    static function setEndTime() {
        Main::$endTime = microtime(true);
    }

    static function getExecutionTime() {
        return Main::$endTime - Main::$startTime;
    }

    static function getMemoryUsage() {
        return memory_get_usage();
    }

    static function getPeakMemoryUsage() {
        return memory_get_peak_usage();
    }

    static function getMemoryUsageInMB() {
        return Main::getMemoryUsage() / 1000000;
    }

    static function getPeakMemoryUsageInMB() {
        return Main::getPeakMemoryUsage() / 1000000;
    }
}



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

    if (Main::$showStats) {
        Main::setStartTime();
    }

    echo PageStyle::getPageStyling();

    $pageContent = "";

    foreach ($content as $part) {
        $pageContent .= $part->innerHTML;
    }

    echo $pageContent; 

    if (Main::$showStats) {
        Main::setEndTime();
        echo "
            <div style='position: fixed; bottom: 0; right: 0; background: orange; color: black; padding: 20px 20px 0'>
                <b>Notback Statistics</b>
                <p>Execution time: " . Main::getExecutionTime() . "s</p>
                <p>Memory usage: " . Main::getMemoryUsageInMB() . " MB</p>
                <p>Peak memory usage: " . Main::getPeakMemoryUsageInMB() . " MB</p>
            </div>
        ";
    }
}


