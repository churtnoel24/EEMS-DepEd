<div class="card mb-4">
                <div class="card-header fw-bold">
                    <a class="d-flex justify-content-between text-decoration-none text-dark" data-bs-toggle="collapse"
                        href="#pastMedical" aria-expanded="false" aria-controls="pastMedical">
                        <span>Past Medical History</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                </div>
                <div id="pastMedical" class="collapse">
                    <div class="card-body">
                        @foreach ([['past_medical_history_hypertension', 'Hypertension'], ['past_medical_history_asthma', 'Asthma'], ['past_medical_history_diabetes_mellitus', 'Diabetes Mellitus'], ['past_medical_history_cardiovascular_disease', 'Cardiovascular Disease'], ['past_medical_history_tuberculosis', 'Tuberculosis'], ['yellowish_discoloration_of_skin_selera', 'Yellowish Discoloration of Skin/Sclera']] as [$field, $label])
                            <div class="mb-2">
                                <label class="form-label">{{ $label }}</label>
                                <select name="{{ $field }}" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                        @endforeach

                        <div class="row g-3 mb-2">
                            <div class="col-md-3">
                                <label class="form-label">Has Allergy?</label>
                                <select name="has_allergy" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">If Yes, specify</label>
                                <input type="text" name="past_medical_history_allergy" class="form-control"
                                    maxlength="255">
                            </div>
                        </div>

                        <div class="row g-3 mb-2">
                        <div class="col-md-3">
                        <label class="form-label">Had Surgery?</label>
                        <select name="had_surgery" class="form-select" required>
                            <option value="">-- Select --</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                        </select>
                        </div>
                        <div class="col-md-6">
                        <label class="form-label"> If Yes, specify</label>
                        <input type="text" name="past_medical_history_surgery" class="form-control" maxlength="255">
                        </div>
                        </div>

                        <div class="row g-3 mb-2">
                        <div class="col-md-3">
                        <label class="form-label">Had been hospitalized?</label>
                        <select name="had_been_hospitalized" class="form-select" required>
                            <option value="">-- Select --</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                        </select>
                        </div>
                        <div class="col-md-6">
                        <label class="form-label">Reason for Hospitalization</label>
                        <input type="text" name="past_medical_history_hospitalization" class="form-control" maxlength="255">
                        </div>
                        </div>

                        <div class="row g-3 mb-2">
                            <div class="col-md-6">
                                <label class="form-label">Others, please specify.</label>
                                <input type="text" name="past_medical_history_others" class="form-control"
                                    maxlength="255">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
