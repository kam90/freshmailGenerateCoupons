<html>
<head>

</head>
<body>
    <form action="" method="POST">
        @csrf
        <div>
            <label for="count">Ilość:</label>
            <input type="text" id="count" name="count" value="{{ old('count') }}">
            @if ($errors->has('count'))
                <div style="color: red">{{ $errors->first('count') }}</div>
            @endif
        </div><br>
        <div>
            <label for="length">Długość:</label>
            <input type="text" id="length" name="length" value="{{ old('length') }}">
            @if ($errors->has('length'))
                <div style="color: red">{{ $errors->first('length') }}</div>
            @endif
        </div><br>
        <div>
            <button type="submit">Generuj</button>
        </div>
    </form>
@if($file)
    <a href="{{ asset($file) }}">Pobierz</a>
@endif
</body>
</html>