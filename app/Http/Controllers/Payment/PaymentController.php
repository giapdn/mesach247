<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Sach;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index($id): View
    {
        $sach = Sach::query()->findOrFail($id);
        return view('client.pages.thanh-toan')->with('sach', $sach);
    }
}
