<p>Name: {{ $department->name }}</p>
<p>Employees:
    @foreach ($department->employees as $employee)
        {{ $employee->name }}{{ !$loop->last ? ',' : '' }}
    @endforeach
</p>