<?php

namespace App\Http\Controllers;

use App\Contracts\TestContract;
use Illuminate\Http\Request;

class TestContractController extends Controller
{
    //
    public $interface;

    public function __construct(TestContract $testContract)
    {
        $this->interface = $testContract;
    }

    public function index()
    {
        return $this->interface->callMe();
    }
}
