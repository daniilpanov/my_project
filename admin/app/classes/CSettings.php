<?php
namespace app\classes;


class CSettings extends MSettings
{
    public function prepareSettings($name = null)
    {
        if (is_null($name))
        {
            $response = $this->getSettings();
            while ($row = mysqli_fetch_assoc($response))
            {
                $result[] = $row;
            }
        }
        else
        {
            $response = $this->getSettings($name);
            $result = mysqli_fetch_assoc($response);
        }
        return $result;
    }

    public function saveSettings($post)
    {
        $sql = "UPDATE constants SET `value`='{$post['value']}', `translate` = '{$post['translate']}' WHERE `name` = '{$post['name']}'";
        $this->insertSettings($sql);
    }
}