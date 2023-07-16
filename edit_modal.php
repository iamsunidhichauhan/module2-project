<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_registration_number">Registration Number:</label>
                        <input type="text" class="form-control" id="edit_registration_number" name="registration_number" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_name">Name:</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_grade">Grade:</label>
                        <input type="number" class="form-control" id="edit_grade" name="grade" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_classroom">Classroom:</label>
                        <select class="form-control" id="edit_classroom" name="classroom" required>
                            <option value="Class A">Class A</option>
                            <option value="Class B">Class B</option>
                            <option value="Class C">Class C</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="update_student">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
