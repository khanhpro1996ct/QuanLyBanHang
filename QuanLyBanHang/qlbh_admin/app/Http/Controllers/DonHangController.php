<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customerModel;
use App\BillsModel;
use App\billDetailModel;

class DonHangController extends Controller
{


    public function data()
    {
        $data = customerModel::leftjoin('bills', 'customer.id', '=', 'bills.id_customer')
            ->where('bills.status', '=', '0')
            ->select([
                'customer.id as id_customer',
                'customer.name as name_customer',
                'customer.gender as gender_customer',
                'customer.email as email_customer',
                'customer.address as address_customer',
                'customer.phone_number as phone_customer',
                'customer.note as note_customer',
                'bills.date_order as date_bills',
                'bills.status as status_bills',
                'bills.total as total_bills',
                'bills.payment as payment_bills',
            ])->get();
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['stt'] = $i + 1;
        }
        return $data;
    }

    public function index()
    {
        $data = $this->data();
        return view('bill.index', compact('data'));
    }

    public function show($id)
    {

        $data = BillsModel::leftjoin('bill_detail', 'bills.id', '=', 'bill_detail.id_bill')
            ->leftjoin('products', 'bill_detail.id_product', 'products.id')
            ->where('bills.id_customer', $id)
            ->get();
        $khach = customerModel::find($id);
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['stt'] = $i + 1;
        }
        return view('bill.chitiet', compact('data', 'khach'));
    }

    public function delete($id)
    {
        customerModel::find($id)->delete();
        BillsModel::where('id_customer', $id)->delete();
        billDetailModel::where('id_bill', $id)->delete();
        return redirect('/don-hang/index');
    }

    public function destroy($id)
    {
        customerModel::find($id)->delete();
        BillsModel::where('id_customer', $id)->delete();
        billDetailModel::where('id_bill', $id)->delete();
        return redirect('/don-hang/donhang');
    }


    public function danhsachduyetdonhang()
    {
        $data = customerModel::leftjoin('bills', 'customer.id', '=', 'bills.id_customer')
            ->where('bills.status', '=', '1')
            ->select([
                'customer.id as id_customer',
                'customer.name as name_customer',
                'customer.gender as gender_customer',
                'customer.email as email_customer',
                'customer.address as address_customer',
                'customer.phone_number as phone_customer',
                'customer.note as note_customer',
                'bills.date_order as date_bills',
                'bills.status as status_bills',
                'bills.total as total_bills',
                'bills.payment as payment_bills',
            ])->get();
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['stt'] = $i + 1;
        }
        return view('bill.donhang', compact('data'));
    }

    public function duyetdh($id)
    {
        $data = BillsModel::where('id_customer',$id)
        ->first();
        $data->status = 1;
        $data->save();
        return redirect('/don-hang/donhang');
    }


}
