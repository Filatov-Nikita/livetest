<div class="title"><h2>Список тестов</h2></div>
<div class="list">
    {{-- <div class="addLink"><a href="">Добавить тест</a></div> --}}
    <ul>
        @foreach($tests as $test)
             <li><a href="{{route('admin.showTestPage', ['id' => $test->id])}}">{{$test->name}}</a></li>
        @endforeach
    </ul>
</div>