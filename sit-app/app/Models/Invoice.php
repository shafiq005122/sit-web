<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Invoice extends Model
{
    protected $fillable = ["invoice_number", "booking_id", "billable_type", "billable_id", "currency", "gross_amount", "tax_amount", "discount_amount", "paid_amount", "outstanding_amount", "payment_due_date", "status"];

    
    public function booking() { return $this->belongsTo(Booking::class); }
    public function items() { return $this->hasMany(InvoiceItem::class); }
    public function payments() { return $this->hasMany(Payment::class); }
}
