<?php

/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 20/08/2015
 * Time: 21:57
 */


include_once "/../db.settings.php";

/**
 * Class simpleFieldsQuery
 */
class simpleFieldsQuery extends db
{
    protected $getStatementLink;
    protected $getTable;
    protected $getField;
    protected $getValues;
    protected $symbol;
    protected $getReturn;
    protected $getFirst;
    protected $fetchAll;

    public function __constructor()
    {

    }

    /**
     * @param null $statement , @statement, @field, @value, @return, @firstItem, @fetchAll
     * return array
     */
    public function moSimpleQuery($statement = [])
    {
        //query the database using either select or insert

        $queryOptions =
            [
                'statement' => '', 'table' => '', 'field' => '', 'value' => '', 'return' => '', 'firstItem' => '', 'fetchAll' => '',
            ];
        $statementOption = array_merge($queryOptions, $statement);
        $this->getStatementLink = $statementOption['statement'];
        $this->getTable = $statementOption['table'];
        $this->getField = $statementOption['field'];
        $this->getValues = $statementOption['value'];
        $this->getReturn = $statementOption['return'];
        $this->getFirst = $statementOption['firstItem'];
        $this->fetchAll = $statementOption['fetchAll'];

//        var_dump($statementOption);
        switch ($this->getStatementLink) {
            case 'insert': {
                $questionMark = '?, ';
                $sanitise = '';

                for ($i = 0; $i < count($this->getValues); $i++) {
                    $sanitise .= $questionMark;
                }
                $arr_Fields = null;
                foreach ($this->getField as $v) {
                    $arr_Fields .= $v . ',';
                }
                $imploded_Fields = implode(', ', explode(',', substr(implode(', ', explode(' ', $arr_Fields)), 0, -1)));

                $sanitisedStrings = substr($sanitise, 0, -2);
                $dbConn = $this->setDataBank();
                $stmt = $dbConn->prepare("INSERT INTO `{$this->getTable}` ({$imploded_Fields }) VALUES ($sanitisedStrings)");

                $items = array_combine(range(1, count($this->getField)), array_values($this->getField));
//                var_dump($items);

                $list_ = null;
                $bindPara = "";
                foreach ($items as $key => $value) {
                    $value_ = "$$value";
                    $list_ .= "$$value,";
                    $bindPara .= '$stmt->bindParam(' . "$key, $value_" . ');';
                }
                $file_bindPara = '../../debris/db.bindPara.php';

                $file_bindPara_2 = '../../../debris/db.bindPara.php';

                if (!empty($bindPara)) {
                    $openFileToWritePara = fopen($file_bindPara, 'w+');
                    fwrite($openFileToWritePara, "<?php " . $bindPara . " ?>");
                    fclose($openFileToWritePara);
                }
                if (file_exists($file_bindPara)) {
                    include_once '/../../../debris/db.bindPara.php';
                } else {
                    echo 'file does not exist; please correct the error phase 1';
                }

                $item_item_value = null;
                foreach ($this->getValues as $items_value) {
                    $item_item_value .= $items_value . ',';
                }
                $imploded_items_Fields = implode(', ', explode(',', substr(implode(', ', explode(' ', $list_)), 0, -1)));
                $imploded_items_Fields_arr = explode(',', substr(implode(', ', explode(' ', $list_)), 0, -1));

                $imploded_items_items_Values = implode(', ', explode(',', substr(implode(', ', explode(' ', $item_item_value)), 0, -1)));
                $imploded_items_items_Values_arr = explode(',', substr(implode(', ', explode(' ', $item_item_value)), 0, -1));

                $combined_arrays = array_combine($imploded_items_Fields_arr, $imploded_items_items_Values_arr);

                $i = 0;
                $final_combine = '';
                foreach ($combined_arrays as $combined_keys => $combined_values) {
                    $final_combine .= $combined_keys . "='" . $combined_values . "';";
                    $i++;
                    //another way is to write to a file and then import it back in here;
                }
                $file = '../../debris/db.insert.php';
                $file_2 = '../../../debris/db.insert.php';

                if (!empty($final_combine)) {
                    $openFileToWrite = fopen($file, 'w+');
                    fwrite($openFileToWrite, "<?php " . $final_combine . " ?>");
                    fclose($openFileToWrite);
                }
                $start = "<div style='width: 100%; margin: 0 auto; padding: 2%;box-shadow: 0 0 5px #ccc; height: auto'>";
                $end = "</div>";

                if (file_exists($file)) {
                    include_once '/../../../debris/db.insert.php';
                    try {
                        $stmt->execute();
                    } catch (PDOException $e) {
                        print($start . $e->getMessage() . "</h4></div>" . $end);
                    }
                } else {
                    echo 'file does not exist; please correct the error phase 2';
                }

            }
                break;
            default :
                //do nothing

        }


    }
}

