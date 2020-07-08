<?php
class Maze
{
    const DEFAULT_MAZE_SIZE = 15;
    private $length = 0;
    private $result = [];
    private $odd = true;
    private $first = true;

    public function __construct($s = self::DEFAULT_MAZE_SIZE)
    {
        $this->length = $s;
    }

    public function generate()
    {
        for($i=0; $i<$this->length; $i++) {
            $this->result[$i] = $this->odd ? $this->makeRow() : $this->makeRowCorner();
            $this->odd = !$this->odd;
        }

        if ($this->length == 3) $this->result[2][1] = false;

        return $this->result;
    }

    public function makeRow()
    {
        $row = [];
        for($i=0; $i<$this->length; $i++) $row[$i] = $i == 1 ? false : true;
        $this->first = !$this->first;

        return !$this->first ? $row : array_reverse($row);
    }

    public function makeRowCorner()
    {
        $row = [];
        for($i=0; $i<$this->length; $i++) $row[$i] = ($i == 0 || $i == ($this->length-1)) ? true : false;

        return $row;
    }
}