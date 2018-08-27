<h2>Тест был успешно {{isset($edit) && $edit ? 'Изменен' : 'Добавлен'}}</h2>
<div><a href="{{route('admin.showListTests')}}">Вернуться к списку Тестов</a></div>