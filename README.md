# Line_utilities


Начало работы
1. Установите Open server.
2. Запустите и добавьте в C:\OSPanel\domains скачанный репозеторий.
3. Нажмите на значок Open server в трее.
4. Наведите на "Мои проекты" и нажмите на проект.

Завершение работы сервера
1. Нажмите на значок Open server в трее.
2. Нажмите остановить, чтобы завершить работу сервера

Структура проекта

В проекте есть четыре страницы:
1. Страница «Вход и регистрация»:
![msedge_YUBeacTLbz](https://github.com/Elindor49/elindor49.github.io/assets/73751885/88380c7c-0198-4731-af9b-985bde88d730)

Страница должна содержать два поля для ввода данных: имя пользователя и пароль.
А также две кнопки для регистрации и входа.

Код для реализации функционала этой страницы в файле process.php

2. Основная страница:
![msedge_J3ewUiRzHe](https://github.com/Elindor49/elindor49.github.io/assets/73751885/1a1a9c4a-ee4e-454f-9d33-8da4ce746d53)

Страница должна содержать заголовок "Выберите, что хотите расчитать" , две кнопки: "Расчитать" и "Личный кабинет".

Код для реализации функционала этой страницы в файле main_page.php

3. Страница «Подсчет»:
![msedge_ZYew8JEBvL](https://github.com/Elindor49/elindor49.github.io/assets/73751885/99c4e00a-cf70-4e1b-9406-c80bd8ddc178)

Страница должна содержать четыре поля для расчета:

3.1 Рассчет газа, содержет: Поля для ввода количества потребленного газа, тариф, выбор месяца и кнопку "Расчитать".

3.2 Рассчет воды, содержет: Поля для ввода количества потребленной воды, тариф, выбор месяца и кнопку "Расчитать".

3.3 Рассчет электричества, содержет: Поля для ввода показания электроэнергии в начале месяца, показания электроэнергии в конце месяца, тариф, выбор месяца и кнопки "Расчитать", "На главную".

3.4 Сумма: выводит сумму за три расчитанных результата.  

Код для реализации функционала этой страницы в файле page_1.php

Подкючение базы данных в файле /include/db.php

Функции, которые используюся для расчета в файлах /include/function.php, /include/function_2.php, /include/function_3.php

4. Страница «Личный кабинет»:
![msedge_gS9JmOQcpY](https://github.com/Elindor49/elindor49.github.io/assets/73751885/f74368dd-69ca-4483-a274-71729c4a8a48)

Страница должна содержать: заголовок "Личный кабинет", Добро пожалоть, 'имя пользователя', "Изменить пароль" , два поля для ввода данных: старый пароль и новый пароль.
А также две кнопки "Изменить пароль", "Выйти".

Код для реализации функционала этой страницы в файле account.php
