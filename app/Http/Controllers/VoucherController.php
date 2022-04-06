<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\Console\Input\Input;

class VoucherController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
        $vouchers = Voucher::all();

        return view('vouchers.show_vouchers')->with('vouchers', $vouchers);
    }

    public function save()
    {
        $req = request()->all();
        $voucher = new Voucher();

        //dd($req);

        $voucher->id_user = $req['userId'];
        $voucher->discount = $req['discount'];
        $voucher->save();

        return redirect('/llista-vouchers');
    }

    public function edit(Voucher $voucher)
    {
        //dd($voucher);
        return view('vouchers.edit_voucher')->with(['voucher' => $voucher]);
    }

    public function update(Request $req, Voucher $voucher)
    {
        $data = $req->all();

        $voucher->id_user = $data['userId'];
        $voucher->discount = $data['discount'];
        $voucher->save();

        return redirect('/llista-vouchers');
    }

    public function destroy($voucherId)
    {
        $voucher = Voucher::find($voucherId);
        $voucher->delete();
        return redirect('/llista-vouchers');
    }
}
