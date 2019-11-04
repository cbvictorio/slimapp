<?php
    class CustomError {
        public static function create($response, $status, $message, $error) {
            $json = array("status" => $status, "message" => $message, "error" => $error);
            $response
                ->getBody()
                ->write(json_encode($json));
            $newResponse = $response
                            ->withHeader('Content-Type', 'application/json')
                            ->withStatus($status);
            return $newResponse;
        }
    }