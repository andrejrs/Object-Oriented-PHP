<?php

/**
 * King controller class
 *
 *
 * @category   Controllers
 * @package    Chess
 * @author     AAndrej <*.*.com>
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: @package_version@
 * @link       github.com/andrejrs
 * @since      Class available since Release 1.0.0
 */
class King extends Figure {

    /**
     * Checking move
     *
     * The method checks whether the move is valid.
     * 
     * @param string $color Color of the figure
     * @param integer $x Current position figure on the x axis
     * @param integer $y Current position figure on the y axis
     * @param integer $toX New position of the figure on the x axis
     * @param integer $toY New position of the figure on the x axis
     *
     * @return bool if the move is valid returns the true, otherwise false
     * @access  public
     * @since   Method available since Release 1.0.0
     */
    public function checkingMove($color, $x, $y, $toX, $toY) {
        $pomerajX = abs($toX - $x);
        $pomerajY = abs($toY - $y);

        if (($pomerajX == 1 || $pomerajX == 0) && ($pomerajY == 1 || $pomerajY == 0)) {
            return true;
        }
        return false;
    }

    /**
     * To string
     *
     * The __toString() method return name of the figure
     *
     * @return string The HTML formatted table
     * @access  public
     * @since   Method available since Release 1.0.0
     */
    public function __toString() {
        return "KING";
    }

}
