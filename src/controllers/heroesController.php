<?php
    
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Factory\AppFactory;

    require __DIR__ . '/../services/heroesService.php';


    $app->post('/api/heroes', function(Request $request, Response $response) {
        try {
            $json = $request->getBody();
            $new_hero = json_decode($json, false);
            $created_hero = heroesService::create($new_hero);
            $customResponse = CustomResponse::create($response, HTTP_STATUS_CODE_OK, HTTP_STATUS_MESSAGE_OK, $created_hero);
            return $customResponse;
        } catch (PDOException $e) {
            $customError = CustomError::create($response, HTTP_STATUS__CODE_INTERNAL_SERVER_ERROR, HTTP_STATUS_MESSAGE_INTERNAL_SERVER_ERROR, $e->getMessage());
            return $customError;
        }
    });

    $app->get('/api/heroes', function(Request $request, Response $response) {
        try {
            $json = $request->getBody();
            $heroes = heroesService::findAll();
            $customResponse = CustomResponse::create($response, HTTP_STATUS_CODE_OK, HTTP_STATUS_MESSAGE_OK, $heroes);
            return $customResponse;
        } catch (PDOException $e) {
            $customError = CustomError::create($response, HTTP_STATUS__CODE_INTERNAL_SERVER_ERROR, HTTP_STATUS_MESSAGE_INTERNAL_SERVER_ERROR, $e->getMessage());
            return $customError;
        }
    });

    $app->put('/api/heroes/{id}', function(Request $request, Response $response, array $args) {
        try {
            $id = $args['id'];
            $json = $request->getBody();
            $hero_to_update = json_decode($json, false);
            $created_hero = heroesService::update($id, $hero_to_update);
            $customResponse = CustomResponse::create($response, HTTP_STATUS_CODE_OK, HTTP_STATUS_MESSAGE_OK, $created_hero);
            return $customResponse;
        } catch (PDOException $e) {
            $customError = CustomError::create($response, HTTP_STATUS__CODE_INTERNAL_SERVER_ERROR, HTTP_STATUS_MESSAGE_INTERNAL_SERVER_ERROR, $e->getMessage());
            return $customError;
        }
    });

    $app->get('/api/heroes/famous', function(Request $request, Response $response) {
        try {
            $json = $request->getBody();
            $hero = heroesService::findMostFamousByName();
            $customResponse = CustomResponse::create($response, HTTP_STATUS_CODE_OK, HTTP_STATUS_MESSAGE_OK, $hero);
            return $customResponse;
        } catch (PDOException $e) {
            $customError = CustomError::create($response, HTTP_STATUS__CODE_INTERNAL_SERVER_ERROR, HTTP_STATUS_MESSAGE_INTERNAL_SERVER_ERROR, $e->getMessage());
            return $customError;
        }
    });

    $app->delete('/api/heroes/{id}', function(Request $request, Response $response, array $args) {
        try {
            $id = $args['id'];
            $json = $request->getBody();
            $hero_to_update = json_decode($json, false);
            $created_hero = heroesService::delete($id);
            $customResponse = CustomResponse::create($response, HTTP_STATUS_CODE_OK, HTTP_STATUS_MESSAGE_OK, $created_hero);
            return $customResponse;
        } catch (PDOException $e) {
            $customError = CustomError::create($response, HTTP_STATUS__CODE_INTERNAL_SERVER_ERROR, HTTP_STATUS_MESSAGE_INTERNAL_SERVER_ERROR, $e->getMessage());
            return $customError;
        }
    });


