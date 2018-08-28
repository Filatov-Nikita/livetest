<style>
    li {
        padding: 5px;
        font-size: 20px;
    }
</style>
<div class="title"><h1>Выберите Тест для прохождения</h1></div>
<div class="container">
    <ul>
        @forelse($tests as $test)
            <li><a href="{{route('client.showTest', ['test_id' => $test->id])}}">{{$test->name}}</a></li>
        @empty
            <p>В данных момент нет доступных тестов</p>
        @endforelse
    </ul>
</div>