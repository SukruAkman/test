<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LIST PAGE</title>
    <?php require_once('../services/ui/links.php');
          require_once('../services/database.php')  ?>
  </head>
  <body>
    
    <div class="container">
        <div class="col-md-8  ms-auto me-auto mt-5">
        <table class="table table-striped ">
        <div class="d-flex justify-content-between">     
        <h3>Person List</h3>
        <a href="add.php" type="button"class="btn btn-sm p-2 btn-success">ADD</a> 
        </div>   
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">JobID</th>
                <th scope="col">Job</th>
                <th scope="col">Process</th>
                </tr>
            </thead>
            <tbody>
                <?php 
      if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                 $page_no = $_GET['page_no'];
        } else {
                $page_no = 1;
        }
        $total_records_per_page = 5;
        $offset = ($page_no-1) * $total_records_per_page;
        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;
        $adjacents = "2";
        $result_count = $veritabaniBaglantisi->query("SELECT COUNT(*) As total_records FROM iletisim",PDO::FETCH_ASSOC);
        foreach ($result_count as $item)
        {
            $total_records=$item["total_records"];
        }
         $total_no_of_pages = ceil($total_records / $total_records_per_page);
           

                $sorgu = $veritabaniBaglantisi->query("SELECT * FROM kisiler INNER JOIN meslek ON meslek_id=meslek.meslekID  LIMIT $offset, $total_records_per_page",PDO::FETCH_ASSOC);
                foreach($sorgu as $item) {  ?>
                <tr>
                <th><?php echo $item["id"];?></th>
                <td><?php echo $item["adi"];?></td>
                <td><?php echo $item["soyadi"];?></td>
                <td><?php echo $item["yas"];?></td>
                <td><?php echo $item["cinsiyet"];?></td>
                <td><?php echo $item["meslek_id"];?></td>
                <td><?php echo $item["meslekAdi"];?></td>
                <td>
                    <a href="update.php?select=<?php echo $item["id"] ?>" type="button"class="btn btn-sm btn-primary">Update</a> 
                     <a href="edit.php?del=<?php echo $item["id"]?>" onclick='Onayla()' type="button"class="btn  btn-sm btn-danger">Delete</a>  
                     <a href='?select=<?php echo $item["id"]?>' type="button"class="btn  btn-sm btn-warning">Info</a>  
                 
                </td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
        <div class="d-flex">
            <div class="p-2">
                <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
            </div>
            <nav aria-label="...">
                <ul class="pagination">
                    <?php if($page_no <= 1){?>
                            <li class="page-item disabled"><a class="page-link" href='?page_no=1'>First Page</a></li>
                            <li class="page-item disabled"><a class="page-link" href='?page_no=1'>Previous</a> </li>
                            <?php } else { ?>
                                <li class="page-item "><a class="page-link" href='?page_no=1'>First Page</a></li>
                                <li class="page-item "><a class="page-link" href='?page_no=<?php echo $previous_page?>'>Previous</a> </li><?php  } ?>
                    <?php for ($page = 1; $page <= $total_no_of_pages; $page++){
                        if ($page == $page_no) { ?>
                            <li class="page-item active"><a class="page-link" href='?page_no=<?php echo $page?>'><?php echo $page?></a></li>
                            <?php  }else{ ?>
                                <li class="page-item "><a class="page-link" href='?page_no=<?php echo $page?>'><?php echo $page?></a></li>
                                <?php } } ?>
                        
                        <?php if($page_no < $total_no_of_pages){?>
                            <li class="page-item"><a class="page-link" href='?page_no=<?php echo $next_page?>'>Next</a></li>
                            <li class="page-item"><a class="page-link" href='?page_no=<?php echo $total_no_of_pages?>'>Last</a></li>
                        <?php } else { ?>
                            <li class="page-item disabled"><a class="page-link" href='?page_no=<?php echo $next_page?>'>Next</a></li>
                            <li class="page-item disabled"><a class="page-link" href='?page_no=<?php echo $total_no_of_pages?>'>Last</a></li>
                        <?php } ?>
                </ul>
            </nav>
        </div>

        <table class="table table-warning ">
        <h3 class="mt-3">Info</h3>
        <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">FullAddress</th>
    </tr>
  </thead>
  <tbody>
    <?php //INFO
    $gelenId=@$_GET["select"]; 
    if(!empty($gelenId)){
    $sorgu = $veritabaniBaglantisi->query("SELECT * FROM iletisim WHERE kisi_id='$gelenId'",PDO::FETCH_ASSOC);
    foreach($sorgu as $kayit){
    ?>
    <tr>
    <th scope="row"><?php echo $kayit["kisi_id"];?></th>
      <th scope="row"><?php echo $kayit["email"];?></th>
      <td><?php echo $kayit["ulke"];?></td>
      <td><?php echo $kayit["sehir"];?></td>
      <td><?php echo $kayit["tamAdres"];?></td>
    </tr>
    <?php } }?>
  </tbody>
</table>
        </div>
    </div>
   
    <?php require_once('../services/ui/scripts.php') ?>
  </body>
</html>