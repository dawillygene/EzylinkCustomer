<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        // Personal Details
        'first_name',
        'last_name',
        'contact_number',
        'phone_number',
        'email',
        'birth_of_date',
        'city',
        'country',
        'zip_code',
        'description',
        
        // Company Details
        'company_name',
        'company_type',
        'pan_card_number',
        'fax_number',
        'website',
        'number',
        'company_logo',
        
        // Bank Details
        'bank_name',
        'branch',
        'account_holder_name',
        'account_number',
        'ifsc_code'
    ];
}
