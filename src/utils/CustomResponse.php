<?php
    class CustomResponse {
        public static function create($response, $status, $message, $data) {
            $json = array("status" => $status, "message" => $message, "data" => $data);
            $response
                ->getBody()
                ->write(json_encode($json));
            $newResponse = $response
                            ->withHeader('Content-Type', 'application/json')
                            ->withStatus($status);
            return $newResponse;
        }
    }