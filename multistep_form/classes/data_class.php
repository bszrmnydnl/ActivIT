<?php

class Data extends dbConnect
{
    public function insertData($firstname, $lastname, $street, $number, $zipcode, $municipality, $iban){
        $stmt = $this->connect()->prepare('INSERT INTO `data`(`firstname`, `lastname`, `street`, `number`, `zipcode`, `municipality`, `iban`) VALUES (?,?,?,?,?,?,?)');

        if (!$stmt->execute(array($firstname, $lastname, $street, $number, $zipcode, $municipality, $iban))) {
            header('Location: ../../index.php?error=' . json_encode($stmt->errorInfo()));
            $stmt=null;
            exit();
        }

        $stmt = null;
    }

    public function selectDatas(){
        $stmt = $this->connect()->prepare('SELECT * FROM data');

        if (!$stmt->execute()) {
            header('Location: ../../index.php?error=' . json_encode($stmt->errorInfo()));
            $stmt=null;
            exit();
        }

        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $table = "";
        foreach($datas as $data){
            $table = $table . '<tr>
                                    <td>'. $data["firstname"] .'</td>
                                    <td>'. $data["lastname"] .'</td>
                                    <td>'. $data["street"] .'</td>
                                    <td>'. $data["number"] .'</td>
                                    <td>'. $data["zipcode"] .'</td>
                                    <td>'. $data["municipality"] .'</td>
                                    <td>'. $data["iban"] .'</td>
                                    <td><a class="nav-link-active" href="includes/delete_data_inc.php?iban='. $data["iban"] .'"><i class="fa fa-remove" style="padding: 2px;color: rgb(255,0,0);" ></i></a></td>
                                </tr>';
        }

        $stmt = null;
        return $table;
    }

    public function deleteData($iban){
        $stmt = $this->connect()->prepare('DELETE FROM `data` WHERE `iban` = ?;');

        if (!$stmt->execute(array($iban))) {
            header('Location: ../../index.php?error=' . json_encode($stmt->errorInfo()));
            $stmt=null;
            exit();
        }

        $stmt = null;
    }

    protected function checkIban($iban)
    {
        $stmt = $this->connect()->prepare('SELECT `iban` FROM data WHERE `iban`=?;');

        if (!$stmt->execute(array($iban))) {
            header('Location: ../../index.php?error=' . json_encode($stmt->errorInfo()));
            $stmt=null;
            exit();
        }

        $resultCheck = false;
        if ($stmt->rowCount() > 0) {
            $resultCheck = true;
        }
        return $resultCheck;
    }

}