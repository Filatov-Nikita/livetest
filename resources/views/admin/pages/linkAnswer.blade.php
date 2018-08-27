<h2>Вопрос был успешно {{isset($edit) && $edit ? 'Изменен' : 'Добавлен'}}</h2>
<div><a href="{{route('admin.showTestPage', ['id' => $test_id])}}">Вернуться к списку Вопросов и ответов</a></div>