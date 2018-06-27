<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Product;
use App\Slide;
use App\Providers;
use App\ProductType;
use App\Cart;
use App\User;
use App\UsersModel;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\HttpCache\Ssi;
use Auth;

class PageController extends Controller
{
    public function getIn()
    {
        $slide = Slide::all();
        $new_product = Product::where('new', '=', 1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->get();
        return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }

    public function getLoaiSP($id)
    {
        $sp_theoloai = Product::where('id_type', $id)->paginate(6);
        $sp_khac = Product::where('id_type', '<>', $id)->paginate(6);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id', '=', $id)->first();
        return view('page.loai_sanpham', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
    }

    public function getChitietSP($id)
    {
        $sanpham = Product::where('id', '=', $id)->first();
        $sanpham_tuongtu = Product::where('id_type', $sanpham->id_type)->paginate(6);
        return view('page.chitiet_sanpham', compact('sanpham', 'sanpham_tuongtu'));
    }

    public function getLienHe()
    {
        return view('page.lienhe');
    }

    public function getGioithieu()
    {
        return view('page.gioithieu');
    }

    public function getAddtocart(Request $req, $id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDelItemcart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout()
    {
        return view('page.dat_hang');
    }
    public function soluongton($id)
    {
        $data_pr = Product::where('id',$id)
            ->first();

        $data_bill_count = BillDetail::where('id_product', $id)
            ->sum('quantity');
        $data_pr->soluong -= $data_bill_count;
        $data_pr->save();
    }

    public function postCheckout(Request $req)
    {
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->quantity = $req->quantity;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price'] / $value['qty']);
            $bill_detail->save();
            $this->soluongton($key);
        }
        Session::forget('cart');
        
        return redirect()->back()->with('message', 'Bạn đã đặt hàng thành công chúng tôi sẽ liên hệ bạn sao !');
    }

    public function getLogin()
    {
        return view('page.dangnhap');
    }

    public function postLogin(Request $req)
    {
        $this->validate($req,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => 'Vui lòng nhập vào email',
                'email.email' => 'Không đúng định dạng email',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.max' => 'Mật khẩu không quá 20 kí tự',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự'
            ]
        );
        $credentials = array('email' => $req->email, 'password' => $req->password);
        if (Auth::attempt($credentials)) {
            return redirect('index');
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công']);
        }
    }

    public function getSignin()
    {
        return view('page.dangky');
    }

    public function postSignin(Request $req)
    {
        $this->validate($req,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'fullname' => 'required',
                're_password' => 'required|same:password'
            ],
            [
                'email.required' => 'Vui lòng nhập vào email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã có người sử dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                're_password.same' => 'Mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự'
            ]
        );
        $user = new User();
        $user->id = md5(time());
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);  //ma hoa password
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('message', 'Tạo tài khoản thành công !');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('trangchu');
    }

    public function getSearch(Request $req)
    {
        //kiem theo ten va theo gia
        $product = Product::where('name', 'like', '%' . $req->keySearch . '%')
            ->orwhere('unit_price', $req->keySearch)
            ->get();
        return view('page.timkiem', compact('product'));

    }
}