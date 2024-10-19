<div id="students-list">
    <table id="students-table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Class Teacher</th>
                <th>Class</th>
                <th>Admission Date</th>
                <th>Yearly Fees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Student rows will be populated via AJAX -->
        </tbody>
    </table>
</div>

<!-- Add/Edit Form -->
<form id="student-form">
    <input type="hidden" id="student-id">
    <input type="text" id="student_name" placeholder="Student Name" required>
    <select id="class_teacher_id" required>
        <!-- Teachers will be populated dynamically -->
    </select>
    <input type="text" id="class" placeholder="Class" required>
    <input type="date" id="admission_date" required>
    <input type="number" step="0.01" id="yearly_fees" placeholder="Yearly Fees" required>
    <button type="submit">Submit</button>
</form>
