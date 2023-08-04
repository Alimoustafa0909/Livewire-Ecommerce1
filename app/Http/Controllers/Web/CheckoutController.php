<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers;

class CheckoutController extends Controller
{

    public function index()
    {
        return view('web.checkout.index');
    }

}
