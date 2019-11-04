<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Factory\AppFactory;
    
    require __DIR__ . '/../vendor/autoload.php';

    $app = AppFactory::create();

    // Require the database connection file
    require __DIR__ . '/../src/config/db.php';

    // Require query strings as constants
    require __DIR__ . '/../src/constants/queries.php';

    // Require query strings as constants
    require __DIR__ . '/../src/constants/httpResponses.php';

    // Heroes controller
    require __DIR__ . '/../src/controllers/heroesController.php';

    // Races controller
    require __DIR__ . '/../src/controllers/racesController.php';

    // Classes controller
    require __DIR__ . '/../src/controllers/classesController.php';

    // First names controller
    require __DIR__ . '/../src/controllers/firstNamesController.php';

    // Last names controller
    require __DIR__ . '/../src/controllers/lastNamesController.php';

    // Require a custom response object
    require __DIR__ . '/../src/utils/CustomResponse.php';

     // Require a custom error object
     require __DIR__ . '/../src/utils/CustomError.php';

    $app->run();
