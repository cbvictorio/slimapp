<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Factory\AppFactory;

    require __DIR__ . '/../services/classesService.php';
    
    // Get the list of classes with all the possible weapons a class may use
    $app->get('/api/classes', function(Request $request, Response $response) {
        try {
            $classes = classesService::findAll();
            $customResponse = CustomResponse::create($response, HTTP_STATUS_CODE_OK, HTTP_STATUS_MESSAGE_OK, $classes);
            return $customResponse;
        } catch (PDOException $e) {
            $customError = CustomError::create($response, HTTP_STATUS__CODE_INTERNAL_SERVER_ERROR, HTTP_STATUS_MESSAGE_INTERNAL_SERVER_ERROR, $e->getMessage());
            return $customError;
        }
    });

