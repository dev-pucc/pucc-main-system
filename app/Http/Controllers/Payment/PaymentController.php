<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
       $payments=DB::table('payments')->get();
    
        
       return view('payment.payments',['payments' => $payments]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($page)
    {
        $Pages = [
            'cp' => 'payment.computerclubform',
            'deeplearning' => 'payment.deeplearningform',
            'development' => 'payment.developmentform',
            'devops' => 'payment.devopsform',
            'gaming' => 'payment.gamingform',
            'networking' => 'payment.networkingform',
        ];

        
            return view($Pages[$page]); // Load the correct view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id'=> 'required|string', 
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'club' => 'required|string', 
        ]);

    
        $payment = DB::table('payments')->insert([
            'student_id'=> $request->student_id,
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'amount'=>$request->amount,
            'payment_date'=>$request->payment_date,
            'club'=>$request->club,

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($payment) {
            return redirect()->back()->with('success', 'Payment successfully recorded!');
        } else {
            return redirect()->back()->with('error', 'Failed to process the payment!');
        }
    
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
    $studentId = $request->input('student_id');

    // Fetch transactions for the given student_id
    $payments = DB::table('payments')
    ->where('student_id', $studentId)
    ->get();

    if ($payments->isEmpty()) {
            // Fetch all transactions
            $payments = DB::table('payments')->get();

            return redirect()->back()->with('error', 'No transactions found for the given Student ID.')
                ->with(['payments' => $payments]);
        }

    // Return a view with the transactions
    return view('payment.payments',['payments' => $payments]);
}
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $payment = DB::table('payments')->where('id', $id)->first();
        return view('payment.editpayment',['payment'=>$payment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'student_id'=> 'required|string', 
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'club' => 'required|string', 
        ]);
    
        $paymentData = [
            'student_id'=> $request->student_id,
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'amount'=>$request->amount,
            'payment_date'=>$request->payment_date,
            'updated_at' => now(),
        ];
        $updated = DB::table('payments')->where('id', $id)->update($paymentData);
        if ($updated) {
            return redirect()->route('payments.index')->with('success', 'Update successful!');
        } else {
            return redirect()->back()->with('error', 'Failed to update the payment!');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
        $deleted = DB::table('payments')->where('id', $id)->delete();
            if ($deleted) {
            return redirect()->back()->with('success', 'Payment deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to delete the payment!');
        }
  
    }
}
