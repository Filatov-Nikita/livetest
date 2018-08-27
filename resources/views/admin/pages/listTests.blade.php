<div class="title"><h2>Список тестов</h2></div>
<div class="list">
    <div class="addLink"><a href="{{route('admin.showAddTestsForm')}}">Добавить тест</a></div>
    <ul>
        @foreach($tests as $test)
             <li><a href="{{route('admin.showTestPage', ['id' => $test->id])}}">{{$test->name}}</a> <a href="{{route('admin.editTest', ['test_id' => $test->id])}}">Редактировать</a>
             @if($test->active)
                <a href="{{route('admin.toggleTest', ['id' => $test->id])}}">Скрыть</a>
             @else
                <a href="{{route('admin.toggleTest', ['id' => $test->id])}}">Отобразить</a>
             @endif
            </li>
        @endforeach
    </ul>
</div>