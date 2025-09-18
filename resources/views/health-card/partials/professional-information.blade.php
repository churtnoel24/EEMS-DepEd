<div class="card mb-4">
                <div class="card-header fw-bold">
                    <a class="d-flex justify-content-between text-decoration-none text-dark" data-bs-toggle="collapse"
                        href="#professionalInfo" aria-expanded="false" aria-controls="professionalInfo">
                        <span>Professional Information</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                </div>
                <div id="professionalInfo" class="collapse">
                    <div class="card-body row g-3">
                        <!-- ...professional info fields... -->
                        <div class="col-md-6">
                            <label class="form-label">School District/Division</label>
                            <input type="text" name="school_district_division" class="form-control" required
                                maxlength="255">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Position/Designation</label>
                            <input type="text" name="position_designation" class="form-control" required maxlength="255">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">First Year in Service</label>
                            <input type="number" name="first_year_in_service" class="form-control" min="0" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Years in Service</label>
                            <input type="number" name="years_in_service" class="form-control" min="0" required>
                        </div>
                    </div>
                </div>
            </div>
