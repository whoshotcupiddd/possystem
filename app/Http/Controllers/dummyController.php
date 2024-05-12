<?php // 
namespace App\Http\Controllers;

use App\Repository\StaffRepositoryInterface;
use App\Repository\StaffRepository;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StaffController extends Controller {

    public $staffRepository;

    public function __construct(StaffRepositoryInterface $staffRepository) {
        $this->staffRepository = $staffRepository;
    }

    public function index() {
        $staff = $this->staffRepository->all();
        return view('indexStaff', compact('staff'));
    }

    public function create() {
        return view('createStaff');
    }

    public function store(Request $request) {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'staffCode' => 'required|unique:staff',
            'staffName' => 'required',
            'staffPassword' => 'required',
            'staffPhoneNum' => 'required',
            'staffEmail' => 'required|email',
            'deploymentDate' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for image upload as needed
        ]);

        // Create a new staff record with the validated data
        $this->staffRepository->create($validatedData);

        // Redirect to a specific URL with a success message
        return redirect()->route('staff.index')->with('success', 'Staff information has been added successfully.');
    }

    public function edit(string $id) {
        $staffMember = $this->staffRepository->find($id);
        return view('editStaff', compact('staffMember'));
    }

    public function update(Request $request, string $id) {
        $validatedData = $request->validate([
            'staffCode' => 'required|unique:staff,staffCode,' . $id,
            'staffName' => 'required',
            'staffPhoneNum' => 'required',
            'staffEmail' => 'required|email',
            'deploymentDate' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for image upload as needed
        ]);

        if ($request->filled('staffPassword')) {
            $validatedData['staffPassword'] = $request->input('staffPassword');
        }

        $updatedStaff = $this->staffRepository->update($id, $validatedData);

        if ($updatedStaff) {
            return redirect()->route('staff.index')->with('success', 'Staff information has been updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Staff member not found.');
        }
    }

    public function destroy($id) {
        $this->staffRepository->delete($id);

        return redirect()->route('staff.index')->with('success', 'Staff information has been deleted successfully.');
    }

public function generateXml() {
        // Retrieve data from the database (replace 'staff' with your table name)
        $data = Staff::all();

        // Create an XML document
        $xml = new \DOMDocument('1.0', 'utf-8');
        $xml->formatOutput = true;

        // Create the root element
        $root = $xml->createElement('staff');
        $xml->appendChild($root);

        foreach ($data as $staff) {
            // Create an element for each record
            $staffElement = $xml->createElement('staff_member');
            $root->appendChild($staffElement);

            // Add data as child elements
            $staffElement->appendChild($xml->createElement('id', $staff->id));
            $staffElement->appendChild($xml->createElement('staffCode', $staff->staffCode));
            $staffElement->appendChild($xml->createElement('staffName', $staff->staffName));
            $staffElement->appendChild($xml->createElement('staffPassword', $staff->staffPassword));
            $staffElement->appendChild($xml->createElement('staffPhoneNum', $staff->staffPhoneNum));
            $staffElement->appendChild($xml->createElement('staffEmail', $staff->staffEmail));
            $staffElement->appendChild($xml->createElement('deploymentDate', $staff->deploymentDate));
            $staffElement->appendChild($xml->createElement('image', $staff->image)); // Assuming 'image' is the field for storing image paths
            // Add other fields as needed
        }

        // Save the XML to a file
        $xml->save(public_path('/staff.xml'));

    // Load the XSL stylesheet
    $xsl = new \DOMDocument();
    $xsl->load(public_path('/Staff.xsl'));

    // Apply XSL transformation
    $processor = new \XSLTProcessor();
    $processor->importStylesheet($xsl);
    $htmlOutput = $processor->transformToXML($xml);

    // Save the transformed HTML to a file
    file_put_contents(public_path('staff.html'), $htmlOutput);

    // Return success view with link to the HTML output
    return view('staff_xml_generated');
}


}
return view('staff_xml_generated');
//public function generateXml() {
//        // Retrieve data from the database (replace 'staff' with your table name)
//        $data = Staff::all();
//
//        // Create an XML document
//        $xml = new \DOMDocument('1.0', 'utf-8');
//        $xml->formatOutput = true;
//
//        // Create the root element
//        $root = $xml->createElement('staff');
//        $xml->appendChild($root);
//
//        foreach ($data as $staff) {
//            // Create an element for each record
//            $staffElement = $xml->createElement('staff_member');
//            $root->appendChild($staffElement);
//
//            // Add data as child elements
//            $staffElement->appendChild($xml->createElement('id', $staff->id));
//            $staffElement->appendChild($xml->createElement('staffCode', $staff->staffCode));
//            $staffElement->appendChild($xml->createElement('staffName', $staff->staffName));
//            $staffElement->appendChild($xml->createElement('staffPassword', $staff->staffPassword));
//            $staffElement->appendChild($xml->createElement('staffPhoneNum', $staff->staffPhoneNum));
//            $staffElement->appendChild($xml->createElement('staffEmail', $staff->staffEmail));
//            $staffElement->appendChild($xml->createElement('deploymentDate', $staff->deploymentDate));
//            $staffElement->appendChild($xml->createElement('image', $staff->image)); // Assuming 'image' is the field for storing image paths
//            // Add other fields as needed
//        }
//
//        // Save the XML to a file
//        $xml->save(public_path('/staff.xml'));
//
//         // Save the XSL stylesheet content to a file
//    $xslContent = <<<'XSL'
//    <?xml version="1.0" encoding="UTF-8"?>
//    <xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
//        <xsl:template match="/">
//            <html>
//                <head>
//                    <style>
//                        .table tbody tr td{
//                            text-align: center;
//                        }
//
//                        table, tr, td, thead, tbody{
//                            border: 1px solid black;
//                        }
//
//                        .table{
//                            border-collapse: collapse;
//                            width: 50%;
//                        }
//                    </style>
//                </head>
//                <body>
//                    <main>
//                        <h1>List Of Staff</h1>
//                        <p><xsl:value-of select="count(//staff_member)" /> record(s)</p>
//                        <table class="table">
//                            <thead>
//                                <tr>
//                                    <th rowspan="2">ID</th>
//                                    <th rowspan="2">Staff Code</th>
//                                    <th rowspan="2">Staff Name</th>
//                                    <th rowspan="2">Password</th>
//                                    <th rowspan="2">Phone Number</th>
//                                    <th rowspan="2">Email</th>
//                                    <th rowspan="2">Deployment Date</th>
//                                    <th rowspan="2">Image</th>
//                                </tr>
//                            </thead>
//                            <tbody>
//                                <xsl:for-each select="//staff_member">
//                                    <xsl:sort select="id" />
//                                    <tr>
//                                        <td><xsl:value-of select="id" /></td>
//                                        <td><xsl:value-of select="staffCode" /></td>
//                                        <td><xsl:value-of select="staffName" /></td>
//                                        <td><xsl:value-of select="staffPassword" /></td>
//                                        <td><xsl:value-of select="staffPhoneNum" /></td>
//                                        <td><xsl:value-of select="staffEmail" /></td>
//                                        <td><xsl:value-of select="deploymentDate" /></td>
//                                        <td><img src="{image}" alt="Staff Image" width="150" height="150"/></td>
//                                    </tr>
//                                </xsl:for-each>
//                            </tbody>
//                        </table>
//                    </main>
//                </body>
//            </html>
//        </xsl:template>
//    </xsl:stylesheet>
//    XSL;
//
//    file_put_contents(public_path('Staff.xsl'), $xslContent);
//    
//    return view('staff_xml_generated');
//        // Return the transformed HTML content
//    }


