<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChiefComplaint;
use App\Models\Treatment;
use App\Models\Recommendation;
use App\Models\Finding;

class SettingsController extends Controller
{
    // Show predefined items management page
    public function showPredefinedItems()
    {
        return view('settings.predefined-items', [
            'complaints' => ChiefComplaint::all(),
            'treatments' => Treatment::all(),
            'recommendations' => Recommendation::all(),
            'findings' => Finding::all(),
        ]);
    }

    // Chief Complaints
    public function addComplaint(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:chief_complaints,name'
        ]);

        ChiefComplaint::create([
            'name' => $request->name
        ]);

        return redirect()->route('settings.predefined-items')
            ->with('success', 'Chief complaint added successfully!');
    }

    public function deleteComplaint($id)
    {
        $complaint = ChiefComplaint::findOrFail($id);
        $complaint->delete();

        return redirect()->route('settings.predefined-items')
            ->with('success', 'Chief complaint deleted successfully!');
    }

    // Treatments
    public function addTreatment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:treatments,name'
        ]);

        Treatment::create([
            'name' => $request->name
        ]);

        return redirect()->route('settings.predefined-items')
            ->with('success', 'Treatment added successfully!');
    }

    public function deleteTreatment($id)
    {
        $treatment = Treatment::findOrFail($id);
        $treatment->delete();

        return redirect()->route('settings.predefined-items')
            ->with('success', 'Treatment deleted successfully!');
    }

    // Recommendations
    public function addRecommendation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:recommendations,name'
        ]);

        Recommendation::create([
            'name' => $request->name
        ]);

        return redirect()->route('settings.predefined-items')
            ->with('success', 'Recommendation added successfully!');
    }

    public function deleteRecommendation($id)
    {
        $recommendation = Recommendation::findOrFail($id);
        $recommendation->delete();

        return redirect()->route('settings.predefined-items')
            ->with('success', 'Recommendation deleted successfully!');
    }

    // Findings
    public function addFinding(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:findings,name'
        ]);

        Finding::create([
            'name' => $request->name
        ]);

        return redirect()->route('settings.predefined-items')
            ->with('success', 'Finding added successfully!');
    }

    public function deleteFinding($id)
    {
        $finding = Finding::findOrFail($id);
        $finding->delete();

        return redirect()->route('settings.predefined-items')
            ->with('success', 'Finding deleted successfully!');
    }
}
