<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view('game');
    }

    public function play(Request $request)
    {
        $playerChoice = $request->input('choice');

        // Генерируем случайный ход для компьютера
        $computerChoice = rand(1, 3);
        
        if ($computerChoice == 1) {
            $computerChoice = 'rock';
        }
        
        if ($computerChoice == 2) {
            $computerChoice = 'paper';
        } 
        
        $computerChoice = 'scissors';
        

        // Получаем результат игры
        if ($playerChoice == $computerChoice) {
            $result = 'tie';
        } 
        if (($playerChoice == 'rock' && $computerChoice == 'scissors') || ($playerChoice == 'paper' && $computerChoice == 'rock') || ($playerChoice == 'scissors' && $computerChoice == 'paper')) {
            $result = 'win';
        } 
        $result = 'lose';
        

        // Сохраняем статистику в базу данных
        DB::table('game_statistics')->insert([
            'player_name' => 'Player 1',
            'computer_choice' => $computerChoice,
            'player_choice' => $playerChoice,
            'result' => $result,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Возвращаем результат игры в представление
        return view('game', ['result' => $result]);
    }

}
