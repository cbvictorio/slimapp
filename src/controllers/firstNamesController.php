<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Factory\AppFactory;

    require __DIR__ . '/../services/firstNamesService.php';

    $app->get('/api/first-names', function(Request $request, Response $response) {
        try {
            $first_names = firstNamesService::findAll();
            $customResponse = CustomResponse::create($response, HTTP_STATUS_CODE_OK, HTTP_STATUS_MESSAGE_OK, $first_names);
            return $customResponse;
        } catch (PDOException $e) {
            $customError = CustomError::create($response, HTTP_STATUS__CODE_INTERNAL_SERVER_ERROR, HTTP_STATUS_MESSAGE_INTERNAL_SERVER_ERROR, $e->getMessage());
            return $customError;
        }
    });