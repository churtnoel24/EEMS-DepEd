<div class="card mb-4">
                <div class="card-header fw-bold">
                    <a class="d-flex justify-content-between text-decoration-none text-dark" data-bs-toggle="collapse"
                        href="#lastTaken" aria-expanded="false" aria-controls="lastTaken">
                        <span>Last Taken</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                </div>
                <div id="lastTaken" class="collapse">
                    <div class="card-body">
                        @foreach ([['last_taken_cxr_sputum', 'CXR/Sputum'], ['last_taken_ecg', 'ECG'], ['last_taken_urinalysis', 'Urinalysis'], ['last_taken_drug_test', 'Drug Test'], ['last_taken_neuro_exam', 'Neuro Exam'], ['last_taken_bloodtyping', 'Blood Typing']] as [$prefix, $label])
                            <div class="row g-3 mb-3">
                                <div class="col-md-3">
                                    <label class="form-label">{{ $label }} Date</label>
                                    <input type="date" name="{{ $prefix }}_date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ $label }} Result</label>
                                    <input type="text" name="{{ $prefix }}_result" class="form-control"
                                        maxlength="500">
                                </div>
                            </div>
                        @endforeach
                        <div class="mb-3">
                            <label class="form-label">Other Last Taken</label>
                            <input type="text" name="last_taken_others" class="form-control" maxlength="500">
                        </div>
                    </div>
                </div>
            </div>
