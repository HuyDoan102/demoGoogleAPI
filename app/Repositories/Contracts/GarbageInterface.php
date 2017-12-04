<?php

namespace App\Repositories\Contracts;

interface GarbageInterface
{
    public function getAll();
    public function insert($request);
    public function getById($id);
    public function updateById($request, $id);
    public function deleteGarbage($id);
}
