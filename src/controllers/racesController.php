<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Factory\AppFactory;

    require __DIR__ . '/../services/racesService.php';

    // Get the list of races with the possible classes a race can choose
    $app->get('/api/races', function(Request $request, Response $response) {
        try {
            $races = racesService::findAll();
            $customResponse = CustomResponse::create($response, HTTP_STATUS_CODE_OK, HTTP_STATUS_MESSAGE_OK, $races);
            return $customResponse;
        } catch (PDOException $e) {
            $customError = CustomError::create($response, HTTP_STATUS__CODE_INTERNAL_SERVER_ERROR, HTTP_STATUS_MESSAGE_INTERNAL_SERVER_ERROR, $e->getMessage());
            return $customError;
        }
    });

