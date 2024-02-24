<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelper;
use App\Http\Controllers\Controller;
use App\Http\Services\BankService;
use App\Models\Banks;
use App\Models\BankService as ModelsBankService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * @var BanksController
 * @author Shaarif<shaarifsabah5299@gmail.com>
 */
class BanksController extends Controller
{

    /**
     * @var BankService $_bankService
     */
    private BankService $_bankService;

    /**
     * @param BankService $_bankService
     */
    public function __construct(BankService $_bankService)
    {
        parent::__construct();
        $this->_bankService = $_bankService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $banks = $this->_bankService->getAllBanks();
        return view('backend.admin.banks.index', compact(
            'banks',
        ));
    }

    public function edit(Banks $bank)
    {
        return view('backend.admin.banks.edit', compact('bank'));
    }

    public function update(Banks $bank, Request $request)
    {
        $name = $request->get('name');
        $swift_code = $request->get('swift_code');

        $bank->update(['name' => $name, 'swift_code' => $swift_code]);

        return redirect()->back()->with('success', 'Bank edited successfully');
    }

    public function updateServiceStatus(Request $request)
    {
        $serviceId = $request->input('service_id');
        $isChecked = $request->input('is_checked') == 1 ? true : false;
        
        $service = ModelsBankService::find($serviceId);

        $service->update(['status'=>$isChecked]);

        return response()->json(['success' => true]);
    }
}