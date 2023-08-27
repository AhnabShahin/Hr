<p>list - </p>
@foreach ($employees as $employee)
<p>{{ $employee->name }} - {{ $employee->email }}</p>
@endforeach
