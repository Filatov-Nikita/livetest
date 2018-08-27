<ul>
    @foreach($questions as $question)
        <li class="bigLi">
            {{$question->name}}
            <ul>
               @include('parts.listAnswers')
            </ul>
        </li>
    @endforeach
</ul>