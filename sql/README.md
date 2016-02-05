##Задание:

###SQL dummy test
#### Вопрос 1
Выбрать всех людей, которые хоть раз путешествовали и отобразить около каждого список мест, где он бывал через запятую.
Колонки: name, distinations

#### Вопрос 2
Выбрать всех людей, которые были и на Кубе и в Сочи.
Колонки: name

#### Вопрос 3
Выбрать всех людей, которые были только и на Кубе и в Сочи.
Колонки: name

Для SQL теста доступна схема: [http://sqlfiddle.com/#!9/3ef1f/1](http://sqlfiddle.com/#!9/3ef1f/1)

##Решение:

#### ответ на вопрос 1
```sql
SELECT h.name name, GROUP_CONCAT(vd.name) distinations
FROM human h
LEFT JOIN human_vacation_dist hvd ON hvd.human_id = h.id
LEFT JOIN vacation_dist vd ON vd.id = hvd.distination_id
GROUP BY h.id;
```

#### ответ на вопрос 2
```sql
SELECT h.name name
FROM human h
LEFT JOIN human_vacation_dist hvd ON hvd.human_id = h.id
LEFT JOIN vacation_dist vd ON vd.id = hvd.distination_id
WHERE vd.name
IN (
'Cuba',  'Sochi'
)
GROUP BY h.id
HAVING SUM( vd.name =  'Cuba' ) >0
AND SUM( vd.name =  'Sochi' ) >0;
```

#### ответ на вопрос 3
```sql
SELECT h.name name
FROM human h
LEFT JOIN human_vacation_dist hvd ON hvd.human_id = h.id
LEFT JOIN vacation_dist vd ON vd.id = hvd.distination_id
GROUP BY h.id
HAVING COUNT(vd.name) =2
AND SUM( vd.name =  'Cuba' ) >0
AND SUM( vd.name =  'Sochi' ) >0;
```