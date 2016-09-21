<?php

function full_catalog_array() {
    include("connection.php");

    try {
        $results = $db->query("
            SELECT media_id, title, category, img 
            FROM media
            ORDER BY 
            REPLACE(
                REPLACE(
                    REPLACE(title,'The ',''),
                    'An ',
                    ''
                ),
                'A ',
                ''
            )"
        );
    }
    catch (Exception $e) {
        echo "Not retrieved";
        exit;
    }

    $catalog = $results->fetchAll(PDO::FETCH_ASSOC);
    return $catalog;
}

function category_catalog_array($category) {
    include("connection.php");

    try {
        $results = $db->prepare("
            SELECT media_id, title, category, img 
            FROM media
            WHERE LOWER(category) = ?
            ORDER BY 
            REPLACE(
                REPLACE(
                    REPLACE(title,'The ',''),
                    'An ',
                    ''
                ),
                'A ',
                ''
            )"
        );
        $results->bindParam(1, $category, PDO::PARAM_STR);
        $results->execute();
    }
    catch (Exception $e) {
        echo "Not retrieved3";
        exit;
    }

    $catalog = $results->fetchAll(PDO::FETCH_ASSOC);
    return $catalog;
}

function random_catalog_array() {
    include("connection.php");

    try {
        $results = $db->query("
            SELECT media_id, title, category, img 
            FROM media
            ORDER BY RAND()
            LIMIT 4
            ");
    }
    catch (Exception $e) {
        echo "Not retrieved";
        exit;
    }

    $catalog = $results->fetchAll(PDO::FETCH_ASSOC);
    return $catalog;
}

function single_item_array($id) {
    include("connection.php");

    try {
        $results = $db->prepare(
            "SELECT media.media_id, title, category, img, format, year, publisher, genre, isbn
            FROM media
            JOIN genres ON media.genre_id = genres.genre_id
            LEFT OUTER JOIN books ON media.media_id = books.media_id
            WHERE media.media_id = ?"
            );
        $results->bindParam(1, $id, PDO::PARAM_INT);
        $results->execute();
    }
    catch (Exception $e) {
        echo "Not retrieved1";
        exit;
    }

    $item = $results->fetch();
    if (empty($item)) return $item;

    try {
        $results = $db->prepare(
            "SELECT fullname, role
            FROM media_people
            JOIN people ON media_people.people_id = people.people_id
            WHERE media_people.media_id = ?"
            );
        $results->bindParam(1, $id, PDO::PARAM_INT);
        $results->execute();
    }
    catch (Exception $e) {
        echo "Not retrieved2";
        exit;
    }

    while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
        $item[$row["role"]][] = $row["fullname"];
    }

    return $item;
}

function get_item_html($item) {
    $output = "<li><a href='details.php?id="
        . $item["media_id"] . "'><img src='" 
        . $item["img"] . "' alt='" 
        . $item["title"] . "' />" 
        . "<p>View Details</p>"
        . "</a></li>";
    return $output;
}

function array_category($catalog,$category) {
    $output = array();
    
    foreach ($catalog as $id => $item) {
        if ($category == null OR strtolower($category) == strtolower($item["category"])) {
            $sort = $item["title"];
            $sort = ltrim($sort,"The ");
            $sort = ltrim($sort,"A ");
            $sort = ltrim($sort,"An ");
            $output[$id] = $sort;            
        }
    }
    
    asort($output);
    return array_keys($output);
}