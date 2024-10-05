<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use PhpParser\Node\Stmt\Return_;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Http\Controllers\Web\OrderController;
class PaymentController extends Controller
{
    private $paypalGateway;

    public function __construct()
    {
        // إعداد بوابة PayPal
        $this->paypalGateway = Omnipay::create('PayPal_Rest');
        $this->paypalGateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->paypalGateway->setSecret(env('PAYPAL_SECRET'));
        $this->paypalGateway->setTestMode(env('PAYPAL_MODE') === 'sandbox');
    }

    // عرض صفحة الدفع
    public function showPaymentForm($lang)
    {
        return view('payment');
    }

    // معالجة الدفع بناءً على طريقة الدفع المختارة
    public function processPayment(Request $request)
    {
        $paymentMethod = $request->input('payment_method');
       

        switch ($paymentMethod) {
            case 'paypal':
                return $this->processPayPalPayment($request);
            case 'credit_card':
                return $this->processStripePayment($request);
            case 'bank_transfer':
                return $this->processBankTransfer($request);
            default:
                return back()->with('error', 'Invalid payment method selected');
        }
    }

    // معالجة الدفع بواسطة PayPal
    private function processPayPalPayment(Request $request)
    {
        try {
            $response = $this->paypalGateway->purchase([
                'amount' => $request->amount,
                'currency' => 'USD',
                'returnUrl' => route('paypal.success'),
                'cancelUrl' => route('paypal.cancel'),
            ])->send();

            if ($response->isRedirect()) {
                return redirect($response->getRedirectUrl()) ;
            } else {
                return back()->with('error', $response->getMessage());
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // معالجة الدفع بواسطة بطاقة الائتمان (Stripe)
    private function processStripePayment(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $intent = PaymentIntent::create([
                'amount' => $request->amount * 100, // تحويل الدولار إلى سنتات
                'currency' => 'usd',
                'payment_method' => $request->payment_method_id,
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

            return response()->json(['success' => true, 'paymentIntent' => $intent]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    // معالجة التحويل البنكي المباشر
    private function processBankTransfer(Request $request)
    {
        // يمكنك هنا إضافة منطق خاص لمعالجة التحويل البنكي اليدوي
        // مثل إرسال تعليمات الدفع للعميل عبر البريد الإلكتروني أو عرضها على الشاشة
       $orderctrlr=new  OrderController();
       $formdata = $request->all();
  if(isset($formdata['pack']))
{
    $packageid=$request->input('pack');
$package=Package::find($packageid);

$order_id=$orderctrlr->add_order(auth()->guard('client')->user()->id,$packageid,'bank_transfer',$package->price);
return back()->with('success', 'Please follow the instructions to complete the bank transfer.');
}else{
    return back()->with('error', ' الباقة غير موجودة'); 
}
      
    }

    // معالجات PayPal
    public function paypalSuccess(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            try {
                $response = $this->paypalGateway->completePurchase([
                    'payer_id' => $request->input('PayerID'),
                    'transactionReference' => $request->input('paymentId'),
                ])->send();

              //  $response = $transaction->();

                if ($response->isSuccessful()) {
                    $data = $response->getData();
                    return redirect()->route('payment.success' )->with('success', 'Payment successful! Transaction ID: ' . $data['id']);
                } else {
                    return redirect()->route('payment.cancel')->with('error', $response->getMessage());
                }
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }

        return redirect()->route('payment.cancel')->with('error', 'Payment failed.');
    }

    public function paypalCancel()
    {
        return redirect()->route('payment.form','ar')->with('error', 'Payment canceled.');
    }
}
