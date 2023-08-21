<form action="{{ route('departments.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Department Name">
    <button type="submit">Create Department</button>
</form>
