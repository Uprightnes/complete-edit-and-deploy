<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Mail;
use App\Mail\StaffDeploymentMail;
use Illuminate\Support\Facades\View; 
use Mpdf\Mpdf;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    public function deploy(Request $request)
{
    // Handle deploy action here
    // Retrieve the staff ID from the request
    $staffId = $request->input('staffId');

    // Retrieve staff details based on the ID
    $staff = Staff::findOrFail($staffId);

    // Pass staff details to the PDF view
    $pdf = $this->generatePdf($staff);

    // Return the PDF as a response
    //return $pdf->output();
    $recipientEmail = 'uprightness2018@gmail.com'; // Change to recipient's email address
    $ccEmails = ['eziukwuuprightness@gmail.com']; // Change to CC recipients' email addresses

    Mail::to($recipientEmail)
        ->cc($ccEmails)
        ->send(new StaffDeploymentMail($staff, $pdf));

    // Redirect back or any other response as needed
    return 'email sent';
}
private function generatePdf($staff)
{
    // Render PDF view with staff details
    $pdf = new Mpdf();
    $pdf->WriteHTML(View::make('pdf.staff_pdf', compact('staff'))); // Update the view filename here
    return $pdf;
}

}