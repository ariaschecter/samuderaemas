<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Images;

class PaymentMethodController extends Controller
{
    public function index() {
        $payment_methods = PaymentMethod::orderBy('payment_method', 'ASC')->get();
        $title = 'All Payment Method';
        return view('admin.payment_method.index', compact('payment_methods', 'title'));
    }

    public function create() {
        $title = 'Add Payment Method';
        return view('admin.payment_method.create', compact('title'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'payment_method' => 'required|image|file|max:5120',
            'payment_name' => 'required',
            'payment_rekening' => 'required'
        ]);

        $image = $request->file('payment_method');
        $name_gen = time() . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'image/' . $name_gen;
        Images::make($image)->save($save_url);
        $validated['payment_method'] = $save_url;

        PaymentMethod::create($validated);

        $notification = [
            'message' => 'Payment Method Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.payment_method.index')->with($notification);
    }

    public function edit(PaymentMethod $payment_method) {
        $title = 'Edit Payment Method';
        return view('admin.payment_method.edit', compact('payment_method', 'title'));
    }

    public function update(Request $request, PaymentMethod $payment_method) {
        $validated = $request->validate([
            'payment_method' => 'image|file|max:5120',
            'payment_name' => 'required',
            'payment_rekening' => 'required'
        ]);

        if ($request->payment_method) {
            Storage::delete($payment_method->payment_method);
            $image = $request->file('payment_method');
            $name_gen = time() . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'image/' . $name_gen;
            Images::make($image)->save($save_url);
            $validated['payment_method'] = $save_url;
        } else {
            $validated['payment_method'] = $payment_method->payment_method;
        }

        $payment_method->update($validated);

        $notification = [
            'message' => 'Payment Method Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.payment_method.index')->with($notification);
    }

    public function destroy(PaymentMethod $payment_method) {
        Storage::delete($payment_method->payment_method);
        $payment_method->delete();

        $notification = [
            'message' => 'Payment Method Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
