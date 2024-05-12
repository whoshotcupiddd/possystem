<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class StaffLeaveController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function index()
    {
        $staffLeaves = $this->get();
        
        return view('admin.all-staff-leaves', [
            'staffLeaves' => $staffLeaves
        ]);
    }

    public function get()
    {
        $response = $this->client->request('GET', 'http://127.0.0.1:8000/api/staff-leaves');
        $staffLeaves = json_decode($response->getBody()->getContents(), true);

        return $staffLeaves;
    }

    public function create()
    {
        return view('admin.add-staff-leave');
    }

    public function show($id)
    {
        $response = $this->client->request('GET', 'http://127.0.0.1:8000/api/staff-leaves/' . $id);
        $staffLeave = json_decode($response->getBody()->getContents(), true);
        
        if (!$staffLeave) {
            return null;
        }

        return response()->json($staffLeave);
    }

    public function store(Request $req)
    {
        $data = $req->validate([
            'staffCode' => 'required|string|max:255',
            'staffName' => 'required|string|max:255',
            'leaveType' => 'required|string|max:255',
            'numberOfLeaveDays' => 'required|integer',
            'fromDate' => 'required|date',
            'toDate' => 'required|date',
        ]);
        
        $response = $this->client->post('http://127.0.0.1:8000/api/staff-leaves', [
            'json' => $data
        ]);

        return redirect('admin/staff-leaves')->with('success', 'Successfully added a staff leave record');
    }

    public function update($id, Request $req)
    {
        $data = $req->validate([
            'staffCode' => 'required|string|max:255',
            'staffName' => 'required|string|max:255',
            'leaveType' => 'required|string|max:255',
            'numberOfLeaveDays' => 'required|integer',
            'fromDate' => 'required|date',
            'toDate' => 'required|date',
        ]);
        
        $response = $this->client->put('http://127.0.0.1:8000/api/staff-leaves/'.$id, [
            'json' => $data
        ]);

        return redirect('admin/staff-leaves')->with('success', 'Successfully updated a staff leave record');
    }

    public function destroy($id)
    {
        $response = $this->client->delete('http://127.0.0.1:8000/api/staff-leaves/'.$id);

        return redirect('admin/staff-leaves')->with('success', 'Successfully deleted a staff leave record');
    }

    public function edit($id)
    {
        $response = $this->show($id);
        $staffLeave = json_decode($response->getContent(), true)['staff_leave'];
        
        return view('admin.edit-staff-leave', compact('staffLeave'));
    }
}
