<style>
    body {
        background: #f7f7f7;
    }
    li {
        padding: 8px;
    }
    .mainLi {
        font-size: 20px;
        padding-top: 25px;
    }
    .smallLi {
        font-size: 16px;
    }
    .green {
        display: inline-block;
        background: green;
        color: #fff;
    }
    .linkAddAnswer {
        font-size: 15px;
        padding: 8px;
    } 
</style>
<div class="back"><a href="{{url(route('admin.showListTests'))}}">Назад</a></div>
@if(session('error'))
    <div>{{session('error')}}</div>
@endif
<div class="container">
    <h2>Название теста: {{$test->name}}</h2>
    <div class="questions">Вопросы к тесту:</div>
    <div class="addlink"><a href="{{route('admin.showAddQuestionsForm', ['test_id' => $test->id])}}">Добавить вопрос</a></div>
    <div class="list">
        <ul>
            @foreach($test->questions as $question)
                @include('admin.parts.questionAnswers')
            @endforeach
        </ul>
    </div>
</div>