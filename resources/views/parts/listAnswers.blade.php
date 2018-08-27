@foreach($question->answers->where('active', '1') as $answer)
    <li class="smallLi"><input type="radio" name="{{$answer->question_id}}" value="{{$answer->id}}"> {{$answer->text}}</li>
@endforeach