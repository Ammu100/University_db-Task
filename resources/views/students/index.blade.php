@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Students</h1>
    <button id="addStudentBtn" class="btn btn-primary">Add Student</button>
    <table class="table" id="studentTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Class Teacher</th>
                <th>Class</th>
                <th>Admission Date</th>
                <th>Yearly Fees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<!-- Add/Edit Student Modal -->
<div class="modal" id="studentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="studentForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add/Edit Student</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="student_id" id="studentId">
                    <div class="form-group">
                        <label for="student_name">Student Name</label>
                        <input type="text" class="form-control" name="student_name" id="student_name" required>
                    </div>
                    <div class="form-group">
                        <label for="class_teacher_id">Class Teacher</label>
                        <select class="form-control" name="class_teacher_id" id="class_teacher_id" required>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->teacher_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="text" class="form-control" name="class" required>
                    </div>
                    <div class="form-group">
                        <label for="admission_date">Admission Date</label>
                        <input type="date" class="form-control" name="admission_date" required>
                    </div>
                    <div class="form-group">
                        <label for="yearly_fees">Yearly Fees</label>
                        <input type="number" class="form-control" name="yearly_fees" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    loadTable();

    function loadTable() {
        $('#studentTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/students/fetch', // Ensure this matches your defined route
            columns: [
                { data: 'student_name' },
                { data: 'teacher.teacher_name' }, // Adjust based on your relationship
                { data: 'class' },
                { data: 'admission_date' },
                { data: 'yearly_fees' },
                { data: 'id', render: function(data) {
                    return `
                        <button class="edit-btn" data-id="${data}">Edit</button>
                        <button class="delete-btn" data-id="${data}">Delete</button>`;
                }},
            ],
        });
    }

    $('#studentForm').on('submit', function(e) {
        e.preventDefault();
        let studentId = $('#studentId').val();
        let url = studentId ? '/students/' + studentId : '/students';
        let type = studentId ? 'PUT' : 'POST';
        $.ajax({
            url: url,
            type: type,
            data: $(this).serialize(),
            success: function(response) {
                $('#studentModal').modal('hide');
                $('#studentForm')[0].reset();
                $('#studentTable').DataTable().ajax.reload();
            },
            error: function(xhr) {
                console.log(xhr.responseJSON);
            }
        });
    });

    $(document).on('click', '.edit-btn', function() {
        let studentId = $(this).data('id');
        $.ajax({
            url: '/students/' + studentId + '/edit',
            type: 'GET',
            success: function(data) {
                const student = data.student;
                $('#studentId').val(student.id);
                $('#student_name').val(student.student_name);
                $('#class_teacher_id').val(student.class_teacher_id);
                $('#class').val(student.class);
                $('#admission_date').val(student.admission_date);
                $('#yearly_fees').val(student.yearly_fees);
                $('#studentModal').modal('show');
            }
        });
    });

    $(document).on('click', '.delete-btn', function() {
        let studentId = $(this).data('id');
        if (confirm('Are you sure you want to delete this student?')) {
            $.ajax({
                url: '/students/' + studentId,
                type: 'DELETE',
                success: function(response) {
                    $('#studentTable').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);
                }
            });
        }
    });

    $('#addStudentBtn').on('click', function() {
        $('#studentId').val('');
        $('#studentForm')[0].reset();
        $('#studentModal').modal('show');
    });
});
</script>
@endsection
