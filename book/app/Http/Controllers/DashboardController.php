<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Controller cho dashboard
class DashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = Order::sum('total_price');

        return view('dashboard', compact('totalRevenue'));
    }

}
