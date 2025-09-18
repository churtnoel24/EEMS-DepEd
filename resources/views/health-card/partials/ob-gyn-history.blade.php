<div class="card mb-4">
                <div class="card-header fw-bold">
                    <a class="d-flex justify-content-between text-decoration-none text-dark" data-bs-toggle="collapse"
                        href="#obgyn" aria-expanded="false" aria-controls="obgyn">
                        <span>OB-GYN History (for female teachers)</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                </div>
                <div id="obgyn" class="collapse">
                    <div class="card-body">
                        <!-- ...OB-GYN fields... -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label for="menarche" class="form-label">Menarche</label>
                                <input type="number" name="menarche" id="menarche" class="form-control"
                                    min="0">
                            </div>
                            <div class="col-md-4">
                                <label for="cycle" class="form-label">Cycle</label>
                                <select id="cycle" name="cycle" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Irregular">Irregular</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="duration" class="form-label">Duration</label>
                                <input type="number" name="duration" id="duration" class="form-control"
                                    min="0">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ob_gyn_parity" class="form-label">Parity</label>
                            <select id="ob_gyn_parity" name="ob_gyn_parity" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="F">F</option>
                                <option value="P">P</option>
                                <option value="A">A</option>
                                <option value="L">L</option>
                            </select>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="papsmear_done" class="form-label">Papsmear Done?</label>
                                <select id="papsmear_done" name="papsmear_done" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="papsmear_date" class="form-label">Papsmear Date (if Yes)</label>
                                <input type="date" name="papsmear_date" id="papsmear_date" class="form-control">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="self_breast_exam_done" class="form-label">Self Breast Exam Done?</label>
                                <select id="self_breast_exam_done" name="self_breast_exam_done" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="mass_noted" class="form-label">Mass Noted?</label>
                                <select id="mass_noted" name="mass_noted" class="form-select">
                                    <option value="">-- Select --</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="mass_location" class="form-label">Mass Location (if Yes)</label>
                            <input type="text" name="mass_location" id="mass_location" class="form-control"
                                maxlength="255">
                        </div>
                    </div>
                </div>
            </div>
