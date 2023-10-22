  
<div class="col-sm-3">
                <div class="card">
                    <h1>SR:
                    <font style="">
                    <?php
                         include('db.php');
                       $sql="SELECT COUNT(sr) from hot_connect WHERE sr";
                       $result=$pdo_conn-> query($sql);
                       $count = $result->fetchColumn();
                       echo $count;
                   ?>
                        |
                        PID:
                    <font style="">
        <?php
                         include('db.php');
                       $sql="SELECT count(pid) FROM hot_connect WHERE pid";
                       $result=$pdo_conn-> query($sql);
                       $count = $result->fetchColumn();
                       echo $count;
                   ?>
                   </font>
                        </font></h1>
                </div>
            </div>


<style>
    body{
        color:white;
        position: fixed;
    }
</style>