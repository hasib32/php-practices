<?php
    function buildArray($arrays)
    {

        $newArray = [];

        foreach($arrays as $key => $value) {

            if(isset($value['@attributes'])) {
                $newArray[$key] = $value['@attributes'];
            } elseif(!empty($newArray) && $key != '@attributes') {
                $result = $this->buildArray($value);
                $newArray[$key] = $result;
            } elseif($key == '@attributes') {
                $newArray = $value;
            } else {
                return $value;
            }

        }
        return $newArray;
    }
