<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ExpenseReport;
use App\Mail\SummaryReport;
use App\User;

//Tools
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

//Para tomar el usuario
use Illuminate\Support\Facades\Auth;

class ExpenseReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('profile_complete');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenseReport = DB::table('expense_reports')
                     ->select('*')
                     ->where('user_id', '=', Auth::user()->id)
                     ->get();

        // dd($expenseReport);

        return view('expenseReport.index', ['expense_reports'=>$expenseReport]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new ExpenseReport();
        // $validatedData = $request->validate([
        //     'title'=> 'required|min:5'
        // ]);
        
        $this->validateReports($request);
        
        $validatedData = $request->validate([
            'title'=> 'required'
        ]);

        $report->title = $validatedData['title'];
        $report->user_id = Auth::user()->id;
        $report->save();

        return redirect('/reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  ExpenseReport  $report
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseReport $report)
    {
        if ($report->user_id == Auth::user()->id) {

            $total = $this->sumaTotal($report);

            return view('expenseReport.show', [
                'report'=>$report,
                'total'=>$total
            ]);
        }

        return redirect('/reports');
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);

        return view('expenseReport.edit',[
                'report'=>$report
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = ExpenseReport::findOrFail($id);
        $report->title = $request->get('title');

        $report->save();

        return redirect('/reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = ExpenseReport::findOrFail($id);
        $report->delete();

        return redirect('/reports');
    }

    public function confirm_datroy($id)
    {
        $report = ExpenseReport::findOrFail($id);

        return view('expenseReport.confirm_destroy', [
            'report'=>$report
        ]);
    }

    public function ConfirmSendMail(ExpenseReport $report)
    {
        return view('expenseReport.confirmSendMail',[
            'report'=>$report
            ]);
    }

    public function sendMail(Request $request, ExpenseReport $report)
    {
        $validatedData = $request->validate([
            'email'=>'required|email|regex:/^.+@.+$/i'
            ]);

        Mail::to($validatedData['email'])->send(new SummaryReport($report));

        return redirect('/reports/'.$report->id);
    }

    //Customazing messages
    private function validateReports($request)
    {
        $messages = [
            'title.required' => 'The :attribute field is required XD.',
            'title.min' => 'The :attribute field debe ser minimo a :min XD.',
        ];

        $rules = ['title'=>'required|min:4'];

        $this->validate($request,$rules,$messages);
    }
    
    //Total
    public function sumaTotal(ExpenseReport $report)
    {
        $total = 0;

        foreach ($report->expense as $expense) {
            $total += $expense->amount;
        }

        return $total;
    }
}
