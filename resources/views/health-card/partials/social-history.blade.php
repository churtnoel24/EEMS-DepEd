<div class="card mb-4">
                <div class="card-header fw-bold">
                    <a class="d-flex justify-content-between text-decoration-none text-dark" data-bs-toggle="collapse"
                        href="#socialHistory" aria-expanded="false" aria-controls="socialHistory">
                        <span>Social History</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                </div>
                <div id="socialHistory" class="collapse">
                    <div class="card-body">
                        <!-- ...social history fields... -->
                        <div class="mb-3">
                            <label for="smoking" class="form-label">Smoking?</label>
                            <select id="smoking" name="smoking" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label for="smoking_age_started" class="form-label">Age Started Smoking (if Yes)</label>
                                <input type="number" name="smoking_age_started" id="smoking_age_started"
                                    class="form-control" min="0">
                            </div>
                            <div class="col-md-4">
                                <label for="smoking_sticks_pack_per_day" class="form-label">Sticks/Pack per Day (if
                                    Yes)</label>
                                <input type="number" name="smoking_sticks_pack_per_day" id="smoking_sticks_pack_per_day"
                                    class="form-control" min="0">
                            </div>
                            <div class="col-md-4">
                                <label for="smoking_pack_per_year" class="form-label">Pack per Year (if Yes)</label>
                                <input type="number" name="smoking_pack_per_year" id="smoking_pack_per_year"
                                    class="form-control" min="0">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alcohol" class="form-label">Alcohol?</label>
                            <select id="alcohol" name="alcohol" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alcohol_how_often" class="form-label">How Often (if Yes)</label>
                            <input type="text" name="alcohol_how_often" id="alcohol_how_often" class="form-control"
                                maxlength="255">
                        </div>
                        <div class="mb-3">
                            <label for="food_preference" class="form-label">Food Preference</label>
                            <input type="text" name="food_preference" id="food_preference" class="form-control"
                                maxlength="255">
                        </div>
                    </div>
                </div>
            </div>
