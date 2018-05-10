<?php

namespace App\Http\Controllers;

use App\Jobs\SendReminderEmail;
use App\Models\QueueTask;
use App\Jobs\TestQueue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestQueueController extends Controller
{
    //
    public function index()
    {
        dispatch((new TestQueue()));
    }

}
