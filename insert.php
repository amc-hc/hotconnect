<?php
include('db.php');
//to save
if(isset($_POST['save_btn']))
{
    $pid = $_POST['pid'];
    $sr = $_POST['sr'];
    $area = $_POST['area'];
    $plan = $_POST['plan'];
    $hotspot = $_POST['hotspot'];

    $query = "INSERT INTO hot_connect (pid, sr, area, plan, hotspot) VALUES (:pid, :sr, :area, :plan, :hotspot)";
    $query_run = $pdo_conn->prepare($query);

    $data = [
        ':pid' => $pid,
        ':sr' => $sr,
        ':area' => $area,
        ':plan' => $plan,
        ':hotspot' => $hotspot,
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: insert.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Inserted";
        header('Location: insert.php');
        exit(0);
    }
}

?>
<style>body{color:white;}</style>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--  <link rel="stylesheet" href="file/bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">-->
<form action="insert.php" method="POST">
    
                                <label>PID</label>
                                <input type="text" name="pid" class="" />
                            
                                <label>SR</label>
                                <input type="text" name="sr" class="" required/>
                            
                                <label>AREA</label>
                            <select align="center" name="area" required>
                                <option>---Select---</option>
                                <option>ZAMBOANGA CITY</option>
                                <option>ZAMBOANGA DEL NORTE</option>
                                <option>ZAMBOANGA SIBUGAY</option>
                            </select>
    
                                <label>PLAN</label>
                            <select align="center" name="plan" required>
                            <option>---SELECT---</option>
                            <option>PLAN 1299</option>
                            <option>PLAN 1399</option>
                            <option>PLAN 1699</option>
                            <option>PLAN 2099</option>
                            <option>PLAN 2699</option>
                            </select>
        
                                <label>HOTSPOT</label>
                            <select name="hotspot">
                            <option>---Select---</option>
                            <option>HOTSPOT</option>
                            <option>NON-HOTSPOT</option>
                            </select>
                                <button type="submit" name="save_btn" class="btn btn-primary">INSERT</button>
                        </form>