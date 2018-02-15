<?php

/**
 * Table controller class
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
class Table {

    private $onMove;
    public $table;

    public function __construct($onMove) {
        $this->onMove = $onMove;
    }

    /**
     * Add figure method
     *
     * This method puts the figure on the board
     * 
     * @param Figure $figure The object of the figure that should be placed
     * @param integer $x The starting position of the figure on the x axis
     * @param integer $y The starting position of the figure on the y axis
     *
     * @return bool true if the figure is set, otherwise false
     * @access  public
     * @since   Method available since Release 1.0.0
     */
    public function addFigure($figure, $x, $y) {
        if ($this->table[$x][$y] == null) {
            $this->table[$x][$y] = $figure;
            return true;
        }

        return false;
    }

    /**
     * Move figure
     *
     * The method for moving figure from one position to another
     *
     * @param integer $x Current position figure on the x axis
     * @param integer $y Current position figure on the y axis
     * @param integer $toX New position of the figure on the x axis
     * @param integer $toY New position of the figure on the x axis
     * 
     * @return bool true if the figure is moved, otherwise false
     * @access  public
     * @since   Method available since Release 1.0.0
     */
    public function moveFigure($x, $y, $toX, $toY) {
        $f = $this->table[$x][$y];

        if ($f != null) {

            if ($f->checkingMove($this->onMove, $x, $y, $toX, $toY)) {
                $this->table[$toX][$toY] = $f;
                $this->table[$x][$y] = null;

                $this->changeThePlayer();
                return true;
            }
        }

        return false;
    }

    /**
     * Change the player
     *
     * The method changes the active player
     *
     * @return none
     * @access  public
     * @since   Method available since Release 1.0.0
     */
    private function changeThePlayer() {

        if ($this->onMove == "white") {
            $this->onMove = "black";
        } else {
            $this->onMove = "white";
        }
    }

    /**
     * To string
     *
     * The __toString() method draws the board and figures.
     *
     * @return string The HTML formatted table
     * @access  public
     * @since   Method available since Release 1.0.0
     */
    public function __toString() {
        $temp = "<table><tbody>";

        for ($i = 0; $i < 8; $i++) {
            $temp .= "<tr>";

            for ($j = 0; $j < 8; $j++) {
                $temp .= "<td>";
                if ($this->table[$i][$j] == null) {
                    $temp .= "";
                } else {
                    $temp .= $this->table[$i][$j];
                }
                $temp .= "</td>";
            }

            $temp .= "</tr>";
        }

        return $temp . "</tbody></table>";
    }

}
