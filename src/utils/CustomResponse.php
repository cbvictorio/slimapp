<?php
    class CustomResponse {
        public static function create($response, $status, $message, $data) {
            $json = array("status" => $status, "message" => $message, "data" => $data);
            $response
                ->getBody()
                ->write(json_encode($json));
            // Including all these headers to be able to fetch from front end app 
            $newResponse = $response
                            ->withHeader('Content-Type', 'application/json')
                            ->withHeader('Access-Control-Allow-Origin', 'http://localhost:8080')
                            ->withHeader('Content-Type', 'Content-Type, Accept, Origin')
                            ->withHeader('Content-Type', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
                            ->withStatus($status);
            return $newResponse;
        }
    }