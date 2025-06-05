<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
<div class="modal-dialog">
        <form method="POST" id="editForm">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editCourse" class="form-label">Course</label>
                        <select class="form-select" name="course" id="editCourse">
                            <option value="" disabled>Select course</option>
                            @php
                                $courses = [
                                    'Computer Science',
                                    'Information Technology',
                                    'Business Management',
                                    'Electrical Engineering',
                                    'Mechanical Engineering',
                                    'Civil Engineering',
                                    'Cyber security',
                                    'Interactive Media',
                                    'Data Science',
                                    'Software Engineering',
                                    'Artificial Intelligence',
                                    'Accounting',
                                ];
                            @endphp
                            @foreach ($courses as $course)
                                <option value="{{ $course }}">{{ $course }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="editAge" class="form-label">Age</label>
                        <input type="number" class="form-control" id="editAge" name="age" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-danger" id="updateButton"><i class="ti ti-pencil"></i>
                        update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
