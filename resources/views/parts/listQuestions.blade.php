<ul>
    @forelse($questions as $question)
        <li class="bigLi">
            {{$question->name}}
            <ul>
               @include('parts.listAnswers')
            </ul>
        </li>

    @empty

        <p>Извините в данном тесте пока нет вопросов</p>

    @endforelse
</ul>