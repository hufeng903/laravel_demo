<?php

namespace App\Http\Controllers;

use App\Contracts\TestContract;
use Illuminate\Http\Request;

/**
 * Class TestContractController
 * @package App\Http\Controllers
 */
class TestContractController extends Controller
{
    //-------region 初始化信息-----------//
    /**
     * @var TestContract
     */
    public $interface;

    /**
     * TestContractController constructor.
     * @param TestContract $testContract
     */
    public function __construct(TestContract $testContract)
    {
        $this->interface = $testContract;
    }

    //-------endregion--------//


    //-------region操作信息----//

    /**
     * @return mixed
     */
    public function index()
    {
        dd(app());
        return $this->interface->callMe();
    }

    /**
     * @return array
     */
    public function getMiddleware()
    {
        return $this->middleware;
    }

    /**
     * @param array $middleware
     */
    public function setMiddleware($middleware)
    {
        $this->middleware = $middleware;
    }

    /**
     * @return TestContract
     */
    public function getInterface()
    {
        return $this->interface;
    }

    /**
     * @param TestContract $interface
     */
    public function setInterface($interface)
    {
        $this->interface = $interface;
    }

    /**
     * @return string
     */
    public function getValidatesRequestErrorBag()
    {
        return $this->validatesRequestErrorBag;
    }

    /**
     * @param string $validatesRequestErrorBag
     */
    public function setValidatesRequestErrorBag($validatesRequestErrorBag)
    {
        $this->validatesRequestErrorBag = $validatesRequestErrorBag;
    }

    //--------endregion---------//


    //-------region 逻辑信息----//

    //todo 这里写处理逻辑

    //-------endregion---------//
}
