<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Sparepart;
use App\Models\Category;
use Alert;
use App\Models\DetailService;
use Illuminate\Support\Facades\Auth;
use App\Models\JenisService;

class InvoiceController extends Controller
{
    public function detail($id)
    {
    	$booking = Service::where('id', $id)->where('status','Service complete')->first();
        $bookings = Service::where('id', $booking->id)->get();
        $jenisServices = JenisService::all();
 		$service_details = [];
        if(!empty($booking))
        {
            $service_details = DetailService::where('service_id', $booking->id)->get();

        }
     	return view('admin.invoice', compact('booking', 'bookings', 'jenisServices', 'service_details'));
    }

    public function render()
    {
        $spareparts =  DB::table('spareparts')
        ->join('categories', 'spareparts.category_id', '=', 'categories.id')
        ->select('categories.name', 'spareparts.nameS', 'spareparts.price', 'spareparts.stock', 'spareparts.id')
        ->get();
        $category = Category::all();
		
        return view('admin.addSparepart',compact('spareparts', 'category'));
       
    }

    public function order(Request $request, $id)
    {	
        $sparepart = Sparepart::where('id', $id)->first();

    	//jika melebihi stok
    	if($request->total_sparepart > $sparepart->stock)
    	{
    		return redirect('/addSaprepart');
        } 

    	//cek validasi
        $check_service = Service::where('status', 'Service complete')->first();
    	//menyimpang ke database Service
    	if(empty($check_service))
    	{
	    	$check_service->total_price = 0;
	    	$check_service->update();
    	}
    	

    	//simpan ke databaseServicedetail
    	$new_service = Service::where('status', 'Service complete')->first();

    	//cek Servicedetail
        $check_service_detail = DetailService::where('sparepart_id', $sparepart->id)->where('service_id', $new_service->id)->first();
    	if(empty($check_service_detail))
    	{
    		$service_detail = new DetailService();
	    	$service_detail->service_id = $new_service->id;
            $service_detail->sparepart_id = $sparepart->id;
            $service_detail->sparepartName = $sparepart->nameS;
            $service_detail->total_sparepart = $request->total_sparepart;
            $service_detail->price = $sparepart->price;
            $service_detail->total_price = $sparepart->price*$request->total_sparepart;
	    	$service_detail->save();
			
    	}else 
    	{
    		$service_detail = DetailService::where('sparepart_id', $sparepart->id)->where('service_id', $new_service->id)->first();

    		$service_detail->total_sparepart = $service_detail->total_sparepart+$request->total_sparepart;

    		//harga sekarang
    		$newPrice_service_detail = $sparepart->price*$request->total_sparepart;
	    	$service_detail->total_price = $service_detail->total_price+$newPrice_service_detail;
	    	$service_detail->update();
    	}

    	//jumlah total
		$service = Service::where('status','Service complete')->first();
    	$service->total_price = $service->total_price+$sparepart->price*$request->total_sparepart;
        $service->update();
		alert()->success('Adding sparepart successfully entered the invoice', 'Success');
    	return redirect('bookingdata/invoice/' . $new_service->id);

	}

	public function delete($id)
    {
        $service_detail = DetailService::where('id', $id)->first();

        $service =Service::where('id',  $service_detail->service_id)->first();
        $service->total_price =  $service->total_price- $service_detail->total_price;
        $service->update();


        $service_detail->delete();

        alert()->error('Your sparepart has been successfully deleted', 'Deleted');
        return redirect('bookingdata/invoice/' . $service->id);
    }

	public function konfirmasi(Request $request, $id)
    {
		$jenisServices = JenisService::where('id', $request->id_jenisService)->first();

        $service = Service::where('id', $id)->where('status','Service complete')->first();
		$service_id =  $service->id;
		$service->jenisService_id  = $request->id_jenisService;
        $service->status = 'Waiting for payment';
		$service->tindakan = $request->tindakan;
        $service->total_price = $service->total_price + $jenisServices->price;
		$service->jenis_service = $jenisServices->name;
        $service->priceService = $jenisServices->price;
        $service->update();

        $service_details = DetailService::where('service_id',  $service_id)->get();
        foreach ($service_details as $service_detail) {
            $sparepart = Sparepart::where('id', $service_detail->sparepart_id)->first();
            $sparepart->stock = $sparepart->stock-$service_detail->total_sparepart;
            $sparepart->update();
        }

        alert()->success('Invoice Successful completed. Please, tell the customer to pay!', 'Success');
        return redirect('bookingdata');

    }

    public function invoice($id)
    {
    	$booking = Service::where('id', $id)->first();
        $bookings = Service::where('id', $booking->id)->get();
        $jenisServices = JenisService::all();
 		$service_details = [];
        if(!empty($booking))
        {
            $service_details = DetailService::where('service_id', $booking->id)->get();

        }
     	return view('admin.invoiceDone', compact('bookings', 'booking', 'jenisServices', 'service_details'));
    }

}
