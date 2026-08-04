<div class="card-body">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" name="name" value="{{ old('name', $student->name ?? '') }}"
                class="form-control bg-white" placeholder="Enter student name">
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" value="{{ old('email', $student->email ?? '') }}"
                class="form-control bg-white" placeholder="Enter email">
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" value="{{ old('phone', $student->phone ?? '') }}"
                class="form-control bg-white" placeholder="Enter phone number">
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Batch</label>
            <select name="batch" class="form-select bg-white">
                <option value="">Select Batch</option>
                <option value="2020" {{ old('batch', $student->batch ?? '') == '2020' ? 'selected' : '' }}>2020</option>
                <option value="2021" {{ old('batch', $student->batch ?? '') == '2021' ? 'selected' : '' }}>2021</option>
                <option value="2022" {{ old('batch', $student->batch ?? '') == '2022' ? 'selected' : '' }}>2022</option>
                <option value="2023" {{ old('batch', $student->batch ?? '') == '2023' ? 'selected' : '' }}>2023</option>
                <option value="2024" {{ old('batch', $student->batch ?? '') == '2024' ? 'selected' : '' }}>2024</option>
                <option value="2025" {{ old('batch', $student->batch ?? '') == '2025' ? 'selected' : '' }}>2025</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Photo</label>
            <input type="file" class="form-control bg-white">
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select bg-white">
                <option value="1" {{old('status', $student->batch ?? '') == 1 ? 'selected' : ''}}>Active</option>
                <option value="0" {{old('status', $student->batch ?? '') == 0 ? 'selected' : ''}}>Inactive</option>
            </select>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end gap-2">
        <button class="btn btn-dark">
            Cancel
        </button>

        <button class="btn btn-primary">
            Save Student
        </button>
    </div>
</div>
