<?php

namespace App\Http\Controllers;

use App\Models\CTR;
use App\Models\HealthCard;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHealthCardRequest;


class HealthCardController extends Controller
{

    public function store(StoreHealthCardRequest $request)
    {
        // All data is already validated in StoreHealthCardRequest
        $data = $request->validated();

        // Parent Table
        $healthCard = HealthCard::create(Arr::only($data, [
        'date','name','date_of_birth','age','gender','civil_status',
        ]));

        $healthCard->professionalInformation()->create(Arr::only($data, [
        'school_district_division','position_designation','first_year_in_service','years_in_service',
        ]));

        $healthCard->familyHistory()->create(Arr::only($data, [
        'family_history_hypertension','family_history_hypertension_relationship',
        'family_history_cardiovascular_disease','family_history_cardiovascular_disease_relationship',
        'family_history_diabetes_mellitus','family_history_diabetes_mellitus_relationship',
        'family_history_kidney_disease','family_history_kidney_disease_relationship',
        'family_history_cancer','family_history_cancer_relationship',
        'family_history_asthma','family_history_asthma_relationship',
        'family_history_allergy','family_history_allergy_relationship',
        'other_remarks',
        ]));

        $healthCard->pastMedicalHistory()->create(Arr::only($data, [
        'past_medical_history_hypertension','past_medical_history_asthma',
        'past_medical_history_diabetes_mellitus' ,'past_medical_history_cardiovascular_disease',
        'has_allergy' , 'past_medical_history_allergy' , 'past_medical_history_tuberculosis' ,
        'had_surgery' , 'past_medical_history_surgery' , 'yellowish_discoloration_of_skin_selera' ,
        'had_been_hospitalized' , 'past_medical_history_hospitalization', 'past_medical_history_others' ,
        ]));

        $healthCard->lastTaken()->create(Arr::only($data, [
        'last_taken_cxr_sputum_date', 'last_taken_cxr_sputum_result',
        'last_taken_ecg_date', 'last_taken_ecg_result',
        'last_taken_urinalysis_date', 'last_taken_urinalysis_result',
        'last_taken_drug_test_date', 'last_taken_drug_test_result',
        'last_taken_neuro_exam_date', 'last_taken_neuro_exam_result',
        'last_taken_bloodtyping_date',  'last_taken_bloodtyping_result',
        'last_taken_others',
        ]));

        $healthCard->socialHistory()->create(Arr::only($data, [
        'smoking', 'smoking_age_started', 'smoking_sticks_pack_per_day', 'smoking_pack_per_year',
        'alcohol', 'alcohol_how_often', 'food_preference',
        ]));

        $healthCard->obgynHistory()->create(Arr::only($data, [
        'menarche', 'cycle', 'duration', 'ob_gyn_parity',
        'papsmear_done', 'papsmear_date', 'self_breast_exam_done', 'mass_noted', 'mass_location',
        ]));

        $healthCard->malePersonnel()->create(Arr::only($data, [
        'digital_rectal_exam_done', 'digital_rectal_exam_date', 'digital_rectal_exam_result',
        ]));

        $healthCard->presentHealthStatus()->create(Arr::only($data, [
        'present_health_status_cough', 'present_health_status_dizziness' , 'present_health_status_dyspnea' ,
        'present_health_status_chest_back_pain', 'present_health_status_easy_fatigability',
        'present_health_status_joint_extremity_pains', 'present_health_status_blurring_of_vision',
        'present_health_status_wearing_eyeglasses', 'present_health_status_vaginal_discharge_bleeding',
        'present_health_status_dental_status', 'present_health_status_present_medications_taken',
        'present_health_status_lumps', 'present_health_status_painful_urination', 'present_health_status_poor_loss_of_hearing',
        'present_health_status_syncope_fainting', 'present_health_status_convulsions', 'present_health_status_malaria',
        'present_health_status_goiter', 'present_health_status_anemia', 'present_health_status_others',
        ]));

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
    try {
        $validatedData = $request->validate([
            'health_card_id' => 'required|exists:health_cards,id',
            'consultation_date' => 'required|date',
            'symptoms' => 'required|string',
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
        ]);

        CTR::create($validatedData);

        return redirect()->back()->with('success', 'CTR saved successfully!');

    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()
                        ->withErrors($e->validator)
                        ->withInput();
    } catch (\Exception $e) {
        return redirect()->back()
                        ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                        ->withInput();
    }
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

    $healthCards = HealthCard::with([
        'professionalInformation',
        'familyHistory',
        'pastMedicalHistory',
        'lastTaken',
        'socialHistory',
        'obgynHistory',
        'malePersonnel',
        'presentHealthStatus',
    ])
    ->when($search, function ($query, $search) {
        $query->where('name', 'like', "%{$search}%");
    })->paginate(15);

    return view('records.cards', compact('healthCards', 'search'));
}


}
