<?php
    
    /* RACES */
    
    // Define query to find the list of all available races
    define("FIND_ALL_RACES_QRY", "SELECT * FROM RACES");

     // Define query to find the list of all available classes per race
     define(
         "FIND_ALL_CLASSES_BY_RACE", 
         "
            SELECT DISTINCT 
                classes.id, 
                classes.name 
            FROM 
                classes, 
                races, 
                class_limitations 
            WHERE 
                classes.id = class_limitations.classes_id AND class_limitations.races_id = ?
         "
    );

    /* CLASSES */

    // Define query to find the list of all available classes
    define("FIND_ALL_CLASSES_QRY", "SELECT * FROM CLASSES");
    
    // Define query to find the list of all available weapons per class
    define(
        "FIND_ALL_WEAPONS_BY_CLASS", 
        "
            SELECT DISTINCT 
                weapons.id, 
                weapons.name 
            FROM 
                classes, 
                weapons, 
                weapon_limitation 
            WHERE 
                weapons.id = weapon_limitation.weapon_id AND weapon_limitation.classes_id = ?
        "
    );

    /* HEROES */

    // Define query to find a specific hero
    define("FIND_HERO_BY_ID_QRY", "SELECT * FROM heroes WHERE id = ?");

    // Define query to find all heroes
    define("FIND_ALL_HEROES_QRY", "SELECT * FROM heroes");

    // Define query to create a hero
    define(
        "CREATE_HERO_QRY", 
        "
            INSERT 
            INTO `heroes` (
                `id`, 
                `first_name`, 
                `last_name`, 
                `races_id`, 
                `classes_id`, 
                `weapon_id`, 
                `strength`, 
                `intelligence`, 
                `dexterity`
            ) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        "
    );

    // Define a query to modify/update a hero
    define(
        "MODIFY_HERO_QRY",
        "
            UPDATE `heroes` 
                SET 
                    `first_name` = ?, 
                    `last_name` = ?, 
                    `races_id` = ?, 
                    `classes_id` = ?, 
                    `weapon_id` = ?, 
                    `strength` = ?, 
                    `intelligence` = ?, 
                    `dexterity` = ? 
                WHERE 
                    `heroes`.`id` = ?
        "
    );

    /* FIRST NAMES */
    
    // Define a query to retrieve all the possible first names for classes
    define("FIND_ALL_FIRST_NAMES_QRY", "SELECT * FROM FIRST_NAMES_CATALOG");

    /* LAST NAMES */
    
    // Define a query to retrieve all the possible last names for classes
    define("FIND_ALL_LAST_NAMES_QRY", "SELECT * FROM LAST_NAMES_CATALOG");



    