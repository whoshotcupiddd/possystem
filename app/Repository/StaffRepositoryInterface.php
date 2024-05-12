<?php

namespace App\Repository;

use Illuminate\Http\Request;

interface StaffRepositoryInterface {
    public function all();
    
    public function find($id);
    
    public function create(array $data);
    
    public function update($id, array $data);
    
    public function delete($id);
}