//$xsl = new \DOMDocument();
//        $xsl->load(public_path('/staff.xsl'));
//
//        $processor = new \XSLTProcessor();
//        $processor->importStylesheet($xsl);
//
//        $result = $processor->transformToXML($xml);
//
//        file_put_contents(public_path('staff.html'), $result);
//        
//        
//class StaffController extends Controller {
//
//    /**
//     * Display a listing of the resource.
//     */
//    public function index() {
//        $staff = Staff::all();
//        return view('indexStaff', compact('staff'));
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create() {
//        return view('createStaff');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request) {
//
//        $validatedData = $request->validate([
//            'staffCode' => 'required|unique:staff',
//            'staffName' => 'required',
//            'staffPassword' => 'required',
//            'staffPhoneNum' => 'required',
//            'staffEmail' => 'required|email',
//            'deploymentDate' => 'required|date',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for image upload as needed
//        ]);
//
//        $staff = new Staff();
//
//// Assign values from the request to the Staff object
//        $staff->staffCode = $request->input('staffCode');
//        $staff->staffName = $request->input('staffName');
//        $staff->staffPassword = $request->input('staffPassword');
//        $staff->staffPhoneNum = $request->input('staffPhoneNum');
//        $staff->staffEmail = $request->input('staffEmail');
//        $staff->deploymentDate = $request->input('deploymentDate');
//
//        if ($request->hasFile('image')) {
//            $imagePath = $request->file('image')->store('images');
//            $staff->image = $imagePath;
//        }
//
//// Save the Staff object to the database
//        $staff->save();
//
//// Redirect to a specific URL with a success message
//        return redirect()->route('staff.index')->with('success', 'Staff information has been added successfully.');
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(string $id) {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(string $id) {
//        $staffMember = Staff::find($id);
//        return view('editStaff', compact('staffMember'));
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Request $request, string $id) {
//        // Find the staff member by ID
//        $staffMember = Staff::find($id);
//
//        // Update the staff member's details
//        $staffMember->staffCode = $request->input('staffCode');
//        $staffMember->staffName = $request->input('staffName');
//        if ($request->filled('staffPassword')) {
//        $staffMember->staffPassword = $request->input('staffPassword');
//    }
//        $staffMember->staffPhoneNum = $request->input('staffPhoneNum');
//        $staffMember->staffEmail = $request->input('staffEmail');
//        $staffMember->deploymentDate = $request->input('deploymentDate');
//
//        // Save the updated staff member to the database
//        $staffMember->save();
//
//        // Redirect to the index page with a success message
//        return redirect()->route('staff.index')->with('success', 'Staff information has been updated successfully.');
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy($id) {
//        // Find the staff member by ID
//        $staffMember = Staff::find($id);
//
//        // Check if the staff member exists
//        if (!$staffMember) {
//            // If staff member doesn't exist, redirect back with an error message
//            return redirect()->back()->with('error', 'Staff member not found.');
//        }
//
//        // Delete the staff member
//        $staffMember->delete();
//
//        // Redirect to the index page with a success message
//        return redirect()->route('staff.index')->with('success', 'Staff information has been deleted successfully.');
//    }
//
//}
