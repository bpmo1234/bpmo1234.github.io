<?php

namespace App\Exports;

use App\User;
use App\SubscriptionPlan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class UsersExport implements WithHeadings, ShouldAutoSize , WithEvents, WithMapping,FromQuery
{
    use Exportable;
    
    public function query()
    {
         ini_set('memory_limit', '1024M');
        return User::query();
    }

    public function map($users): array
    {
        return [             
            $users->id,
            $users->name,
            $users->email,
            $users->phone,
            $users->user_address,
            SubscriptionPlan::getSubscriptionPlanInfo($users->plan_id,'plan_name'),
            date('m-d-Y',$users->exp_date),
             $users->plan_amount
            
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Phone',
            'Address',
            'Plan',
            'Exp Date',           
            'Amount'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:H1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

}