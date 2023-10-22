<?php
session_start();
include('db.php');
if(isset($_POST['update_btn']))
{
    $id = $_POST['id'];
    $pid = $_POST['pid'];
    $sr = $_POST['sr'];
    $area = $_POST['area'];
    $plan = $_POST['plan'];
    $hotspot = $_POST['hotspot'];

    try {

        $query = "UPDATE hot_connect SET pid=:pid, sr=:sr, area=:area, plan=:plan, hotspot=:hotspot WHERE id=:id LIMIT 1";
        $statement = $pdo_conn->prepare($query);

        $data = [
            ':pid' => $pid,
            ':sr' => $sr,
            ':area' => $area,
            ':plan' => $plan,
            ':hotspot' => $hotspot,
            ':id' => $id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
            header('Location: index.php');
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
      <link rel="icon" type="image/x-icon" href="Screenshot%202023-10-08%20195549.png">

    <title>AIRTALK MOBILE</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>UPDATE INFO
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];

                            $query = "SELECT * FROM hot_connect WHERE id=:id LIMIT 1";
                            $statement = $pdo_conn->prepare($query);
                            $data = [':id' => $id];
                            $statement->execute($data);

                            $result = $statement->fetch(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                        }
                        ?>
                        <form action="edit.php" method="POST">

                            <input type="hidden" name="id" value="<?=$result->id?>" />

                            <div class="mb-3">
                                <label>PID</label>
                                <input type="text" name="pid" value="<?= $result->pid; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>SR</label>
                                <input type="text" name="sr" value="<?= $result->sr; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>AREA</label>
                                <input type="text" name="area" value="<?= $result->area; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>PLAN</label>
                                <input type="text" name="plan" value="<?= $result->plan; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>HOTSPOT</label>
                                <input type="text" name="hotspot" value="<?= $result->hotspot; ?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_btn" class="btn btn-primary">UPDATE</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    body{background-color:rgb(15,15,15);}
    form{background-color:rgb(30,30,30); color:white;}
    .card-header{background-color:black; color:white;}
    .card-body{background-color:rgb(30,30,30);}
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>