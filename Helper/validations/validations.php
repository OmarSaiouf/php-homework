<?php
include_once 'validations_functions.php';

function validations(array $params)
{
    $data = [];
    $errors = [];
    $request = request();
    if (count($request) == 0) return false;

    foreach ($params as $param => $value) {

        $reqData = isset($request[$param]) ? $request[$param] : null;

        foreach (explode("|", $value) as $e) {

            if ($e != '' || $e != null) {
                $input = explode(':', $e);

                if (count($input) > 1) {

                    $valid = $input[0]($reqData, $input[1]);

                    if ($valid[0]) {

                        $errors[] = $valid[1];
                    }
                } else {
                    $valid = $e($reqData);

                    if ($valid[0]) {
                        $errors[] = $valid[1];
                    }
                }
            }
        }
        if (!empty($errors)) {
            foreach ($errors as $error) {
                alert($error);
            }
            return;
        }
        $data[$param] = $reqData;
    }
    return $data;
}
