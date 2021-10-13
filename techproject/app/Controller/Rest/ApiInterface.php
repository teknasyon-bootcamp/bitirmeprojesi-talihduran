<?php

namespace App\Controller\Rest;

interface ApiInterface

{   public function getAll();
    public function get($id);
    public function create(): bool;
    public function update($id);
    public function delete($id);


}