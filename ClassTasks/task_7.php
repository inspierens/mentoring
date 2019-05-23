<?php
//Создайте класс Form - оболочку для создания форм. Он должен иметь методы input, submit, password, textarea, open,
// close. Каждый метод принимает массив атрибутов.
//Передаваемые атрибуты могут быть любыми:

/**
 * Class Form
 */
class Form
{
    /**
     * @param array $arr
     *
     * @return string
     */
    private function setValue(array $arr) : string
    {
        $str = '';

        foreach ($arr as $key => $val) {
            $str .= ' ' . $key . '="' . $val . '"';
        }

        return $str;
    }

    /**
     * @param array $arr
     *
     * @return string
     */
    private function setOtherValue(array $arr) : string
    {
        $str = '';

        foreach ($arr as $key => $val) {
            if ($key === 'value') {
                $str .= '>' . $val;
            } else {
                $str .= ' ' . $key . '="' . $val . '"';
            }
        }

        return $str;
    }

    /**
     * @param array $arr
     */
    public function input(array $arr)
    {
        $str = $this->setValue($arr);
        echo '<input' . $str . '><br>';
    }

    /**
     * @param array $arr
     */
    public function submit(array $arr)
    {
        $str = $this->setValue($arr);
        echo '<input type="submit"' . $str . '><br>';
    }

    /**
     * @param array $arr
     */
    public function password(array $arr)
    {
        $str = $this->setValue($arr);
        echo '<input type="password"' . $str . '><br>';
    }

    /**
     * @param array $arr
     */
    public function textarea(array $arr)
    {
        $str = $this->setOtherValue($arr);
        echo '<textarea' . $str . '</textarea><br>';
    }

    /**
     * @param array $arr
     */
    public function open(array $arr)
    {
        $str = $this->setValue($arr);
        echo '<form' . $str . '><br>';

    }

    /**
     *
     */
    public function close()
    {
        echo '</form><br>';
    }
}

$form = new Form();
$form->open(['action' => 'index.php', 'method' => 'POST']);
$form->input(['type' => 'text', 'value' => '!!!', 'class' => 'hi']);
$form->password(['value' => '!!!']);
$form->submit(['value' => 'go']);
$form->textarea(['placeholder' => '123', 'value' => '!!!']);
$form->close();

$form2 = new Form();
$form2->open(['action' => 'index.php', 'method' => 'POST']);
$form2->input(['type' => 'text', 'placeholder' => 'Ваше имя', 'name' => 'name']);
$form2->password(['placeholder' => 'Ваш пароль', 'name' => 'pass']);
$form2->submit(['value' => 'Отправить']);
$form2->close();