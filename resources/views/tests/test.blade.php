@foreach ($tests as $test)
    {{ $test->id }} <br>
    {{ $test->text }} <br>
@endforeach
