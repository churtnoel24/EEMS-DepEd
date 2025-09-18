<div class="card mb-4">
                <div class="card-header fw-bold">
                    <a class="d-flex justify-content-between text-decoration-none text-dark" data-bs-toggle="collapse"
                        href="#familyHistory" aria-expanded="false" aria-controls="familyHistory">
                        <span>Family History</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                </div>
                <div id="familyHistory" class="collapse">
                    <div class="card-body">
                        @foreach ([['family_history_hypertension', 'Hypertension'], ['family_history_cardiovascular_disease', 'Cardiovascular Disease'], ['family_history_diabetes_mellitus', 'Diabetes Mellitus'], ['family_history_kidney_disease', 'Kidney Disease'], ['family_history_cancer', 'Cancer'], ['family_history_asthma', 'Asthma'], ['family_history_allergy', 'Allergy']] as [$field, $label])
                            <div class="row g-3 mb-2">
                                <div class="col-md-3">
                                    <label class="form-label mb-0">{{ $label }}</label>
                                    <select name="{{ $field }}" class="form-select">
                                        <option value="">-- Select --</option>
                                        <option value="Y">Yes</option>
                                        <option value="N">No</option>
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <label class="form-label mb-0 small">Relationship (if Yes)</label>
                                    <input type="text" name="{{ $field }}_relationship" class="form-control"
                                        maxlength="255">
                                </div>
                            </div>
                        @endforeach
                        <label class="form-label">Other Remarks</label>
                        <input type="text" name="other_remarks" class="form-control" maxlength="500">
                    </div>
                </div>
            </div>
