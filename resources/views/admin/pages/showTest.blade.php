<div class="back"><a href="{{url(route('admin.showListTests'))}}">Назад</a></div>
<div class="container">
    <h2>Название теста: {{$test->name}}</h2>
    <div class="questions">Вопросы к тесту:</div>
    <div class="addlink"><a href="{{route('admin.showAddQuestionsForm', ['test_id' => $test->id])}}">Добавить вопрос</a></div>
    <div class="list">
        <ul>
            @foreach($test->questions as $question)
                <li>
                    {{$question->name}} <a href="">Редактировать</a> 
                    @if($question->active)
                        <a href="{{route('admin.toggleQuestion', ['question_id' => $question->id])}}">Скрыть</a>
                    @else
                        <a href="{{route('admin.toggleQuestion', ['question_id' => $question->id])}}">Отобразить</a>
                    @endif
                    <ul>
                        @foreach($question->answers as $answer)
                            <li>{{$answer->text}}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>