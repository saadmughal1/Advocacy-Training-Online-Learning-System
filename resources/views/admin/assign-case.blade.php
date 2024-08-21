@extends('../layouts/app')

@section('page-title', 'Assign Case')

@section('content')

    @includeIf('admin.partials._navbar')
    @includeIf('admin.partials._sidebar')

    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Assigning Cases to Advisors</h4>
                <!-- <p class="mb-30">All fields are required</p> -->
            </div>
        </div>
        <form id="assign-case-form">
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select Case Type</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select2 form-control" name="caseType" id="caseTypeSelect"
                        style="width: 100%; height: 38px">
                        <option value="">Select Case Type</option>
                        <option value="family-law">Family Law</option>
                        <option value="early-bird-moot">Early Bird Moot</option>
                    </select>
                </div>
            </div>

            <div class="form-group row" id="cases-names" style="display: none">
                <label class="col-sm-12 col-md-2 col-form-label">Cases of <br><span id="caseTypeLabel"></span></label>
                <div class="col-sm-12 col-md-10">
                    <select id="caseSelect" class="custom-select2 form-control" name="case"
                        style="width: 100%; height: 38px">
                        <!-- Options will be dynamically populated -->
                    </select>
                </div>
            </div>

            <div class="form-group row" id="advisor-names" style="display: none">
                <label class="col-sm-12 col-md-2 col-form-label">Select Advisor</label>
                <div class="col-sm-12 col-md-10">
                    <select id="advisorSelect" class="custom-select2 form-control" name="advisor"
                        style="width: 100%; height: 38px">
                        <!-- Options will be dynamically populated -->
                    </select>
                </div>
            </div>

            <div class="form-group row" id="student-names" style="display: none">
                <label class="col-sm-12 col-md-2 col-form-label">Select Students</label>
                <div class="col-sm-12 col-md-10 overflow-auto">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody id="studentTableBody">
                            <!-- Student rows will be dynamically populated -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="form-group row d-flex justify-content-end w-100">
                <button type="submit" class="btn btn-primary">Assign</button>
            </div>
        </form>
    </div>

@endsection

@push('styles')
    <style>
        .case-content {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            function updateCases() {
                var selectedCaseType = $('#caseTypeSelect').val();
                var getCasesByTypeUrl = "{{ route('admin.get-cases-by-type') }}";

                if (selectedCaseType.trim() === '') {
                    $('#cases-names').hide();
                    $('#advisor-names').hide();
                    $('#student-names').hide();
                    return;
                }
                $('#caseTypeLabel').text(selectedCaseType.replace(/-/g, ' '));
                $.ajax({
                    url: getCasesByTypeUrl,
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        case_type: selectedCaseType
                    },
                    success: function(response) {
                        $('#caseSelect').empty().append('<option value="">Select Case</option>');
                        $("#cases-names").show();
                        response.forEach(function(caseItem) {
                            $('#caseSelect').append('<option value="' + caseItem.id + '">' +
                                caseItem.case_name + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error('An error occurred while fetching cases:', xhr.responseText);
                    }
                });
            }

            function updateAdvisors() {
                var selectedCaseId = $('#caseSelect').val();
                var selectedCaseType = $('#caseTypeSelect').val();
                var getAdvisorsUrl = "{{ route('admin.get-advisors-by-case') }}";

                if (selectedCaseId.trim() === '') {
                    $('#advisor-names').hide();
                    $('#student-names').hide();
                    return;
                }

                $.ajax({
                    url: getAdvisorsUrl,
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        case_id: selectedCaseId,
                        case_type: selectedCaseType
                    },
                    success: function(response) {
                        $('#advisorSelect').empty().append('<option value="">Select Advisor</option>');
                        $("#advisor-names").show();
                        response.forEach(function(advisor) {
                            $('#advisorSelect').append('<option value="' + advisor.id + '">' +
                                advisor.username + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error('An error occurred while fetching advisors:', xhr.responseText);
                    }
                });
            }

            function updateStudents() {
                var getStudentsUrl = "{{ route('admin.get-students') }}";

                $.ajax({
                    url: getStudentsUrl,
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#studentTableBody').empty();
                        $("#student-names").show();
                        response.forEach(function(student, index) {
                            $('#studentTableBody').append('<tr>' +
                                '<th scope="row"><input type="checkbox" name="students[]" value="' +
                                student.id + '"></th>' +
                                '<th scope="row">' + (index + 1) + '</th>' +
                                '<td>' + student.username + '</td>' +
                                '<td>' + student.email + '</td>' +
                                '</tr>');
                        });
                    },
                    error: function(xhr) {
                        console.error('An error occurred while fetching students:', xhr.responseText);
                    }
                });
            }

            $('#caseTypeSelect').change(function() {
                $('#cases-names').hide();
                $('#advisor-names').hide();
                $('#student-names').hide();
                updateCases();
            });

            $('#caseSelect').change(function() {
                updateAdvisors();
            });

            $('#advisorSelect').change(function() {
                var selectedAdvisorId = $('#advisorSelect').val();
                if (selectedAdvisorId.trim() === '') {
                    $('#student-names').hide();
                } else {
                    updateStudents();
                }
            });

            $('#assign-case-form').submit(function(event) {
                event.preventDefault();

                var formData = {
                    advisor_id: $('#advisorSelect').val(),
                    case_id: $('#caseSelect').val(),
                    case_type: $('#caseTypeSelect').val().replace(/-/g, "_"),
                    students: $('input[name="students[]"]:checked').map(function() {
                        return $(this).val();
                    }).get(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                };

                if (!formData["case_type"]) {
                    alert('Please select a case type.');
                    return;
                }

                if (!formData["case_id"]) {
                    alert('Please select a case.');
                    return;
                }

                if (!formData["advisor_id"]) {
                    alert('Please select an advisor.');
                    return;
                }

                if (formData["students"].length === 0) {
                    alert('Please select at least one student.');
                    return;
                }

                var assignCaseUrl = "{{ route('admin.assign-case') }}";

                $.ajax({
                    url: assignCaseUrl,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            location.reload()
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        console.error('An error occurred while assigning the case:', xhr
                            .responseText);
                        alert('An error occurred while processing your request.');
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.transition = 'opacity 1s ease-out';
                    successMessage.style.opacity = '0';
                    setTimeout(function() {
                        successMessage.remove();
                    }, 1000);
                }, 2000);
            }
        });
    </script>
@endpush
