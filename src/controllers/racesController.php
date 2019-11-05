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

     // Get the most famous race 
     $app->get('/api/races/famous', function(Request $request, Response $response) {
        try {
            $races = racesService::findMostFamous();
            $customResponse = CustomResponse::create($response, HTTP_STATUS_CODE_OK, HTTP_STATUS_MESSAGE_OK, $races);
            return $customResponse;
        } catch (PDOException $e) {
            $customError = CustomError::create($response, HTTP_STATUS__CODE_INTERNAL_SERVER_ERROR, HTTP_STATUS_MESSAGE_INTERNAL_SERVER_ERROR, $e->getMessage());
            return $customError;
        }
    });

    // 5fa7c1a2-b82f-4178-bfb3-5368b18a613d
    // 75de470e-90f8-4454-a756-a030ea0cea88
    // a4fdb2a3-12bc-49bf-be5f-739d0a046df2
    // e23e7869-a21a-479e-b485-8f9b9042d75e
    // e3f5d64b-900a-457e-82e4-d2f00abd2e1b

    // be0a803c-54eb-47ce-b361-429591376589

    

