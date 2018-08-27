@foreach($question->answers as $answer)
    <li class="smallLi{{$answer->correct ? ' green' : NULL}}">{{$answer->text}} <a href="{{route('admin.editAnswer', ['answer_id' => $answer->id])}}">Редактировать</a> 
        <a href="{{route('admin.toggleAnswer', ['answer_id' => $answer->id])}}">{{$answer->active ? 'Скрыть' : 'Отобразить'}}</a>
    </li>
@endforeach