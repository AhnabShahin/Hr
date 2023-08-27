
<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="position" placeholder="Position">
    <select name="department_id">
        @foreach ($departments as $department)
            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
        @endforeach
    </select>
    <button type="submit">Create Employee</button>
</form>

