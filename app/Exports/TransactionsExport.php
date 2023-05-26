<?php

namespace App\Exports;

use App\User;
use App\SubscriptionPlan;
use App\Transactions;
 

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class TransactionsExport implements FromCollection, WithHeadings, ShouldAutoSize , WithEvents, WithMapping,FromQuery
{
    use Exportable;

    public function query()
    {
            ini_set('memory_limit', '1024M');
            
            $start_date_time = strtotime(date("Y-m-d H:i:s", $this->star_date));
            $end_date_time = strtotime(date("Y-m-d 23:00:00", $this->end_date));

            
                return Transactions::whereBetween('date', array($start_date_time, $end_date_time))->orderBy('id')->get(['id','user_id','email','plan_id','gateway','payment_amount','payment_id','date']);
    }
   
    protected $star_date;
    protected $end_date;

     function __construct($star_date,$end_date) {
                        
            $this->star_date = $star_date;
            $this->end_date = $end_date;
     }

    public function collection()
    {
         
            $start_date_time = strtotime(date("Y-m-d H:i:s", $this->star_date));
            $end_date_time = strtotime(date("Y-m-d 23:00:00", $this->end_date));

            
                return Transactions::whereBetween('date', array($start_date_time, $end_date_time))->orderBy('id')->get(['id','user_id','email','plan_id','gateway','payment_amount','payment_id','date']);
           
    }

    public function map($transactions): array
    {   
        return [             
                User::getUserFullname($transactions->user_id),
                $transactions->email,
                SubscriptionPlan::getSubscriptionPlanInfo($transactions->plan_id,'plan_name'),
                $transactions->gateway,
                $transactions->payment_amount,
                 $transactions->payment_id,
                date('m-d-Y',$transactions->date)           
                
            ];
    }

    public function headings(): array
    {
        return [             
            'Name',
            'Email',            
            'Plan',
            'Gateway',
            'Amount',            
            'Payment ID',           
            'Date'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:G1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

}