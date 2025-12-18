<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billing;

class BillingController extends Controller
{
    public function index()
    {
        $totalBills = Billing::count();
        $totalRevenue = Billing::sum('total_amount');
        $paidBills = Billing::where('status', 'paid')->count();
        $pendingBills = Billing::where('status', 'pending')->count();

        $recentBills = Billing::with('patient')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.billings.index', compact(
            'totalBills',
            'totalRevenue',
            'paidBills',
            'pendingBills',
            'recentBills'
        ));
    }
}
