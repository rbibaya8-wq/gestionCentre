<?php

namespace App\Http\Controllers;

use App\Models\{Payment, Student};
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function create(Student $student)
{
    return view('payments.create', compact('student'));
}

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric|min:0',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer',
        ]);

        $dueDate = Carbon::create($request->year, $request->month, 5);
        $late = Carbon::now()->gt($dueDate) ? 'Yes' : 'No';

        Payment::create([
            'student_id' => $request->student_id,
            'amount' => $request->amount,
            'month' => $request->month,
            'year' => $request->year,
            'payment_date' => now(),
            'late' => $late
        ]);

        return redirect()->route('students.show', $request->student_id)
            ->with('success','Payment added successfully');
    }

    public function show(Payment $payment)
    {
        $payment->load('student');

        $pdf = Pdf::loadView('payments.receipt', compact('payment'));

        return $pdf->download('receipt_'.$payment->id.'.pdf');
    }
}