<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Rap2hpoutre\FastExcel\FastExcel;

class SubscribersController extends Controller
{
    public function index()
    {
        $subscribers = Subscription::paginate(3);
        return view('dashboard.subscribers.index', compact('subscribers'));
    }

    public function show(Subscription $subscriber)
    {
        return view('dashboard.subscribers.show', compact('subscriber'));
    }

    public function destroy(Subscription $subscriber)
    {
        $subscriber->delete();
        return redirect()->route('dashboard.subscribers.index')->with('success_message', 'The subscriber has been deleted successfully');

    }

    public function exportSubscriber()
    {

        $subscribers = Subscription::all();
        (new FastExcel($subscribers))->export('subscribers.xlsx');
        return redirect()->back()->with('success_message', 'The subscribers has been exported successfully');;
    }

}
