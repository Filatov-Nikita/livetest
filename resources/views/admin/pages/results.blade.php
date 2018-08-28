<div><a href="{{route('admin.mainPage')}}">Назад</a></div>
<div class="title"><h2>Список пройденных тестов</h2></div>
<div class="container">
    <div class="list">
        @foreach($results as $result)
            <ul>
                 <li>Id пользователя: {{ $result->user_id }}</li>
                 <li>Id теста / название: {{ $result->test_id }} / {{ $result->test->name }}</li>
                 <li>Всего вопросов: {{ $result->total }}</li>
                 <li>Правильных ответов: {{ $result->correct }}</li>
                 <li>Неправильных ответов: {{ $result->uncorrect }}</li>
            </ul>
        @endforeach
    </div>
</div>