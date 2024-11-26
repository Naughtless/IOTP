<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/lightslider.css">
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/lightslider.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://kit.fontawesome.com/ea88689856.js" crossorigin="anonymous"></script>

    <title>Requests History</title>
</head>
<body>
<nav class="sidebar">
    <!---menu header (logo, profile)-->
    <header>
        <div class="text">skæn.</div>
        <div class="image-text">
            <!-- Placeholder profile picture until I find a way to setup a prof pic sys -->
            <span class="image">
                    <img src="<?php echo $imagePath; ?>" alt="">
                </span>

            <div class="text logo-text">
                <span class="name"><?php echo $empName; ?></span>
                <span class="profession"><?php echo $empRole; ?></span>
            </div>
        </div>

        <a href="#">
            <i class='bx bx-chevron-right toggle'></i>
        </a>
    </header>

    <!---menu list-->
    <div class="menu-bar">
        <div class="menu">
            <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Search...">
            </li>

            <ul class="menu-links">
                <li class="nav-link">
                    <a href="index.php?action=openDashboard">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="index.php?action=openEmployees">
                        <i class='bx bx-bar-chart-alt-2 icon'></i>
                        <span class="text nav-text">Employees</span>
                    </a>
                </li>

                <li class="nav-link">
                    <!-- We're already here... -->
                    <a href="#" class="active">
                        <i class='bx bx-line-chart icon'></i>
                        <span class="text nav-text">Requests</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="index.php?action=logout">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>

            <li class="mode">
                <div class="sun-moon">
                    <i class='bx bx-moon icon moon'></i>
                    <i class='bx bx-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
        </div>
    </div>
</nav>

<!---page BODY-->
<section class="home">
    <div class="top">
        <div class="title">
            <div class="text"> requests.</div>
            <div class="title">
                <div class="date">
                    <input type="date">
                </div>
            </div>
        </div>

        <!---Pending and History-->

        <div class="Pending&History">
            <ul1>
                <li1><a href="index.php?action=openPending">Pending</a></li1>
                <li1 class="active"><a href="#">History</a></li1>

                <li1 class="slide"></li1>
            </ul1>
        </div>


        <!---request list-->


        <div class="kotak-gede">
            <h1 class="reqlist"> Request List</h1>
            <div class="board">

                <table class="table">
                    <!-- Table Header -->
                    <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th style="text-align: center">Request</th>
                        <th style="column-width: 100px; text-align: center;">Duration</th>
                        <th style="text-align: center;">Date</th>
                        <th style="column-width: 65px; text-align: start; padding: 0px 30px;">Status</th>
                        <th></th>
                        <th style="column-width: 1px;"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    foreach($requestHistory as $currentRequest){
                        ?>
                        <tr>
                            <td class="people">
                                <!-- Placeholder Image -->
                                <img src="<?php echo $currentRequest->getEmployee()->getImagePath(); ?>" style="height: 70px;
                            width: 70px;
                            border-radius: 50%;
                            padding: 3px;" alt="">

                                <div class="people-de">
                                    <!-- Employee Name -->
                                    <h4><?php echo $currentRequest->getEmployee()->getName(); ?></h4>
                                    <!-- Employee ID -->
                                    <p><?php echo $currentRequest->getEmployee()->getID(); ?></p>
                                </div>
                            </td>
                            <td class="department">
                                <!-- Employee Department -->
                                <h3><?php echo $currentRequest->getEmployee()->getDepartment(); ?></h3>
                                <!-- Employee Role -->
                                <p><?php echo $currentRequest->getEmployee()->getRole(); ?></p>
                            </td>

                            <!-- Request Type -->
                            <?php
                            if($currentRequest->getRequestType() == "Leave") {
                                echo '<td class="req">Leave</td>';
                            }
                            else if($currentRequest->getRequestType() == "Late") {
                                echo '<td class="req-kuning">Late</td>';
                            }
                            ?>

                            <!-- Request Duration -->
                            <td class="Duration"><?php echo $currentRequest->getDuration(); ?> Hour(s)</td>

                            <!-- Request Date -->
                            <td class="Date-bagianHistory"><?php echo $currentRequest->getDate(); ?></td>

                            <!-- Request Status -->
                            <?php
                            if($currentRequest->getStatus() == "Accepted") {
                                echo '<td class="Status-acc">Accepted</td>';
                            }
                            else if($currentRequest->getStatus() == "Cancelled") {
                                echo '<td class="Status-cancel">Cancelled</td>';
                            }
                            else if($currentRequest->getStatus() == "Declined") {
                                echo '<td class="Status-decline">Declined</td>';
                            }
                            ?>



                            <!-- Button Icons -->
                            <td class="icons-edit">
                                <i class="fa-solid fa-pen-to-square " style="color: darkgray;"></i>
                                <i class="fa-solid fa-comment-dots" style="margin-left: 20px;"></i>
                            </td>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>


        <script type="text/javascript" src="../../js/script.js"></script>
        <script type="text/javascript" src="../../js/Pending&history.js"></script>

</body>
</html>