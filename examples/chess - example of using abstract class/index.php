<?php
/*
 * Attempt to load undefined class
 * This feature is an alternative for individually guiding classes that are included
 * For example: require "Table.php";
 */

function __autoload($className) {
    $filename = $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Chess - PHP example of using abstract class</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style type="text/css">
        table {
            border: 1px solid silver;
        }
        table tr td {
            width: 70px;
            height: 70px;
            vertical-align: middle;
            text-align: center;
            background: #999999;
            font-weight: bold;
            font-family: Arial;
        }
        tr:nth-child(odd) td:nth-child(even), tr:nth-child(even) td:nth-child(odd) {
            background: white;
        }
    </style>
    <body>
        <?php
        // Creating a chess table and selecting the player who is on the move
        $tabla = new Table("white");

        // Creating a king and setting him up on a board
        $figure = new King();
        $tabla->addFigure($figure, 4, 0);
        // Creating a pawn and setting him up on a board
        $figure = new Pawn();
        $tabla->addFigure($figure, 3, 1);
        // Creating a king and setting him up on a board
        $figure = new King();
        $tabla->addFigure($figure, 4, 7);
        // Creating a pawn and setting him up on a board
        $figure = new Pawn();
        $tabla->addFigure($figure, 3, 6);

        echo "<h1>Starting postitions: </h1>";
        echo $tabla . "\n";

        // Move the king on the left side of the board
        $tabla->moveFigure(4, 0, 4, 1);

        echo "<h1>Move the king on the left side of the board: </h1>";
        echo $tabla . "\n";

        // Move the pawn that is on the right side of the board
        $tabla->moveFigure(3, 6, 3, 5);

        echo "<h1>Move the pawn that is on the right side of the board: </h1>";
        echo $tabla . "\n";
        ?>
    </body>
</html>