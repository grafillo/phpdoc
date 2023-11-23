<html>


<form method='post' action='html.php'
      enctype='multipart/form-data'>
    Email<br>
    <input name='email' type='text'><br>
    Текст<br>
    <textarea name='text' rows='4' cols='50'></textarea><br>


    <input type='submit' value='Отправить' class='btn btn-success'>
</form>


</html>

<?php

Construct();

/**
 * Метод выполняется при запуске скрипта, валидирует данные, в случае успеха отправлет текст на почту. Принимает данные из массива пост.
 * @return mixed
 */
function Construct():mixed {

    $email = $_POST['email'];
    $text = $_POST['text'];

    if(fieldEmptyValidation($email, $text) &&  emailValidation($email)){

        sendMail($email,$text);

    } else {

        echo "Ошибка валидации";
    }


}

/**
 * Метод првоеряет заполнены ли поля email и text.
 * @param string $email емэил.
 * @param string $text текст письма.
 * @return bool
 */

function fieldEmptyValidation(string $email,string $text):bool
{
    if ( ! empty($_POST['email']) && ! empty($_POST['text'])) {

        return true;
    }
    else {
        return false;
    }
}

/**
 * Метод првоеряет валиден ли указаный email.
 * @param string $email емэил.
 * @return bool
 */

function emailValidation(string $email):bool{

if(preg_match('/^[A-Za-z0-9_.-]+@[A-Za-z0-9-]+\.[A-Za-z0-9-.]+$/', $email)){

    return true;
}else {

    return false;
}

}

/**
 * Метод посылает пиьсмо на указаный email.
 * @param string $email емэил.
 * @param string $text текст письма.
 * @return void
 */
function sendMail(string $email, string $text):void{

    mail($email,"",$text);

}

