 <div class="card mb-4">
                <div class="card-header fw-bold">
                    <a class="d-flex justify-content-between text-decoration-none text-dark" data-bs-toggle="collapse"
                        href="#presentHealth" aria-expanded="false" aria-controls="presentHealth">
                        <span>Present Health Status</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                </div>
                <div id="presentHealth" class="collapse">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="present_health_status_cough" class="form-label">Cough</label>
                            <select id="present_health_status_cough" name="present_health_status_cough"
                                class="form-select">
                                <option value="">-- Select --</option>
                                <option value="2wks">2 weeks</option>
                                <option value="1_month">1 month</option>
                                <option value="longer">Longer</option>
                            </select>
                        </div>
                        @foreach ([['present_health_status_dizziness', 'Dizziness'], ['present_health_status_dyspnea', 'Dyspnea'], ['present_health_status_chest_back_pain', 'Chest/Back Pain'], ['present_health_status_easy_fatigability', 'Easy Fatigability'], ['present_health_status_joint_extremity_pains', 'Joint/Extremity Pains'], ['present_health_status_blurring_of_vision', 'Blurring of Vision'], ['present_health_status_wearing_eyeglasses', 'Wearing Eyeglasses'], ['present_health_status_vaginal_discharge_bleeding', 'Vaginal Discharge/Bleeding'], ['present_health_status_lumps', 'Lumps'], ['present_health_status_painful_urination', 'Painful Urination'], ['present_health_status_poor_loss_of_hearing', 'Poor/Loss of Hearing'], ['present_health_status_syncope_fainting', 'Syncope/Fainting'], ['present_health_status_convulsions', 'Convulsions'], ['present_health_status_malaria', 'Malaria'], ['present_health_status_goiter', 'Goiter'], ['present_health_status_anemia', 'Anemia']] as [$field, $label])
                            <div class="mb-3">
                                <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                <select id="{{ $field }}" name="{{ $field }}" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                        @endforeach
                        <div class="mb-3">
                            <label for="present_health_status_dental_status" class="form-label">Dental Status</label>
                            <input type="text" name="present_health_status_dental_status"
                                id="present_health_status_dental_status" class="form-control" maxlength="500">
                        </div>
                        <div class="mb-3">
                            <label for="present_health_status_present_medications_taken" class="form-label">Present
                                Medications Taken</label>
                            <input type="text" name="present_health_status_present_medications_taken"
                                id="present_health_status_present_medications_taken" class="form-control"
                                maxlength="500">
                        </div>
                        <div class="mb-3">
                            <label for="present_health_status_others" class="form-label">Others</label>
                            <input type="text" name="present_health_status_others" id="present_health_status_others"
                                class="form-control" maxlength="500">
                        </div>
                    </div>
                </div>
            </div>
