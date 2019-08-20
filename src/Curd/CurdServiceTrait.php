<?php namespace Ddup\Part\Curd;

use Ddup\Part\Contracts\RowContainerInterface;
use PHPUnit\Runner\Exception;
use Illuminate\Support\Collection;


Trait  CurdServiceTrait
{

    abstract public function model();

    public function get($id)
    {
        return $this->model()->find($id);
    }

    public function check($row, $msg = '')
    {
        if (!$row) {
            throw  new Exception("{$msg}不存在", 0011);
        }
    }

    public function getAndCheck($id, $msg = '')
    {
        $row = $this->get($id);

        $this->check($row, $msg);

        return $row;
    }

    public function create($req)
    {
        $cellection = new Collection($req);

        return $this->model()->create($cellection->all());
    }

    public function update($row, $req)
    {

        $collection = new Collection($req);

        $row = $this->toEloquentRow($row);

        return $row->update($collection->all());
    }

    public function delete($row)
    {
        $row = $this->toEloquentRow($row);

        return $row->delete();
    }

    private function toEloquentRow($row)
    {
        if ($row instanceof RowContainerInterface) {
            $row = $row->getRow();
        }

        return $row;
    }
}