<?php
//1
echo "Период отпусков закончился!<br/>";
print "Период отпусков закончился!<br/>";
//2

$number = 288; // Целочисленное значение
$text = "Все возвращаются на работу!"; // Строчного типа

// Конкатенация переменных и вывод результата на экран
echo "В " . $number . " день, приблизительно ... " . $text . "<br/>";


// Вывод суммы чисел
echo 45+67 . "<br/>"; // Это выведет результат сложения чисел, то есть 112

// Попытка вывести текстовую строку с числами внутри кавычек
echo "45+67" . "<br/>"; // Это выведет текст "45+67", а не результат сложения


echo '45+67' . "<br/>"; // Также выведет текст '45+67', аналогично предыдущему

// Использование одинарных кавычек снаружи и двойных внутри
echo 'Книга "Герой" выйдет в октябре, этого года!' ."<br/><br/>";

echo"<br/>";
// Добавление автора к стиху "Ты и Вы" Александра Пушкина
$poem = "<pre><b>Александр Пушкин</b><br/><b>Ты и Вы</b><br/>
Пустое вы сердечным ты<br/>
Она, обмолвясь, заменила<br/>
И все счастливые мечты<br/>
В душе влюбленной возбудила.<br/>
Пред ней задумчиво стою,<br/>
Свести очей с нее нет силы;<br/>
И говорю ей: как вы милы!<br/>
И мыслю: как тебя люблю!<br/>
1828 г.</pre>";

// Вывод стиха на экран
echo $poem;




