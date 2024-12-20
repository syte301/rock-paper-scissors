<!DOCTYPE html>
<html>
<head>
    <title>Rock Paper Scissors</title>
</head>
<body>
    <h1>Rock Paper Scissors</h1>

    @if(isset($result))
        <p>You {{ $result }}!</p>
    @endif

    <form method="POST" action="{{ route('game.play') }}">
        @csrf
        <label for="rock">Rock</label>
        <input type="radio" name="choice" id="rock" value="rock">
        <label for="paper">Paper</label>
        <input type="radio" name="choice" id="paper" value="paper">
        <label for="scissors">Scissors</label>
        <input type="radio" name="choice" id="scissors" value="scissors">
        <button type="submit">Play</button>
    </form>
</body>
</html>