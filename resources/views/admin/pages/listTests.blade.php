<div><a href="{{route('admin.mainPage')}}">Назад</a></div>
<div class="title"><h2>Список тестов</h2></div>
<div class="list">
    <div class="addLink"><a href="{{route('admin.showAddTestsForm')}}">Добавить тест</a></div>
    <ul>
        @foreach($tests as $test)
             <li>
                <a href="{{route('admin.showTestPage', ['id' => $test->id])}}">{{$test->name}}</a> <a href="{{route('admin.editTest', ['test_id' => $test->id])}}">Редактировать</a>
                <a href="{{route('admin.toggleTest', ['id' => $test->id])}}">{{$test->active ? 'Скрыть' : 'Отобразить'}}</a>
            </li>
        @endforeach
    </ul>
</div>