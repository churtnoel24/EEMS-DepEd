<div class="card mb-4">
                <div class="card-header fw-bold">
                    <a class="d-flex justify-content-between text-decoration-none text-dark" data-bs-toggle="collapse"
                        href="#malePersonnel" aria-expanded="false" aria-controls="malePersonnel">
                        <span>For Male Personnel</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                </div>
                <div id="malePersonnel" class="collapse">
                    <div class="card-body row g-3">
                        <div class="col-md-4">
                            <label for="digital_rectal_exam_done" class="form-label">Digital Rectal Exam Done?</label>
                            <select id="digital_rectal_exam_done" name="digital_rectal_exam_done" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="digital_rectal_exam_date" class="form-label">Date (if Yes)</label>
                            <input type="date" name="digital_rectal_exam_date" id="digital_rectal_exam_date"
                                class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="digital_rectal_exam_result" class="form-label">Result</label>
                            <input type="text" name="digital_rectal_exam_result" id="digital_rectal_exam_result"
                                class="form-control" maxlength="500">
                        </div>
                    </div>
                </div>
            </div>
