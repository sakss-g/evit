<?php
    require_once "../model/database.php";
    $db = new Database();
    $data = array( '*' );
    $select = $db->select( 'user',$data );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="../assets/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../assets/js/dashboard-menu.js"></script>

    <title>Dashboard</title>

</head>
<body>
    <header>
        <div class="search-wrapper">
            <a href="#" id="bars"><span class="fa-solid fa-bars" ></span></a>
            <div class="search">
                <span class="fa fa-magnifying-glass"></span>
                <input type="search" placeholder="search"/>
            </div>
            
        </div>

        <div class="user-wrapper">
            <h4>
                <?php
                    if(isset($_COOKIE["evit_loggedin_user"])) {
                        $cookie_data = json_decode( $_COOKIE["evit_loggedin_user"], true );
                        echo $cookie_data[ 'name' ];
                    } 
                ?>
            </h4> 
            <div class = "dropdown">
                <button class="dropbtn"><span class="fa-solid fa-angle-down" id="dropdown"></span></button>
                <div class="dropdown-content">
                    <a href="../index.php">Logout</a>
                </div>
            </div>
        </div>
    </header>
    
    <div class="sidebar ">
        <a href="#" class="close"><i class="fa-solid fa-xmark"></i></a>
        <div class="company-logo">
            <h3><span class="fa fa-circle-plus"></span>EVIT Dashboard</h3>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href=""><span class="fa-solid fa-house"></span>
                    <span>Home</span></a>
                </li>
                <li>
                    <a href=""><span class="fa-solid fa-chart-simple"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href=""><span class="fa-solid fa-user"></span>
                    <span>User</span></a>
                </li>
                <li>
                    <a href=""><span class="fa-solid fa-gear"></span>
                    <span>Settings</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="board">
        <div class="user-management-container">
            <table rules="rows">
                <thead>
                    <tr class="user-header">
                        <td colspan="3" class="heading"><h2>User Management</h2></td>
                        <td colspan="2" class="export"><button class="export-button"><span class="fa-solid fa-file"></span>      Export to excel</button></td>
                    </tr>
                    <tr class="column-heading">
                        <td>#</td>
                        <td>Name</td>
                        <td>Date Created</td>
                        <td>Role</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                <?php if( $select ): 
                    foreach( $select as $s ):?>
                        <tr>
                            <td><?php echo $s['id'];?></td>
                            <td class="img-name"><img src="../assets/images/ts.jpg"><?php echo $s['name']; ?></td>
                            <td>
                                <?php 
                                    $date = strtotime( $s['date'] );
                                    echo date( 'Y/m/d', $date );
                                ?>
                            </td>
                            <td><?php echo $s['role'];?></td>
                            <td>
                                <a href="../signup.php?id=<?php echo $s['id'];?>" name="update"><span class="fa-solid fa-gear" id="action"></span></a>
                                <a href="../controller/form-action.php?id=<?php echo $s['id'];?>&&action=delete"><span class="fa-solid fa-circle-xmark"></span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                <?php endif; ?>                   
                    
                    <!-- signup.php?id=php echo $d['id']; ?>" class="update-btn"    -->
                    <!-- <tr>
                        <td>2</td>
                        <td class="img-name"><img src="../assets/images/hs.jpg">Harry Styles</td>
                        <td>1994/02/04</td>
                        <td>Publisher</td>
                        <td><span class="fa-solid fa-gear" id="action"></span> <span class="fa-solid fa-circle-xmark"></span></td>
                    </tr> -->

                    <!-- <tr>
                        <td>3</td>
                        <td class="img-name"><img src="../assets/images/cg.jpg">Conan Gray</td>
                        <td>1998/12/05</td>
                        <td>Publisher</td>
                        <td><span class="fa-solid fa-gear" id="action"></span> <span class="fa-solid fa-circle-xmark"></span></td>
                    </tr> -->
                </tbody>
            </table>

            <div class="footer">
                <h4>Showing <b>5</b> out of <b>25</b> entries</h4>
                <h4>Previous 1 2 3 4 5 Next</h4>
            </div>
        </div>
    </div>   
</body>
</html>