<h2>Create Department</h2>

<form action="{{ route('departments.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Department Name</label>
        <input type="text" id="name" name="department_name" class="form-control" placeholder="Department Name" required>
    </div>
    <div class="form-group">
        <label for="location_id">Location</label>
        <select id="location_id" name="location_id" class="form-control" required>
            <option value="">Select a Location</option>
            @foreach($locations as $location)
                <option value="{{ $location->id }}">{{ $location->street_address }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="manager_id">Manager</label>
        <select id="manager_id" name="manager_id" class="form-control">
            <option value="">Select a Manager</option>
            @foreach($managers as $manager)
                <option value="{{ $manager->id }}">{{ $manager->first_name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create Department</button>
</form>


