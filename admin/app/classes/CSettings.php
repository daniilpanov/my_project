<?php
namespace app\classes;


class CSettings extends MSettings
{
    public function prepareSettings()
    {
        $response = $this->getSettings();
        while ($row = mysqli_fetch_assoc($response))
        {
            $result[] = $row;
        }
        return $result;
    }

    public function saveSettings($post)
    {
        foreach ($post as $value)
        {
            $sql = "UPDATE constants SET `value`='{$value['value']}', `translate` = '{$value['translate']}' WHERE `name` = '{$value['name']}'";
            $this->insertSettings($sql);
        }
    }
}