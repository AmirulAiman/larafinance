<?php

namespace App\Http\Livewire;

use App\Models\InvoiceDetail;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompanyNewInvoice extends Component
{
    private $invoice;

    public $items = [];
    public $total = 0;
    public $customers = [];

    public $invoice_id;
    public $invoice_title;
    public $invoice_due;
    public $invoice_status;
    public $customer_id;

    public $itemName;
    public $itemAmount = 1;
    public $itemPrice = '0.0';

    protected $rule1 = [
        'itemName' => 'required',
        'itemAmount' => 'required',
        'itemPrice' => 'required'
    ];

    protected $rule2 = [
        'invoice_id' => 'required',
        'customer_id' => 'required',
        'invoice_title' => 'required',
        'invoice_due' => 'required',
        'invoice_status' => 'required',
    ];

    public function mount($invoice)
    {
        $this->items = InvoiceItem::where('invoice_detail_id',$invoice)->get();
        $this->invoice_id = $invoice;

        $this->customers = Auth::user()->company->customers;

        $this->invoice = InvoiceDetail::find($invoice);
        $this->customer_id = $this->invoice->customer_id;
        $this->invoice_title = $this->invoice->invoice_title;
        $this->invoice_due = $this->invoice->invoice_due;
        $this->invoice_status = $this->invoice->invoice_status;

        foreach($this->items as $item)
        {
            $this->total += ($item->invoice_item_amount * $item->invoice_item_price);
        }
    }

    protected function clearItemForm()
    {
        $this->itemName = '';
        $this->itemPrice = '0.0';
        $this->itemAmount = 1;
    }

    public function render()
    {
        $this->items = InvoiceItem::where('invoice_detail_id',$this->invoice_id)->get();
        return view('livewire.company-new-invoice');
    }

    public function addItem()
    {
//        dd($this->invoice_id);
        $this->validate($this->rule1);
        $this->total += ($this->itemAmount * floatval($this->itemPrice));
        InvoiceItem::create([
            'invoice_detail_id' => $this->invoice_id,
            'invoice_item' => $this->itemName,
            'invoice_item_price' => $this->itemPrice,
            'invoice_item_amount' => $this->itemAmount
        ]);
        $this->clearItemForm();
        $this->render();
    }

    public function removeItem(InvoiceItem $item)
    {
        $this->total -= (floatval($item->invoice_item_price) * $item->invoice_item_amount);
        $item->delete();
        $this->render();
    }

    public function updateInvoice()
    {
        $this->validate($this->rule2);
        $invoice = InvoiceDetail::find($this->invoice_id);
        $invoice->customer_id = $this->customer_id;
        $invoice->invoice_title = $this->invoice_title;
        $invoice->invoice_due = $this->invoice_due;
        $invoice->invoice_status = $this->invoice_status;
        $invoice->invoice_total = $this->total;
        $invoice->save();
        return redirect()->route('company.invoice');
    }


}
