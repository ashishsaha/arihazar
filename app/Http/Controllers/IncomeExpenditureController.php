<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankDetails;
use App\Models\Branch;
use App\Models\Budget;
use App\Models\BudgetLog;
use App\Models\Contractor;
use App\Models\Cotractoraccount;
use App\Models\Employee;
use App\Models\Incoexpense;
use App\Models\Khat;
use App\Models\Khattype;
use App\Models\Projectpayment;
use App\Models\TaxType;
use App\Models\TaxTypeType;
use App\Models\Upangsho;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class IncomeExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = Bank::where('sister_concern_id', 1)->get();
        return view('accounts.income_expenditure.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Upangsho::where('upangsho_id', '!=', 0)->get();
        $types = TaxType::where('sister_concern_id', 1)->get();
        $banks = Bank::where('sister_concern_id', 1)->get();
        $employees = Contractor::get();
        return view('accounts.income_expenditure.create', compact('sections', 'types', 'banks', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request['amount'] = bnNumberToEn($request->amount);
        $request['cheque_amount'] = bnNumberToEn($request->cheque_amount);
        $request['cheque_no'] = bnNumberToEn($request->cheque_no);
        $request['voucher_no'] = bnNumberToEn($request->voucher_no);
        $request['jamanot'] = bnNumberToEn($request->jamanot ?? 0);
        $request['jamanot_voucher_no'] = bnNumberToEn($request->jamanot_voucher_no ?? 0);
        $request['jamanot_cheque_no'] = bnNumberToEn($request->jamanot_cheque_no ?? 0);
        $request['vat'] = bnNumberToEn($request->vat ?? 0);
        $request['vat_voucher_no'] = bnNumberToEn($request->vat_voucher_no ?? null);
        $request['vat_cheque_no'] = bnNumberToEn($request->vat_cheque_no ?? null);
        $request['tax'] = bnNumberToEn($request->tax ?? 0);
        $request['tax_voucher_no'] = bnNumberToEn($request->tax_voucher_no ?? null);
        $request['tax_cheque_no'] = bnNumberToEn($request->tax_cheque_no ?? null);
        $message = [
            'description.required_if' => 'দয়া করে খাতের বিবরণ পূরণ করেন',
        ];
        $request->validate([
            'upangsho' => 'required',
            'financial_year' => 'required',
            'bank' => 'required',
            'branch' => 'required',
            'bank_account' => 'required',
            'sector_type' => 'required',
            'sub_sector_type' => 'required',
            'sector' => 'required',
            'tax_type' => 'required',
            'income_expenditure' => 'required',
            'description' => 'required_if:income_expenditure,2',
            'amount' => 'required|numeric|min:1',
            'cheque_amount' => 'required|numeric|min:0',
            'voucher_no' => 'nullable|max:255',
            'cheque_no' => 'nullable|max:255',
            'jamanot' => 'nullable|numeric',
            'jamanot_voucher_no' => 'nullable|max:255',
            'jamanot_cheque_no' => 'nullable|max:255',
            'vat' => 'nullable|numeric',
            'vat_voucher_no' => 'nullable|max:255',
            'vat_cheque_no' => 'nullable|max:255',
            'tax' => 'nullable|numeric',
            'tax_voucher_no' => 'nullable|max:255',
            'tax_cheque_no' => 'nullable|max:255',
            'date' => 'required|date',
            'receiver_name' => 'nullable|max:255',
            'note' => 'nullable|max:255',
        ], $message);

        if ($request->income_expenditure == 1) {
            $vourcher_no = "";
            $chalan_no = $request->voucher_no;
            $status = 1;
        } else {
            $vourcher_no = $request->voucher_no;
            $chalan_no = "";
            $status = 0;
        }
        if (!empty($request->vat) || !empty($request->tax)) {
            $vat_tax_status = 1;
        } else {
            $vat_tax_status = 0;
        }
        $amount = $request->amount;
        $employ_id = null;
        if ($request->contractor) {

            $emp = new Cotractoraccount();
            $emp->userid = Auth::id();
            $emp->prev_bill_amount = 0;
            $emp->contractor_id = $request->contractor;
            $emp->project_id = $request->description;
            $emp->estmatekhat_id = $request->upangsho;
            $emp->project_price = $request->amount;
            $emp->bill_type = 0;
            $emp->contact_price = $request->amount;
            $emp->bankact = $request->bank_account;
            $emp->bill_amnt = $request->amount;
            $emp->security_money = $request->jamanot ?? 0;
            $emp->contractyear = $request->financial_year;
            $emp->contact_date = Carbon::parse($request->date);
            $emp->vat = $request->vat ?? 0;
            $emp->incometax = $request->tax;
            $emp->total_bill = $request->amount + ($request->vat ?? 0) + ($request->tax ?? 0);
            $emp->bill_paid = $request->amount;
            $emp->bill_due = $request->amount + ($request->vat ?? 0) + ($request->tax ?? 0) - $request->amount;
            $emp->acc_no = $request->note ?? 'নাই';
            $emp->check_no = $request->cheque_no;
            $emp->vaocher_no = $vourcher_no;
            $emp->date = Carbon::parse($request->date);
            $emp->save();

            $employ_id = $request->contractor;

            $projectpayment = new Projectpayment;
            $projectpayment->payment_date = Carbon::parse($request->date);
            $projectpayment->payment = $request->amount;
            $projectpayment->commints = $request->note;
            $projectpayment->proklpo_id = $employ_id;
            $projectpayment->userid = Auth::id();
            $projectpayment->bankact = $request->bank_account;
            $projectpayment->check_nos = $request->cheque_no;
            $projectpayment->voucher_no = $vourcher_no;
            $projectpayment->save();
        }

        $incoexpenseid = new Incoexpense();
        $incoexpenseid->user_id = Auth::id();
        $incoexpenseid->upangsho_id = $request->upangsho;
        $incoexpenseid->inout_id = $request->income_expenditure;
        $incoexpenseid->khattype_id = $request->sector_type;
        $incoexpenseid->khtattypetype_id = $request->sub_sector_type;
        $incoexpenseid->khat_id = $request->sector;
        $incoexpenseid->proklpo_id = $employ_id;
        $incoexpenseid->taxnontax = $request->tax_type;
        $incoexpenseid->khat_des = $request->description;
        $incoexpenseid->year = $request->financial_year;
        $incoexpenseid->bank_id = $request->bank;
        $incoexpenseid->branch_id = $request->branch;
        $incoexpenseid->acc_no = $request->bank_account;
        $incoexpenseid->vourcher_no = $vourcher_no;
        $incoexpenseid->status = $status;
        $incoexpenseid->vat_tax_status = $vat_tax_status;
        $incoexpenseid->chalan_no = $chalan_no;
        $incoexpenseid->check_no = $request->cheque_no;
        $incoexpenseid->amount = $request->amount;
        $incoexpenseid->cheque_amount = $request->cheque_amount ?? 0;
        $incoexpenseid->date = Carbon::parse($request->date);
        $incoexpenseid->receiver_name = $request->receiver_name;
        $incoexpenseid->receive_datwe = Carbon::parse($request->date);
        $incoexpenseid->note = $request->note;
        $incoexpenseid->save();


        if (!empty($request->jamanot)) {

            $jamanot = new Incoexpense;
            $jamanot->user_id = Auth::id();
            $jamanot->upangsho_id = $request->upangsho;
            $jamanot->inout_id = $request->income_expenditure;
            $jamanot->khattype_id = $request->sector_type;
            $jamanot->khtattypetype_id = $request->sub_sector_type;
            $jamanot->khat_id = $request->sector;
            $jamanot->proklpo_id = $employ_id;
            $jamanot->taxnontax = $request->tax_type;
            $jamanot->khat_des = '-ঐ-কাজের জামানত';
            $jamanot->year = $request->financial_year;
            $jamanot->bank_id = $request->bank;
            $jamanot->branch_id = $request->branch;
            $jamanot->acc_no = $request->bank_account;
            $jamanot->vourcher_no = $request->jamanot_voucher_no;
            $jamanot->chalan_no = $chalan_no;
            $jamanot->check_no = $request->jamanot_cheque_no;
            $jamanot->amount = $request->jamanot;
            $jamanot->date = Carbon::parse($request->date);
            $jamanot->receiver_name = '১৪০০০৪১১০৭';
            $jamanot->status = $status;
            $jamanot->vat_tax_status = $incoexpenseid->incoexpenses_id;
            $jamanot->receive_datwe = Carbon::parse($request->date);
            $jamanot->note = $request->note;
            $jamanot->save();

            $jamanot = $request->jamanot;
            $amount += $jamanot;
        }


        if (!empty($request->vat)) {

            $vat = new Incoexpense;
            $vat->user_id = Auth::id();
            $vat->upangsho_id = $request->upangsho;
            $vat->inout_id = $request->income_expenditure;
            $vat->khattype_id = $request->sector_type;
            $vat->khtattypetype_id = $request->sub_sector_type;
            $vat->khat_id = $request->sector;
            $vat->proklpo_id = $employ_id;
            $vat->taxnontax = $request->tax_type;
            $vat->khat_des = '-ঐ-কাজের মূঃসঃক';
            $vat->year = $request->financial_year;
            $vat->bank_id = $request->bank;
            $vat->branch_id = $request->branch;
            $vat->acc_no = $request->bank_account;
            $vat->vourcher_no = $request->vat_voucher_no;
            $vat->chalan_no = $chalan_no;
            $vat->check_no = $request->vat_cheque_no;
            $vat->amount = $request->vat;
            $vat->date = Carbon::parse($request->date);
            $vat->receiver_name = '১/১১৩৩/০০৫/০৩১১';
            $vat->status = $status;
            $vat->vat_tax_status = $incoexpenseid->incoexpenses_id;
            $vat->receive_datwe = Carbon::parse($request->date);
            $vat->note = $request->note;
            $vat->save();

            $vatamnt = $request->vat;
            $amount += $vatamnt;
        }


        if (!empty($request->tax)) {
            $tax = new Incoexpense;
            $tax->user_id = Auth::id();
            $tax->upangsho_id = $request->upangsho;
            $tax->inout_id = $request->income_expenditure;
            $tax->khattype_id = $request->sector_type;
            $tax->khtattypetype_id = $request->sub_sector_type;
            $tax->khat_id = $request->sector;
            $tax->proklpo_id = $employ_id;
            $tax->taxnontax = $request->tax_type;
            $tax->khat_des = 'ঐ-কাজের আয়কর';
            $tax->year = $request->financial_year;
            $tax->bank_id = $request->bank;
            $tax->branch_id = $request->branch;
            $tax->acc_no = $request->bank_account;
            $tax->vourcher_no = $request->tax_voucher_no;
            $tax->status = $status;
            $tax->vat_tax_status = $incoexpenseid->incoexpenses_id;
            $tax->chalan_no = $chalan_no;
            $tax->check_no = $request->tax_cheque_no;
            $tax->amount = $request->tax;
            $tax->date = Carbon::parse($request->date);
            $tax->receiver_name = '১/১১৪১/০০১০/০১১১';
            $tax->receive_datwe = Carbon::parse($request->date);
            $tax->note = $request->note;
            $tax->save();

            $taxamnt = $request->tax;
            $amount += $taxamnt;
        }
        //echo '<br>'.$amount;
        if ($request->income_expenditure == 1) {

            BankDetails::where('bank_details_id', $request->bank_account)
                ->increment('update_balance', $amount);
        }

        return redirect()->back()->with('message', 'আয়/ ব্যয় সংযুক্তি সফল হয়েছে');

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request['amount'] = bnNumberToEn($request->amount);
        $request['cheque_amount'] = bnNumberToEn($request->cheque_amount);
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1',
            'cheque_amount' => 'nullable|numeric',
        ]);
        $newAmount = $request->amount;
        $incomeExpense = Incoexpense::where('incoexpenses_id', $request->income_expense_id)
            ->first();
        $currentAmount = $incomeExpense->amount;
        $currentBankAmount = BankDetails::where('bank_details_id', $incomeExpense->acc_no)
            ->first()
            ->update_balance;

        if ($incomeExpense->inout_id == 1) {
            $newBankAmount = ($currentBankAmount - $currentAmount) + $newAmount;
        } else {

            $newBankAmount = ($currentBankAmount + $currentAmount) - $newAmount;
        }
        BankDetails::where('bank_details_id', $incomeExpense->acc_no)
            ->update(['update_balance' => $newBankAmount]);
        $incomeExpense->update([
            'amount' => $newAmount,
            'cheque_amount' => $request->cheque_amount ?? 0,
        ]);

        return response()->json(['success' => 'আয়/ব্যয় হালনাগাদ হয়েছে']);

    }

    public function approved(Request $request)
    {
        $request['amount'] = bnNumberToEn($request->amount);
        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);
        $budgetLog = BudgetLog::where('bdgtlog_id', $request->budget_log_id)
            ->first();

        Budget::where('bidget_id', $budgetLog->budget_id)
            ->increment('budget_amo', $request->amount);

        $budgetLog->update([
            'amount' => $request->amount,
            'status' => 1,
            'apprby' => Auth::id(),
        ]);

        return response()->json(['success' => 'বাজেটের পরিমাণ অনুমোদন দেওয়া হয়েছে']);

    }

    public function datatable()
    {

        $query = Incoexpense::with('incomeExpenseType', 'upangsho',
            'taxType', 'taxSubType', 'sector', 'bank', 'branch', 'bankAccount');

        if (request()->has('bank') && request('bank') != '') {
            $query->where('bank_id', request('bank'));
        }
        if (request()->has('branch') && request('branch') != '') {
            $query->where('branch_id', request('branch'));
        }
        if (request()->has('bank_account') && request('bank_account') != '') {
            $query->where('acc_no', request('bank_account'));
        }
        if (request()->has('search_amount') && request('search_amount') != '') {
            $query->where('amount', 'like', '%' . bnNumberToEn(request('search_amount')) . '%');
        }
        if (request()->has('start_date') && request('start_date') != '' && request()->has('end_date') && request('end_date') != '') {
            $query->where('receive_datwe', '>=', Carbon::parse(request('start_date'))->format('Y-m-d'));
            $query->where('receive_datwe', '<=', Carbon::parse(request('end_date'))->format('Y-m-d'));

        }

        return DataTables::eloquent($query)
            ->addColumn('action', function (Incoexpense $incoexpense) {
                if ($incoexpense->inout_id == 1) {
                    $voucherNo = $incoexpense->chalan_no;
                } else {
                    $voucherNo = $incoexpense->vourcher_no;
                }
                $btn = '<a href="' . route('income_expense_edit', ['upangsho_id' => $incoexpense->upangsho_id, 'vourcher' => $voucherNo, 'year' => $incoexpense->year, 'inOut' => $incoexpense->inout_id]) . '" class="btn btn-success bg-gradient-success btn-sm"><i class="fa fa-edit"></i></a>';
                $btn .= ' <a role="button" data-id="' . $incoexpense->incoexpenses_id . '" class="btn btn-danger bg-gradient-danger btn-sm income-expense-delete"><i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->addColumn('upangsho_name', function (Incoexpense $incoexpense) {
                return $incoexpense->upangsho->upangsho_name ?? '';
            })
            ->addColumn('sector_type_name', function (Incoexpense $incoexpense) {
                return $incoexpense->taxType->tax_name ?? '';
            })
            ->addColumn('sub_sector_type_name', function (Incoexpense $incoexpense) {
                return $incoexpense->taxSubType->tax_name2 ?? '';
            })
            ->addColumn('sector_name', function (Incoexpense $incoexpense) {
                return $incoexpense->sector->khat_name ?? '';
            })
            ->addColumn('sector_serilas_name', function (Incoexpense $incoexpense) {
                return $incoexpense->sector->serilas ?? '';
            })
            ->addColumn('bank_name', function (Incoexpense $incoexpense) {
                return $incoexpense->bank->bank_name ?? '';
            })
            ->addColumn('branch_name', function (Incoexpense $incoexpense) {
                return $incoexpense->branch->branch_name ?? '';
            })
            ->addColumn('bank_account_no', function (Incoexpense $incoexpense) {
                return enNumberToBn($incoexpense->bankAccount->acc_no ?? '');
            })
            ->editColumn('receive_datwe', function (Incoexpense $incoexpense) {
                return enNumberToBn(Carbon::parse($incoexpense->receive_datwe)->format('d-m-Y'));
            })
            ->editColumn('year', function (Incoexpense $incoexpense) {
                return enNumberToBn($incoexpense->year);
            })
            ->addColumn('voucher_no_edit', function (Incoexpense $incoexpense) {
                if ($incoexpense->vourcher_no != ''){
                    return enNumberToBn($incoexpense->vourcher_no);
                }else{

                    return enNumberToBn($incoexpense->chalan_no);
                }
            })
            ->editColumn('amount', function (Incoexpense $incoexpense) {
                return enNumberToBn(number_format($incoexpense->amount, 2));
            })
            ->editColumn('cheque_amount', function (Incoexpense $incoexpense) {
                return enNumberToBn(number_format($incoexpense->cheque_amount, 2));
            })
            ->addColumn('bank_balance', function (Incoexpense $incoexpense) {
                return enNumberToBn(number_format($incoexpense->bankAccount->update_balance ?? 0, 2));
            })
            ->addColumn('income_expense_type_name', function (Incoexpense $incoexpense) {
                return $incoexpense->incomeExpenseType->khat ?? '';

            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function pendingDatatable()
    {

        $query = BudgetLog::where('budget_logs.status', 2)->with('sector');

        return DataTables::eloquent($query)
            ->addColumn('action', function (BudgetLog $budgetLog) {
                return '<a role="button" data-id="' . $budgetLog->bdgtlog_id . '" data-fiscal_year="' . enNumberToBn($budgetLog->year) . '"  data-sector_name="' . ($budgetLog->sector->serilas ?? ' ') . ' ' . $budgetLog->sector->khat_name . '" data-amount="' . $budgetLog->amount . '"  class="btn btn-warning bg-gradient-warning text-white btn-sm budget-approve">Approve</a>';
            })
            ->addColumn('sector_name', function (BudgetLog $budgetLog) {
                return $budgetLog->sector->khat_name ?? '';
            })
            ->addColumn('sector_serilas_name', function (BudgetLog $budgetLog) {
                return $budgetLog->sector->serilas ?? '';
            })
            ->editColumn('year', function (BudgetLog $budgetLog) {
                return enNumberToBn($budgetLog->year);
            })
            ->editColumn('amount', function (BudgetLog $budgetLog) {
                return enNumberToBn(number_format($budgetLog->amount, 2));
            })
            ->rawColumns(['action', 'status'])
            ->toJson();
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Request $request)
    {


        if ($request->incomeExpenseId) {
            $incomeExpense = Incoexpense::where('incoexpenses_id', $request->incomeExpenseId)
                ->first();
            if ($incomeExpense) {
                if ($incomeExpense->inout_id == 1) {
                    $voucherNo = $incomeExpense->chalan_no;
                } else {
                    $voucherNo = $incomeExpense->vourcher_no;
                }
                if ($incomeExpense->inout_id == 1) {
                    $incomeExpenses = Incoexpense::where('inout_id', $incomeExpense->inout_id)
                        ->where('upangsho_id', $incomeExpense->upangsho_id)
                        ->where('year', $incomeExpense->year)
                        ->where('chalan_no', $voucherNo)
                        ->delete();

                } elseif ($incomeExpense->inout_id == 2) {
                    $incomeExpenses = Incoexpense::where('inout_id', $incomeExpense->inout_id)
                        ->where('upangsho_id', $incomeExpense->upangsho_id)
                        ->where('year', $incomeExpense->year)
                        ->where('vourcher_no', $voucherNo)
                        ->delete();
                }
            } else {
                return response()->json(['success' => false, 'message' => 'ডাটা ফিল্টারিং ভুল হয়েছে']);
            }


            return response()->json(['success' => true, 'message' => 'মুছে ফেলা হয়েছে']);
        }
        return response()->json(['success' => false, 'message' => 'ডাটা ফিল্টারিং ভুল হয়েছে']);

    }


    public function addIncomeExpense($id, $inOut)
    {
        $upangshos = Upangsho::where('upangsho_id', '!=', 0)->get();
        $taxTypes = TaxType::all();

        $khattypetype = TaxTypeType::all();
        $menuname = 'আয়/ব্যয় সংযুক্তি';
        $submenu = '';
        $ExpenceKhat = '';

        $bankIDs = BankDetails::where('upangsho_id', $id)->pluck('bank_id')->toArray();
        $bank = Bank::whereIn('bank_id', $bankIDs)->get();
        $bankdetails = Bank::
        join('bank_details', 'bank_details.bank_id', '=', 'banks.bank_id')
            ->join('branches', 'branches.bank_id', '=', 'banks.bank_id')
            ->get();
        $economicalYears = Upangsho::getecoyears('19');

        $lastPostingData = Incoexpense::where('upangsho_id', $id)
            ->where('inout_id', $inOut)
            ->orderby('incoexpenses_id', 'desc')
            ->first();
        $upangshoId = $id;

        $selectedUpangsho = Upangsho::where('upangsho_id', $id)->first();
        $khatTypes = TaxType::where('sister_concern_id',auth()->user()->sister_concern_id)
                ->where('upangsho_id', $id)
                ->where('khat_id',$inOut)
                ->get();

        $khats = Khat::where('sister_concern_id',auth()->user()->sister_concern_id)
            ->where('upangsho_id', $id)->where('khattype', $inOut)->get();


        return view('accounts.income_expenditure.add_incoexpense_multi', compact('economicalYears', 'khattypetype', 'submenu', 'upangshos', 'menuname', 'khats', 'taxTypes', 'ExpenceKhat', 'bank', 'bankdetails',
            'upangshoId', 'inOut', 'lastPostingData', 'selectedUpangsho','khatTypes'));

    }

    public function incomeExpenseEdit($upangsho_id, $vourcher, $year, $inOut)
    {
        $selectedUpangsho = Upangsho::where('upangsho_id', $upangsho_id)->first();
        $totalJVA = 0;
        if ($inOut == 1) {
            $incomeExpenses = Incoexpense::where('upangsho_id', $upangsho_id)
                ->where('chalan_no', $vourcher)
                ->where('year', $year)->get();
        } elseif ($inOut == 2) {
            $incomeExpenses = Incoexpense::where('upangsho_id', $upangsho_id)
                ->where('vourcher_no', $vourcher)
                ->where('vat_tax_status', 1)
                ->where('year', $year)->get();


            if (count($incomeExpenses) > 0) {
                foreach ($incomeExpenses as $incomeExpense) {

                    $getJVAs = $incomeExpense->jvaData($incomeExpense->incoexpenses_id);
                    if (count($getJVAs) > 0) {
                        $totalJVA = 0;
                        foreach ($getJVAs as $getJVA) {
                            $totalJVA += $getJVA->amount;
                        }
                    }
                }
            }


        }


        $defineTotal = $incomeExpenses->sum('amount') + $totalJVA;

        $upangshos = Upangsho::all();

        $khatTypes = TaxType::where('upangsho_id', $upangsho_id)
            ->where('khat_id', $inOut)
            ->get();


        $bankIDs = BankDetails::where('upangsho_id', $upangsho_id)->pluck('bank_id')->toArray();
        $bank = Bank::whereIn('bank_id', $bankIDs)->get();
        $bankdetails = Bank::
        join('bank_details', 'bank_details.bank_id', '=', 'banks.bank_id')
            ->join('branches', 'branches.bank_id', '=', 'banks.bank_id')
            ->get();
        $economicalYears = Upangsho::getecoyears('19');


        $upangshoId = $upangsho_id;
        $khats = Khat::where('sister_concern_id',auth()->user()->sister_concern_id)
            ->where('upangsho_id', $upangshoId)->where('khattype', $inOut)->get();


        return view('accounts.income_expenditure.add_incoexpense_multi_edit', compact('economicalYears', 'upangshos', 'bank', 'bankdetails',
            'upangshoId', 'inOut', 'incomeExpenses', 'khatTypes', 'year', 'vourcher',
            'defineTotal', 'selectedUpangsho', 'khats'));

    }

    public function addIncomeExpensePost($id, $inOut, Request $request)
    {
        $request['upangsho_id'] = $id;
        $request['receive_date'] = Carbon::parse($request->receive_date)->format('Y-m-d');
        $request['vourcher_no'] = bnNumberToEn($request->vourcher_no);

        $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
        $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

        //vourcher_no
        if ($request->inout_id == 1) {
            $inVoucherNo = $request->vourcher_no;
            $checkVoucher = Incoexpense::where('year',$request->year)
                ->where('chalan_no',$inVoucherNo)
                ->first();
        } elseif ($request->inout_id == 2) {
            $inVoucherNo = $request->vourcher_no;
            $checkVoucher = Incoexpense::where('year',$request->year)
                ->where('vourcher_no',$inVoucherNo)
                ->first();
        }
        if ($checkVoucher){
            return redirect()->back()->withInput()->with('error','এই চালান/ভাউচার নং ইতিমধ্যেই বিদ্যমান');
        }

        $counter = 0;

        foreach ($request->khat_id as $reqKhattypeId) {
            if ($request->inout_id == 1) {
                $vourcher_no = null;
                $chalan_no = $inVoucherNo;
                $status = 1;
            } else {
                $vourcher_no = $inVoucherNo;
                $chalan_no = null;
                $status = 0;
            }

            if (!empty($request->vat[$counter]) || !empty($request->tax[$counter])) {
                $vat_tax_status = 1;
            } else {
                $vat_tax_status = 1;
            }
            $amount = bnNumberToEn($request->amount[$counter]);
            $uid = $request->userid;

            $incoexpenseid = new Incoexpense;
            $incoexpenseid->user_id = $uid;
            $incoexpenseid->upangsho_id = $request->upangsho_id;
            $incoexpenseid->inout_id = $request->inout_id;
            $incoexpenseid->khattype_id = $request->khattype_id[$counter];
            $incoexpenseid->khtattypetype_id = $request->khtattypetype_id[$counter];
            $incoexpenseid->khat_id = $request->khat_id[$counter];
            $incoexpenseid->taxnontax = $request->txn[$counter];
            $incoexpenseid->khat_des = $request->khat_des[$counter];
            $incoexpenseid->year = $request->year;
            $incoexpenseid->bank_id = $request->bank_id;
            $incoexpenseid->branch_id = $request->branch_id;
            $incoexpenseid->acc_no = $request->acc_no;
            $incoexpenseid->vourcher_no = $vourcher_no;
            $incoexpenseid->status = $status;
            $incoexpenseid->vat_tax_status = $vat_tax_status;
            $incoexpenseid->chalan_no = $chalan_no;
            $incoexpenseid->check_no = bnNumberToEn($request->check_no);
            $incoexpenseid->amount = $amount;
            $incoexpenseid->date = $request->receive_date;
            $incoexpenseid->receiver_name = $request->receiver_name;
            $incoexpenseid->receive_datwe = $request->receive_date;
            $incoexpenseid->note = $request->note;
            $incoexpenseid->save();

            if (!empty($request->jamanot[$counter])) {

                $jamanot = new Incoexpense;
                $jamanot->user_id = $uid;
                $jamanot->upangsho_id = $request->upangsho_id;
                $jamanot->inout_id = $request->inout_id;
                $jamanot->khattype_id = $request->khattype_id[$counter];
                $jamanot->khtattypetype_id = $request->khtattypetype_id[$counter];
                $jamanot->khat_id = $request->khat_id[$counter];
                $jamanot->taxnontax = $request->txn[$counter];
                $jamanot->khat_des = '-ঐ-কাজের জামানত';
                $jamanot->year = $request->year;
                $jamanot->bank_id = $request->bank_id;
                $jamanot->branch_id = $request->branch_id;
                $jamanot->acc_no = $request->acc_no;
                $jamanot->vourcher_no = $vourcher_no;
//                $jamanot->check_no = bnNumberToEn($request->check_no);
                $jamanot->check_no = str_replace($bn, $en, $request->jamanot_check_no[$counter] ?? '');
                $jamanot->chalan_no = $chalan_no;
                $jamanot->amount = bnNumberToEn($request->jamanot[$counter]);
                $jamanot->date = $request->receive_date;
                $jamanot->receiver_name = '১৪০০০৪১১০৭';
                $jamanot->status = $status;
                $jamanot->vat_tax_status = $incoexpenseid->incoexpenses_id;
                $jamanot->receive_datwe = $request->receive_date;
                $jamanot->note = $request->note;
                $jamanot->save();

            }

            if (!empty($request->vat[$counter])) {

                $vat = new Incoexpense;
                $vat->user_id = $uid;
                $vat->upangsho_id = $request->upangsho_id;
                $vat->inout_id = $request->inout_id;
                $vat->khattype_id = $request->khattype_id[$counter];
                $vat->khtattypetype_id = $request->khtattypetype_id[$counter];
                $vat->khat_id = $request->khat_id[$counter];
                $vat->taxnontax = $request->txn[$counter];
                $vat->khat_des = '-ঐ-কাজের মূঃসঃক';
                $vat->year = $request->year;
                $vat->bank_id = $request->bank_id;
                $vat->branch_id = $request->branch_id;
                $vat->acc_no = $request->acc_no;
//                $vat->check_no = bnNumberToEn($request->check_no);
                $vat->check_no = str_replace($bn, $en, $request->vat_check_no[$counter] ?? '');
                $vat->vourcher_no = $vourcher_no;
                $vat->amount = bnNumberToEn($request->vat[$counter]);
                $vat->date = $request->receive_date;
                $vat->receiver_name = '১/১১৩৩/০০৫/০৩১১';
                $vat->status = $status;
                $vat->vat_tax_status = $incoexpenseid->incoexpenses_id;
                $vat->receive_datwe = $request->receive_date;
                $vat->note = $request->note;
                $vat->save();
            }


            if (!empty($request->tax[$counter])) {

                $tax = new Incoexpense;
                $tax->user_id = $uid;
                $tax->upangsho_id = $request->upangsho_id;
                $tax->inout_id = $request->inout_id;
                $tax->khattype_id = $request->khattype_id[$counter];
                $tax->khtattypetype_id = $request->khtattypetype_id[$counter];
                $tax->khat_id = $request->khat_id[$counter];
                $tax->taxnontax = $request->txn[$counter];
                $tax->khat_des = 'ঐ-কাজের আয়কর';
                $tax->year = $request->year;
                $tax->bank_id = $request->bank_id;
                $tax->branch_id = $request->branch_id;
                $tax->acc_no = $request->acc_no;
                $tax->vourcher_no = $vourcher_no;
                $tax->status = $status;
                $tax->vat_tax_status = $incoexpenseid->incoexpenses_id;
                $tax->chalan_no = $chalan_no;
//                $tax->check_no = bnNumberToEn($request->check_no);
                $tax->check_no = str_replace($bn, $en, $request->tax_check_no[$counter] ?? '');
                $tax->amount = bnNumberToEn($request->tax[$counter]);
                $tax->date = $request->receive_date;
                $tax->receiver_name = '১/১১৪১/০০১০/০১১১';
                $tax->receive_datwe = $request->receive_date;
                $tax->note = $request->note;
                $tax->save();
            }

            $counter++;
        }


        return redirect()->back()->with('message', 'আয়/ব্যয় সংযুক্তি সফল হয়েছে');
    }

    public function incomeExpenseEditPost($upangsho_id, $vourcher, $year, $inOut, Request $request)
    {

        $request['upangsho_id'] = $upangsho_id;
        $request['receive_date'] = Carbon::parse($request->receive_date)->format('Y-m-d');
        $request['vourcher_no'] = bnNumberToEn($request->vourcher_no);
        if ($inOut == 1) {
            $incomeExpenses = Incoexpense::where('inout_id', $inOut)
                ->where('upangsho_id', $upangsho_id)
                ->where('year', $year)
                ->where('chalan_no', $vourcher)
                ->get();

        } elseif ($inOut == 2) {
            $incomeExpenses = Incoexpense::where('inout_id', $inOut)
                ->where('upangsho_id', $upangsho_id)
                ->where('year', $year)
                ->where('vourcher_no', $vourcher)
                ->get();
        }

        if ($inOut == 1) {
            Incoexpense::where('inout_id', $inOut)
                ->where('upangsho_id', $upangsho_id)
                ->where('year', $year)
                ->where('chalan_no', $vourcher)
                ->delete();

        } elseif ($inOut == 2) {
            Incoexpense::where('inout_id', $inOut)
                ->where('upangsho_id', $upangsho_id)
                ->where('year', $year)
                ->where('vourcher_no', $vourcher)
                ->delete();
        }

        $counter = 0;
        foreach ($request->khat_id as $reqKhattypeId) {
            if ($request->inout_id == 1) {
                $vourcher_no = null;
                $chalan_no = $request->vourcher_no_edit;
                $status = 1;
            } else {
                $vourcher_no = $request->vourcher_no_edit;
                $chalan_no = null;
                $status = 0;
            }

            if (!empty($request->vat[$counter]) || !empty($request->tax[$counter])) {
                $vat_tax_status = 1;
            } else {
                $vat_tax_status = 1;
            }

            $amount = bnNumberToEn($request->amount[$counter]);
            $uid = $request->userid;

            $incoexpenseid = new Incoexpense;
            $incoexpenseid->user_id = $uid;
            $incoexpenseid->upangsho_id = $request->upangsho_id;
            $incoexpenseid->inout_id = $request->inout_id;
            $incoexpenseid->khattype_id = $request->khattype_id[$counter];
            $incoexpenseid->khtattypetype_id = $request->khtattypetype_id[$counter];
            $incoexpenseid->khat_id = $request->khat_id[$counter];
            $incoexpenseid->taxnontax = $request->txn[$counter];
            $incoexpenseid->khat_des = $request->khat_des[$counter];
            $incoexpenseid->year = $request->year;
            $incoexpenseid->bank_id = $request->bank_id;
            $incoexpenseid->branch_id = $request->branch_id;
            $incoexpenseid->acc_no = $request->acc_no;
            $incoexpenseid->vourcher_no = $vourcher_no;
            $incoexpenseid->status = $status;
            $incoexpenseid->vat_tax_status = $vat_tax_status;
            $incoexpenseid->chalan_no = $chalan_no;
            $incoexpenseid->check_no = bnNumberToEn($request->check_no);
            $incoexpenseid->amount = $amount;
            $incoexpenseid->date = $request->receive_date;
            $incoexpenseid->receiver_name = $request->receiver_name;
            $incoexpenseid->receive_datwe = $request->receive_date;
            $incoexpenseid->note = $request->note;
            $incoexpenseid->save();

            if (!empty($request->jamanot[$counter])) {

                $jamanot = new Incoexpense;
                $jamanot->user_id = $uid;
                $jamanot->upangsho_id = $request->upangsho_id;
                $jamanot->inout_id = $request->inout_id;
                $jamanot->khattype_id = $request->khattype_id[$counter];
                $jamanot->khtattypetype_id = $request->khtattypetype_id[$counter];
                $jamanot->khat_id = $request->khat_id[$counter];
                $jamanot->taxnontax = $request->txn[$counter];
                $jamanot->khat_des = '-ঐ-কাজের জামানত';
                $jamanot->year = $request->year;
                $jamanot->bank_id = $request->bank_id;
                $jamanot->branch_id = $request->branch_id;
                $jamanot->acc_no = $request->acc_no;
                $jamanot->vourcher_no = $vourcher_no;
                $jamanot->check_no = bnNumberToEn($request->check_no);
                $jamanot->chalan_no = $chalan_no;
                $jamanot->amount = bnNumberToEn($request->jamanot[$counter]);
                $jamanot->date = $request->receive_date;
                $jamanot->receiver_name = '১৪০০০৪১১০৭';
                $jamanot->status = $status;
                $jamanot->vat_tax_status = $incoexpenseid->incoexpenses_id;
                $jamanot->receive_datwe = $request->receive_date;
                $jamanot->note = $request->note;
                $jamanot->save();
            }

            if (!empty($request->vat[$counter])) {

                $vat = new Incoexpense;
                $vat->user_id = $uid;
                $vat->upangsho_id = $request->upangsho_id;
                $vat->inout_id = $request->inout_id;
                $vat->khattype_id = $request->khattype_id[$counter];
                $vat->khtattypetype_id = $request->khtattypetype_id[$counter];
                $vat->khat_id = $request->khat_id[$counter];
                $vat->taxnontax = $request->txn[$counter];
                $vat->khat_des = '-ঐ-কাজের মূঃসঃক';
                $vat->year = $request->year;
                $vat->bank_id = $request->bank_id;
                $vat->branch_id = $request->branch_id;
                $vat->acc_no = $request->acc_no;
                $vat->check_no = bnNumberToEn($request->check_no);
                $vat->vourcher_no = $vourcher_no;
                $vat->amount = bnNumberToEn($request->vat[$counter]);
                $vat->date = $request->receive_date;
                $vat->receiver_name = '১/১১৩৩/০০৫/০৩১১';
                $vat->status = $status;
                $vat->vat_tax_status = $incoexpenseid->incoexpenses_id;
                $vat->receive_datwe = $request->receive_date;
                $vat->note = $request->note;
                $vat->save();
            }

            if (!empty($request->tax[$counter])) {

                $tax = new Incoexpense;
                $tax->user_id = $uid;
                $tax->upangsho_id = $request->upangsho_id;
                $tax->inout_id = $request->inout_id;
                $tax->khattype_id = $request->khattype_id[$counter];
                $tax->khtattypetype_id = $request->khtattypetype_id[$counter];
                $tax->khat_id = $request->khat_id[$counter];
                $tax->taxnontax = $request->txn[$counter];
                $tax->khat_des = 'ঐ-কাজের আয়কর';
                $tax->year = $request->year;
                $tax->bank_id = $request->bank_id;
                $tax->branch_id = $request->branch_id;
                $tax->acc_no = $request->acc_no;
                $tax->vourcher_no = $vourcher_no;
                $tax->status = $status;
                $tax->vat_tax_status = $incoexpenseid->incoexpenses_id;
                $tax->chalan_no = $chalan_no;
                $tax->check_no = bnNumberToEn($request->check_no);
                $tax->amount = bnNumberToEn($request->tax[$counter]);
                $tax->date = $request->receive_date;
                $tax->receiver_name = '১/১১৪১/০০১০/০১১১';
                $tax->receive_datwe = $request->receive_date;
                $tax->note = $request->note;
                $tax->save();
            }

            $counter++;
        }

        return redirect()->route('income_expenditure')->with('message', 'আয়/ব্যয় হালনাগাদ সফল হয়েছে');

    }

    public function getVoucherNo(Request $request)
    {

        //vourcher_no
        $checkYearInOrOut = Incoexpense::where('inout_id', $request->inOutId)
            ->where('upangsho_id', $request->upangshoId)
            ->orderBy('incoexpenses_id', 'desc')
            ->where('year', $request->year)->first();


        if ($checkYearInOrOut) {
            if ($checkYearInOrOut->inout_id == 1) {
                $chalan_no = Incoexpense::where('inout_id', $request->inOutId)
                    ->where('upangsho_id', $request->upangshoId)
                    ->orderBy('incoexpenses_id', 'desc')
                    ->where('year', $request->year)->max(DB::raw('CAST(chalan_no AS SIGNED)'));
                $voucherNo = (int)$chalan_no + 1;
            } elseif ($checkYearInOrOut->inout_id == 2) {
                $vourcher_no = Incoexpense::where('inout_id', $request->inOutId)
                    ->where('upangsho_id', $request->upangshoId)
                    ->orderBy('incoexpenses_id', 'desc')
                    ->where('year', $request->year)
                    ->max(DB::raw('CAST(vourcher_no AS SIGNED)'));
                $voucherNo = (int)$vourcher_no + 1;
            }
        } else {

            if ($request->inOutId == 1) {
                $voucherNo = 1;
            } elseif ($request->inOutId == 2) {
                $voucherNo = 1;
            }

        }
        return response()->json($voucherNo);
    }


    public function getBankBranch(Request $request)
    {
        $branches = Branch::where('bank_id', $request->bank_id)
            ->get()->toArray();

        return response()->json($branches);

    }

    public function getBankAccounts(Request $request)
    {


        $bankAccountsIDs = BankDetails::where('upangsho_id', $request->upangshoId)
            ->pluck('bank_details_id')
            ->toArray();

        $accounts = BankDetails::whereIn('bank_details_id', $bankAccountsIDs)
            ->where('branch_id', $request->branch_id)
            ->get()->toArray();

        return response()->json($accounts);

    }
    public function getKhatDetails(Request $request)
    {
        $khat = Khat::where('khat_id', $request->khatId)->first();
        $khat->details = ($khat->taxType->tax_name ?? '');
        if (($khat->taxSubType->tax_name2 ?? false) != 'নাই'){
            $khat->details .= ' - '.($khat->taxSubType->tax_name2 ?? '');
        }
        $khat->details .= ' - '.(($khat->serilas != null ?  $khat->serilas : '')).' '.($khat->khat_name ?? '');

        return response($khat);
    }
}
