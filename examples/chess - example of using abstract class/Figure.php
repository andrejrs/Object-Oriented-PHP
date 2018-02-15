<?php

/**
 * Figure controller class
 *
 *
 * @category   Controllers
 * @package    Chess
 * @author     Andrej <*.*.com>
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: @package_version@
 * @link       github.com/andrejrs
 * @since      Class available since Release 1.0.0
 */
abstract class Figure {

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
    abstract public function checkingMove($color, $x, $y, $toX, $toY);
}
