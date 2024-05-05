<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
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
    return $pdf->output();
}
private function generatePdf($staff)
{
    // Render PDF view with staff details
    $pdf = new Mpdf();
    $pdf->WriteHTML(View::make('pdf.staff_pdf', compact('staff'))); // Update the view filename here
    return $pdf;
}

}
