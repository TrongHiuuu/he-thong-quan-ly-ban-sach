 <?php
    
    function getSupplierByID($id){
        $sql = 'SELECT * FROM nhacungcap WHERE idNCC='.$id;
        return getOne($sql);
    }

    
    function isSupplierExist($ten, $email, $dienthoai, $diachi){
        $sql = 'SELECT idNCC FROM nhacungcap 
        WHERE tenNCC = "'.$ten.'" or email= "'.$email.'" or dienthoai= "'.$dienthoai.'" or diachi = "'.$diachi.'"';
       return getOne($sql)!=null;
    }


    function addSupplier($tenNCC, $email, $dienthoai, $diachi){
        $sql='INSERT INTO nhacungcap(tenNCC, email, dienthoai, diachi, trangthai) VALUES ("'.$tenNCC.'","'.$email.'","'.$dienthoai.'","'.$diachi.'",1)';
        insert($sql);
    }
   
    

//     function editSupplier($idNCC, $trangthai){
//         $sql = 
//         'UPDATE nhacungcap
//         SET trangthai = '.$trangthai.'
//         WHERE idNCC = '.$idNCC;
//         edit($sql);
//     }

//     function lockSupplier($id){
//         $sql = 
//         'UPDATE nhacungcap
//         SET trangthai = 0
//         WHERE idNCC = '.$id;
//         edit($sql);
//     }

//     function unlockSupplier($id){
//         $sql = 
//         'UPDATE nhacungcap
//         SET trangthai = 1
//         WHERE idNCC = '.$id;
//         edit($sql);
//     }
?> 