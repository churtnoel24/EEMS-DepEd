@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 mb-0 text-primary">
                    <i class="bi bi-gear me-2"></i>Manage Predefined Items
                </h2>
            </div>

            <!-- Action Buttons -->
            <div class="row">
                <div class="col-md-3 mb-3">
                    <form method="post" action="{{ route('settings.addcomplain') }}">
                        @csrf
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addComplaintModal">
                            <i class="bi bi-clipboard-pulse me-2"></i>Add Chief Complaint
                        </button>
                    </form>
                </div>
                <div class="col-md-3 mb-3">
                    <form method="post" action="{{ route('settings.addtreatment') }}">
                        @csrf
                        <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#addTreatmentModal">
                            <i class="bi bi-capsule me-2"></i>Add Treatment
                        </button>
                    </form>
                </div>
                <div class="col-md-3 mb-3">
                    <form method="post" action="{{ route('settings.addrecomm') }}">
                        @csrf
                        <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#addRecommendationModal">
                            <i class="bi bi-chat-square-text me-2"></i>Add Recommendation
                        </button>
                    </form>
                </div>
                <div class="col-md-3 mb-3">
                    <form method="post" action="{{ route('settings.addfindings') }}">
                        @csrf
                        <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#addFindingModal">
                            <i class="bi bi-search-heart me-2"></i>Add Finding
                        </button>
                    </form>
                </div>
            </div>

            <!-- Current Items Display -->
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-list-check me-2"></i>Current Predefined Items
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Chief Complaints -->
                        <div class="col-md-6 mb-4">
                            <h6 class="text-primary mb-3">
                                <i class="bi bi-clipboard-pulse me-2"></i>Chief Complaints
                            </h6>
                            <div class="border rounded p-3 bg-light">
                                @foreach($complaints as $complaint)
                                    <span class="badge bg-primary me-2 mb-2 p-2">
                                        {{ $complaint->name }}
                                        <form method="POST" action="{{ route('settings.deletecomplain', $complaint->id) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-close btn-close-white ms-1" onclick="return confirm('Delete this complaint?')"></button>
                                        </form>
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Treatments -->
                        <div class="col-md-6 mb-4">
                            <h6 class="text-success mb-3">
                                <i class="bi bi-capsule me-2"></i>Treatments
                            </h6>
                            <div class="border rounded p-3 bg-light">
                                @foreach($treatments as $treatment)
                                    <span class="badge bg-success me-2 mb-2 p-2">
                                        {{ $treatment->name }}
                                        <form method="POST" action="{{ route('settings.deletetreatment', $treatment->id) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-close btn-close-white ms-1" onclick="return confirm('Delete this treatment?')"></button>
                                        </form>
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Recommendations -->
                        <div class="col-md-6 mb-4">
                            <h6 class="text-info mb-3">
                                <i class="bi bi-chat-square-text me-2"></i>Recommendations
                            </h6>
                            <div class="border rounded p-3 bg-light">
                                @foreach($recommendations as $recommendation)
                                    <span class="badge bg-info me-2 mb-2 p-2">
                                        {{ $recommendation->name }}
                                        <form method="POST" action="{{ route('settings.deleterecomm', $recommendation->id) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-close btn-close-white ms-1" onclick="return confirm('Delete this recommendation?')"></button>
                                        </form>
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Findings -->
                        <div class="col-md-6 mb-4">
                            <h6 class="text-warning mb-3">
                                <i class="bi bi-search-heart me-2"></i>Findings
                            </h6>
                            <div class="border rounded p-3 bg-light">
                                @foreach($findings as $finding)
                                    <span class="badge bg-warning me-2 mb-2 p-2">
                                        {{ $finding->name }}
                                        <form method="POST" action="{{ route('settings.deletefinding', $finding->id) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-close ms-1" onclick="return confirm('Delete this finding?')"></button>
                                        </form>
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Chief Complaint Modal -->
<div class="modal fade" id="addComplaintModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('settings.addcomplain') }}">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-clipboard-pulse me-2"></i>Add Chief Complaint
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="complaintName" class="form-label">Complaint Name</label>
                        <input type="text" class="form-control" id="complaintName" name="name"
                               placeholder="e.g., Headache, Fever, Cough" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Complaint</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Treatment Modal -->
<div class="modal fade" id="addTreatmentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('settings.addtreatment') }}">
                @csrf
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-capsule me-2"></i>Add Treatment
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="treatmentName" class="form-label">Treatment Name</label>
                        <input type="text" class="form-control" id="treatmentName" name="name"
                               placeholder="e.g., Paracetamol 500mg, Antibiotics" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Add Treatment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Recommendation Modal -->
<div class="modal fade" id="addRecommendationModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('settings.addrecomm') }}">
                @csrf
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-chat-square-text me-2"></i>Add Recommendation
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recommendationName" class="form-label">Recommendation Name</label>
                        <input type="text" class="form-control" id="recommendationName" name="name"
                               placeholder="e.g., Rest for 3 days, Follow-up in 1 week" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Add Recommendation</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Finding Modal -->
<div class="modal fade" id="addFindingModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('settings.addfindings') }}">
                @csrf
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-search-heart me-2"></i>Add Finding
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="findingName" class="form-label">Finding Name</label>
                        <input type="text" class="form-control" id="findingName" name="name"
                               placeholder="e.g., Elevated BP, Normal heart sounds" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Add Finding</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
