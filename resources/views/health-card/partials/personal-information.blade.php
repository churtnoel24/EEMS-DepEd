 <div class="card mb-4">
                <div class="card-header fw-bold">
                    <a class="d-flex justify-content-between align-items-center text-decoration-none text-dark"
                        data-bs-toggle="collapse" href="#personalInfo" aria-expanded="true" aria-controls="personalInfo">
                        <span>Personal Information</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                </div>
                <div id="personalInfo" class="collapse show">
                    <div class="card-body row g-3">
                        <!-- ...personal info fields... -->
                        <div class="col-md-4">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required maxlength="255">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Age</label>
                            <input type="number" name="age" class="form-control" min="1" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Civil Status</label>
                            <select name="civil_status" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Widowed</option>
                                <option>Separated</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
