<?php namespace ProcessWire;

// what we are looking for
$selector = "template=video, parent=1145, sort=-created";
$fields = "id, title, video_id, date, name";

// helper: nested repeater suuport
function processRepeaterField($repeaterItems)
{
    $repeaterData = [];
    foreach ($repeaterItems as $item) {
        $itemData = [];
        foreach ($item->getFields() as $field) {
            if ($field->type instanceof FieldtypeFieldsetOpen) {
                continue; // Skip fieldset open field types
            }
            $fieldName = $field->name;
            $itemData[$fieldName] = $item->$fieldName;
        }
        $repeaterData[] = $itemData;
    }
    return $repeaterData;
}

// pages in array
$pagesArray = $pages->findRaw($selector, $fields);

// Convert the associative array to an indexed array
$indexedArray = array_values($pagesArray);

// Process the repeater field data
foreach ($indexedArray as &$pageData) {
    $page = $pages->get($pageData['id']);
    $repeaterItems = $page->matrix; // Access the repeater field directly

    $repeaterData = [];

    foreach ($repeaterItems as $item) {
        $itemData = [
            'matrix_type' => $item->type,
        ];

        foreach ($item->getFields() as $field) {
            if ($field->type instanceof FieldtypeFieldsetOpen) {
                continue; // Skip fieldset open field types
            }

            $fieldName = $field->name;

            // Check if the current field is a Repeater field
            if ($field->type instanceof FieldtypeRepeater) {
                $nestedRepeaterItems = $item->$fieldName;
                $itemData[$fieldName] = processRepeaterField($nestedRepeaterItems);
            } else {
                $itemData[$fieldName] = $item->$fieldName;
            }
        }

        $repeaterData[] = $itemData;
    }

    // Add the repeater data to the page data
    $pageData['matrix'] = $repeaterData;
}

// Convert the indexed array to a JSON string
$jsonOutput = json_encode($indexedArray);

// Set the content type to JSON and output the JSON string
header('Content-Type: application/json');
echo $jsonOutput;
exit();
