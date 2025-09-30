<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDentalCardRequest;
use App\Models\DentalCard;
use App\Models\HealthCard;

class DentalCardController extends Controller
{
    public function create()
    {
        $healthCards = HealthCard::all();
        return view('dental-card.create', compact('healthCards'));
    }

    public function store(StoreDentalCardRequest $request)
    {
        $data = $request->validated();

        $healthCard = HealthCard::findOrFail( $data['health_card_id'] );
        $healthCard->dentalCard()->updateOrCreate([], $data);

        return redirect()->back()->with('success','Dental info saved.');
    }
}
