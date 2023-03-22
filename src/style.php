<?php 

enum PropertyValueTypes {
    case SIZE;
    case COLOR;
    case ASPECTRATIO;
    case FONTFAMILY;
    case OVERFLOW;
}


/* style properties */
function styleProperty($property_key, $args) {

    $propertyValueType = null;
    switch ($property_key) {
        case 'bottom':
        case 'border-bottom-left-radius':
        case 'border-bottom-right-radius':
        case 'border-bottom-width':
        case 'border-bottom':
        case 'border-left-width':
        case 'border-left':
        case 'border-right-width':
        case 'border-right':
        case 'border-top-left-radius':
        case 'border-top-right-radius':
        case 'border-top-width':
        case 'border-top':
        case 'border-width':
        case 'border-radius':
        case 'border-bottom-left-radius':
        case 'border-bottom-right-radius':
        case 'border-top-left-radius':
        case 'border-top-right-radius':
        case 'font-size':
        case 'gap':
        case 'filter':
        case 'height':
        case 'left':
        case 'margin-bottom':
        case 'margin-left':
        case 'margin-right':
        case 'margin-top':
        case 'margin':
        case 'max-height':
        case 'min-height':
        case 'padding-bottom':
        case 'padding-left':
        case 'padding-right':
        case 'padding-top':
        case 'padding':
        case 'right':
        case 'text-decoration-thickness':
        case 'top':
        case 'width':
            $propertyValueType = PropertyValueTypes::SIZE;
            break;
        case 'accent-color':
        case 'background':
        case 'color':
            $propertyValueType = PropertyValueTypes::COLOR;
            break;
        case 'aspect-ratio':
            $propertyValueType = PropertyValueTypes::ASPECTRATIO;
            break;
        case 'font-family':
            $propertyValueType = PropertyValueTypes::FONTFAMILY;
            break;
        case 'overflow':
            $propertyValueType = PropertyValueTypes::OVERFLOW;
            break;
        default:
            break;
    }

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

    $propertyValue = '';
    switch ($propertyValueType) {
        case PropertyValueTypes::SIZE:
            $unit = is_int($value) ? 'px' : '';
            $propertyValue = $value . $unit;
            break;
        case PropertyValueTypes::COLOR:
            $propertyValue = $value ?? '';
            break;
        case PropertyValueTypes::ASPECTRATIO:
            $propertyValue = $value ?? '';
            $propertyValue = getAspectRatio($propertyValue);
            break;
        case PropertyValueTypes::FONTFAMILY:
            $font = $arguments ?? [];
            $propertyValue = implode(',', $font);
            break;
        case PropertyValueTypes::OVERFLOW:
            $propertyValue = $value ?? '';
            break;
        default:
            $propertyValue = $value ?? '';
            break;
    }

    return $propertyValue;

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


function getAspectRatio($value) {
    switch ($value) {
        case 'square':
            return '1 / 1';
        case 'video':
            return '16 / 9';
        default:
            return $value;
    }
}