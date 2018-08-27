<li class="mainLi">
    {{$question->name}} <a href="{{route('admin.editQuestion', ['question_id' => $question->id])}}">Редактировать</a> 
        <a href="{{route('admin.toggleQuestion', ['question_id' => $question->id])}}">{{$question->active ? 'Скрыть' : 'Отобразить'}}</a>
    <div class="linkAddAnswer"><a href="{{route('admin.showAddAnswersForm', ['question_id' => $question->id])}}">Добавить вопрос</a></div>
    <ul>
        @include('admin.parts.answers')
    </ul>
</li>