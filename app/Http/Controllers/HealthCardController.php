<?php

namespace App\Http\Controllers;

use App\Models\CTR;
use App\Models\HealthCard;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHealthCardRequest;


class HealthCardController extends Controller
{

    public function store(StoreHealthCardRequest $request)
    {
        // All data is already validated in StoreHealthCardRequest
        $healthInformation = $request->validated();

        //save to db
        HealthCard::create($healthInformation);

        return back()->with('success', 'Health card saved.');
    }
    public function create()
    {
        return view('health-card.create');
    }

    public function ctr()
    {
        return view('health-card.ctr');
    }

    public function ctrstore(Request $request)
{
    $request->validate([
        'health_card_id' => 'required|exists:health_cards,id',
        'consultation_date' => 'required|date',
        'symptoms' => 'required|string',
        'diagnosis' => 'required|string',
        'treatment' => 'required|string',
    ]);

    CTR::create($request->all());

    return redirect()->back()->with('success', 'CTR saved successfully!');
}


    public function search(Request $request)
{
    $q = $request->q;
    $results = HealthCard::where('name', 'like', "%{$q}%")
                         ->limit(20)
                         ->get(['id', 'name']);
    return response()->json($results);
}

    public function showCtrs(Request $request)
    {
    $query = CTR::with('healthCard');

    // If a name is typed, filter by the related healthCard name
    if ($search = $request->q) {
        $query->whereHas('healthCard', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });
    }

    $ctrs = $query->latest()->paginate(15)->withQueryString();
    // withQueryString() keeps ?q=... on pagination links

    return view('records.records', compact('ctrs'));
}


public function edit(HealthCard $healthCard)
{
    return view('health-card.edit', compact('healthCard'));
}

public function update(StoreHealthCardRequest $request, HealthCard $healthCard)
{
    $validatedData = $request->validated();

    $filtered = array_filter($validatedData, function ($value) {
        return $value !== null && $value !== '';
    });

    $healthCard->update($filtered);

    return redirect()->route('health-cards.index')->with('success', 'Health card updated successfully.');
}

public function index(Request $request)
{
    $search = $request->q;

    $healthCards = HealthCard::when($search, function ($query, $search) {
        $query->where('name', 'like', "%{$search}%");
    })->paginate(15);

    return view('records.cards', compact('healthCards', 'search'));
}


}
