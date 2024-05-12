<?php

namespace App\Http\Controllers;

use App\Repository\StaffRepositoryInterface;
use App\Repository\StaffRepository;
use App\Models\Staff;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StaffController extends Controller {

    public $staffRepository;

    public function __construct(StaffRepositoryInterface $staffRepository) {
        $this->staffRepository = $staffRepository;
    }

    public function login(Request $request) {
        $email = $request->input('staffEmail');
        $password = $request->input('staffPassword');

        // Hardcoded email and password (Replace with your actual credentials)
        $validEmail = 'admin@example.com';
        $validPassword = 'password';

        if ($email === $validEmail && $password === $validPassword) {
            // Authentication passed...
            // You can store the user's information in session or redirect to a dashboard page
            $request->session()->put('user_email', $email);
           return redirect()->route('staff.index');
        }

        // Authentication failed...
        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request) {
        // Clear user session
        $request->session()->forget('user_email');
        return redirect('/login');
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
        $validator = Validator::make($request->all(), [
                    'staffCode' => 'required|unique:staff',
                    'staffName' => 'required',
                    'staffPassword' => 'required|min:8',
                    //'staffPhoneNum' => 'required',
                    'staffType' => 'required',
                    'staffEmail' => 'required|email|unique:staff',
                    'deploymentDate' => 'required|date',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                        ], [
                    'staffCode.required' => '*The staff code field is required.',
                    'staffCode.unique' => '*The staff code has already been taken.',
                    'staffName.required' => '*The staff name field is required.',
                    'staffPassword.required' => '*The staff password field is required.',
                    'staffPassword.min' => '*The staff password must be at least :min characters.',
                    //'staffPhoneNum.required' => 'The staff phone number field is required.',
                    'staffType.required' => '*The staff type field is required.',
                    'staffEmail.required' => '*The staff email field is required.',
                    'staffEmail.email' => '*Please enter a valid email address.',
                    'staffEmail.unique' => '*The staff email has already been taken.',
                    'deploymentDate.required' => '*The deployment date field is required.',
                    'deploymentDate.date' => '*Please enter a valid date format.',
                    'image.image' => '*The file must be an image.',
                    'image.max' => '*The Image size cannot exceed 2 MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if an image file is uploaded
        if ($request->hasFile('image')) {
            // Get the file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            // Get just the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just the extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // Upload image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            // If no image is uploaded, set the file name to null
            $fileNameToStore = null;
        }

        // Get the validated data
        $validatedData = $validator->validated();

        // Add the image file name to the validated data
        $validatedData['image'] = $fileNameToStore;

        // Create a new staff record with the validated data
        $this->staffRepository->create($validatedData);

        // Redirect to a specific URL with a success message
        return redirect()->route('staff.index')->with('success', 'Staff information has been added successfully.');
    }

//    public function store(Request $request) {
//    // Validate the incoming request data
//    $validator = Validator::make($request->all(), [
//        'staffCode' => 'required|unique:staff',
//        'staffName' => 'required',
//        'staffPassword' => 'required|min:8',
//        //'staffPhoneNum' => 'required',
//        'staffType' => 'required',
//        'staffEmail' => 'required|email|unique:staff',
//        'deploymentDate' => 'required|date',
//        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//    ], [
//        'staffCode.required' => 'The staff code field is required.',
//        'staffCode.unique' => 'The staff code has already been taken.',
//        'staffName.required' => 'The staff name field is required.',
//        'staffPassword.required' => 'The staff password field is required.',
//        'staffPassword.min' => 'The staff password must be at least :min characters.',
//        //'staffPhoneNum.required' => 'The staff phone number field is required.',
//        'staffType.required' => 'The staff type field is required.',
//        'staffEmail.required' => 'The staff email field is required.',
//        'staffEmail.email' => 'Please enter a valid email address.',
//        'staffEmail.unique' => 'The staff email has already been taken.',
//        'deploymentDate.required' => 'The deployment date field is required.',
//        'deploymentDate.date' => 'Please enter a valid date format.',
//        'image.image' => 'The file must be an image.',
//        'image.mimes' => 'The image must be a file of type: :values.',
//        'image.max' => 'The image may not be greater than :max kilobytes.',
//    ]);
//
//    if ($validator->fails()) {
//        return redirect()->back()->withErrors($validator)->withInput();
//    }
//
//    // Get the validated data
//    $validatedData = $validator->validated();
//
//    // Add some debug statements
//    \Log::info('Validated Data:', $validatedData);
//
//    // Create a new staff record with the validated data
//    $this->staffRepository->create($validatedData);
//
//    // Add some debug statements
//    \Log::info('Staff record created successfully.');
//
//    // Redirect to a specific URL with a success message
//    return redirect()->route('staff.index')->with('success', 'Staff information has been added successfully.');
//}

    public function edit(string $id) {
        $staffMember = $this->staffRepository->find($id);
        return view('editStaff', compact('staffMember'));
    }

    public function update(Request $request, string $id) {
        $validatedData = $request->validate([
            'staffCode' => 'required|unique:staff,staffCode,' . $id,
            'staffName' => 'required',
            'staffType' => 'required',
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
            $staffElement->appendChild($xml->createElement('staffType', $staff->staffType));
            $staffElement->appendChild($xml->createElement('staffEmail', $staff->staffEmail));
            $staffElement->appendChild($xml->createElement('deploymentDate', $staff->deploymentDate));
            $staffElement->appendChild($xml->createElement('image', $staff->image)); // Assuming 'image' is the field for storing image paths
            // Add other fields as needed
        }

        // Save the XML to a file
        $xml->save(public_path('/staff.xml'));

        // Load the XSL stylesheet
        $xsl = new \DOMDocument();
        $xsl->load(public_path('/staff.xsl'));

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
