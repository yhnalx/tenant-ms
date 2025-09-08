<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaytenantController extends Controller
{
    public function showPayments()
    {
        // Hardcoded payments for web UI testing
        $payments = [
            (object)[
                'remarks' => 'Monthly Rent',
                'rental_due' => 5000,
                'water_due' => 300,
                'internet_due' => 1200,
                'cepalco_due' => 450,
                'total_due' => 6950,
                'due_date' => Carbon::now()->addDays(5),
                'status' => 'Pending',
            ],
            (object)[
                'remarks' => 'Maintenance Fee',
                'rental_due' => 0,
                'water_due' => 0,
                'internet_due' => 0,
                'cepalco_due' => 200,
                'total_due' => 200,
                'due_date' => Carbon::now()->subDays(2),
                'status' => 'Overdue',
            ],
            (object)[
                'remarks' => 'Extra Charges',
                'rental_due' => 1000,
                'water_due' => 100,
                'internet_due' => 150,
                'cepalco_due' => 50,
                'total_due' => 1300,
                'due_date' => Carbon::now()->addDays(10),
                'status' => 'Pending',
            ],
            (object)[
                'remarks' => 'Previous Payment',
                'rental_due' => 4000,
                'water_due' => 250,
                'internet_due' => 1200,
                'cepalco_due' => 400,
                'total_due' => 5850,
                'due_date' => Carbon::now()->subDays(15),
                'status' => 'Paid',
            ],
        ];

        return view('paytenant', ['payments' => $payments]);
    }
}
