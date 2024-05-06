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

     // Get recipient email from the database
     $recipientEmail = $staff->email;

     // Get CC email addresses from the database
     $ccEmails = [
         $staff->currentregionalmisemail,
         $staff->newreportinglineemail,
         $staff->newregionalmisemail,
     ];

    // Return the PDF as a response
    //return $pdf->output();
    //$recipientEmail = 'uprightness2018@gmail.com'; // Change to recipient's email address
    //$ccEmails = ['eziukwuuprightness@gmail.com']; // Change to CC recipients' email addresses
    $redeploymentType = $staff->redeploymenttype;

    // Check the redeployment type and send the appropriate email
    try {
        if ($redeploymentType === 'Strategic Management') {
            // Send email for strategic management redeployment
            Mail::to($recipientEmail)
                ->cc($ccEmails)
                ->send(new StaffDeploymentMail($staff, $pdf));
        } elseif ($redeploymentType === 'Audit Recommendation') {
            // Send email for audit recommendation redeployment
            Mail::to($recipientEmail)
                ->cc($ccEmails)
                ->send(new AuditRecommendationRedeploymentMail($staff, $pdf));
        } elseif ($redeploymentType === 'Compassionate Ground') {
            // Send email for audit recommendation redeployment
            Mail::to($recipientEmail)
                ->cc($ccEmails)
                ->send(new CompassionateGroundRedeploymentMail($staff, $pdf));
        }else {
            // Default email if redeployment type is not recognized
            Mail::to($recipientEmail)
                ->cc($ccEmails)
                ->send(new RecordDiscripancyRedeploymentMail($staff, $pdf));
        }

        // Email sent successfully
        return response()->json(['success' => true, 'message' => 'Email sent successfully']);
    } catch (\Exception $e) {
        // Error sending email
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}
private function generatePdf($staff)
{
    // Render PDF view with staff details
    $pdf = new Mpdf();
    $pdf->WriteHTML(View::make('pdf.staff_pdf', compact('staff'))); // Update the view filename here
    return $pdf;
}

}