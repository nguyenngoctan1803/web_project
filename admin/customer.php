<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php' ?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
?>
<?php
    $cus = new customer();
    if(!isset($_GET['customerid']) || $_GET['customerid']==NULL)
    {
        echo "<script>window.location ='inbox.php'</script>";
    }
    else
    {
        $id = $_GET['customerid'];
    }
 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Danh Mục</h2>               
               <div class="block copyblock" style="width:800px"> 
                    
                    <?php 
                        $get_cus = $cus->show_info($id);
                        if($get_cus)
                        {
                            while($result = $get_cus->fetch_assoc())
                            {

                         
                    ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Name</td>
                            <td>
                                <input style="width:650px;height:25px;text-align:left;margin-left:50px" type="text" readonly="readonly" value="<?php echo $result['cus_Name'] ?>" name=""class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                <input style="width:650px;height:25px;text-align:left;margin-left:50px" type="text" type="text" readonly="readonly" value="<?php echo $result['cus_Address'] ?>" name=""class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>
                                <input style="width:650px;height:25px;text-align:left;margin-left:50px" type="text" type="text" readonly="readonly" value="<?php echo $result['cus_Phone'] ?>" name=""class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input style="width:650px;height:25px;text-align:left;margin-left:50px" type="text" type="text" readonly="readonly" value="<?php echo $result['cus_Email'] ?>" name=""class="medium" />
                            </td>
                        </tr>
                    </table>
                </form>
                    <?php 
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>