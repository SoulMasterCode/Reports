<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\ExpenseReport;

use App\Http\Controllers\ExpenseReportsController;

class SummaryReport extends Mailable
{
    use Queueable, SerializesModels;

    private $expenseReport;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ExpenseReport $expenseReport)
    {
        $this->expenseReport = $expenseReport;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $report = new ExpenseReportsController();
        $total=$report->sumaTotal($this->expenseReport);

        return $this->view('Mail.expenseReport',[
            'report'=>$this->expenseReport,
            'total'=>$total
        ]);
    }
}
