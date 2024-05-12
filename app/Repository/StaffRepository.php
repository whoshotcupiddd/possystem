<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Repository;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Repository\StaffRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class StaffRepository implements StaffRepositoryInterface {

    public function all() {
        return Staff::all();
    }

   public function find($id) {
        return Staff::find($id);
    }

    public function create(array $data) {
        return Staff::create($data);
    }

    public function update($id, array $data)
{
    $staff = Staff::find($id);
    if ($staff) {
        $staff->update($data);
        return $staff;
    } else {
        return null; // Return null if staff member is not found
    }
}


    public function delete($id) {
        $staff = Staff::find($id);
        if ($staff) {
            $staff->delete();
            return true;
        }
        return false;
    }

}
