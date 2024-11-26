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

    <title>Pending Requests</title>
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
                <li1 class="active"><a href="#">Pending</a></li1>
                <li1><a href="index.php?action=openHistory">History</a></li1>

                <li1 class="slide"></li1>
            </ul1>
        </div>


        <!---Card per employee-->
        <div class="kotak-gede2">
            <div class=container>
                <div class=body2>

                    <?php
                    if(!is_null($pendingRequests)) {
                        foreach($pendingRequests as $currentRequest) {
                            if(
                                    $currentRequest->getRequestType() == "Late"
                                OR
                                    $currentRequest->getRequestType() == 'Late'
                            ) {
                                ?>
                                <!-- Late Request -->
                                <div class=body2>
                                    <div class="card">
                                        <div class="content">
                                            <i class="fa-solid fa-comment-dots"
                                               style="margin-left: 320px; font-size: 30px; margin-top: 20px ;"></i>

                                            <!-- PP Image Path -->
                                            <div class="img2">
                                                <img src="<?php echo $currentRequest->getEmployee()->getImagePath(); ?>" alt="">
                                            </div>

                                            <div class="detail-employee">
                                                <!-- Employee ID -->
                                                <div class="ID">
                                                    ID: <?php echo $currentRequest->getEmployee()->getID(); ?>
                                                </div>

                                                <!-- Employee Name -->
                                                <div class="name-mich" style="margin-right: 20px;">
                                                    <?php echo $currentRequest->getEmployee()->getName(); ?>
                                                </div>

                                                <!-- Employee Role -->
                                                <div class="job-mich">
                                                    <?php echo $currentRequest->getEmployee()->getRole(); ?>
                                                </div>
                                            </div>
                                            <div class="Date">
                                                <div class="Dates" style="margin-left: -330px; font-weight: bold; color: #5D5D81;">
                                                    Date:
                                                </div>
                                                <!-- Request Date -->
                                                <div class="Tanggal" style="font-weight: 500;margin-top: -25px; margin-left: -130px; color: #5D5D81; ">
                                                    <?php echo $currentRequest->getDate(); ?>
                                                </div>
                                            </div>

                                            <div class="requests">
                                                <div class="Req" style="margin-top: 15px; margin-left: -301px;
                                    color: #5D5D81; font-weight: 600;">Request:
                                                </div>
                                                <!-- Request Type -->
                                                <div class="Leave" style="margin-top: -24px; margin-left: -70px;
                                    background-color: #F0BE82; width: 70px; border-radius: 8px; color: white; ">
                                                    Late
                                                </div>
                                                <!-- Request Duration -->
                                                <div class="days" style="margin-top: -24px; margin-left: 10px;
                                    background-color: #F0BE82; width: 70px; border-radius: 8px; color: white;">
                                                    <?php echo $currentRequest->getDuration(); ?> Hrs.
                                                </div>
                                            </div>
                                            <div class="Reason" style="margin-top: 15px; margin-left: -305px;
                                color: #5D5D81; font-weight: 600;">
                                                Reason:
                                            </div>
                                            <!-- Request Reason -->
                                            <div class="Late-details" style=" margin-left: 30px;
                                color: #5D5D81; width: 400px; text-align: justify;">
                                                <?php echo $currentRequest->getReason(); ?>
                                            </div>
                                            <div class="icons">
                                                <!-- Approve LATE Request -->
                                                <a href ="index.php?action=approveLateRequest&rid=<?php echo $currentRequest->getID(); ?>">
                                                    <i class="fa-solid fa-circle-check" style="font-size: 35px; margin-top: 20px; margin-right: 20px;"></i>
                                                </a>
                                                <!-- Deny Request -->
                                                <a href ="index.php?action=denyRequest&rid=<?php echo $currentRequest->getID(); ?>">
                                                    <i class="fa-solid fa-circle-xmark" style="font-size: 35px; margin-top: 20px;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }

                            else if(
                                    $currentRequest->getRequestType() == "Leave"
                                OR
                                    $currentRequest->getRequestType() == 'Leave'
                            ) {
                                ?>
                                <!-- Leave Request -->
                                <div class=body2>
                                    <div class="card">
                                        <div class="content">
                                            <i class="fa-solid fa-comment-dots"
                                               style="margin-left: 320px; font-size: 30px; margin-top: 20px ;"></i>
                                            <div class="img2">
                                                <img src="<?php echo $currentRequest->getEmployee()->getImagePath(); ?>">
                                            </div>

                                            <div class="detail-employee">
                                                <!-- Employee ID -->
                                                <div class="ID">
                                                    ID: <?php echo $currentRequest->getEmployee()->getID(); ?>
                                                </div>

                                                <!-- Employee Name -->
                                                <div class="name-mich">
                                                    <?php echo $currentRequest->getEmployee()->getName(); ?>
                                                </div>

                                                <!-- Employee Role -->
                                                <div class="job-mich">
                                                    <?php echo $currentRequest->getEmployee()->getRole(); ?>
                                                </div>
                                            </div>

                                            <div class="skill-bars">
                                                <div class="bar">
                                                    <div class="info">
                                                       <span>Credits</span>
                                                    </div>
                                                    <div class="progress-line">
                                                      <span style="width: 30%"></span>
                                                        <div class="credit-percentage">30%</div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Request Date -->
                                            <div class="date-buatLEAVE" style="margin-top: 15px;color:#5D5D81;font-weight: bold; margin-left: -325px">Date:
                                            </div>
                                            <div class="date-leave" style="font-weight: 500; color: #5D5D81; margin-top: -23px; margin-left: -150px;
                                           ">
                                                <?php echo $currentRequest->getDate(); ?>
                                            </div>


                                        <div class="requests">
                                                <div class="Req" style="color: #5D5D81; font-weight: bold; margin-left: -300px; margin-top: 15px;">Request:
                                                </div>
                                                <div class="Leave" style=" margin-left: -50px; text-align: center; margin-top: -25px;
                                          background-color: #ACA5C8; width: 70px; border-radius: 8px; color: white; ">Leave
                                                </div>
                                                <!-- Request Duration -->
                                                <div class="days" style="margin-left: 30px; text-align: center; margin-top: -25px;
                                          background-color: #ACA5C8; width: 80px; border-radius: 8px; color: white;">
                                                    <?php echo $currentRequest->getDuration(); ?> Hrs.
                                                </div>
                                        </div>

                                            <div class="Reason" style="margin-top: 15px; margin-left: -305px;
                                color: #5D5D81; font-weight: 600;">
                                                Reason:
                                            </div>

                                            <!-- Request Reason -->
                                            <div class="Late-details" style=" margin-left: 30px;
                                      color: #5D5D81; width: 400px; text-align: justify;">
                                                <?php echo $currentRequest->getReason(); ?>
                                            </div>
                                            <div class="icons">
                                                <!-- Approve LEAVE Request -->
                                                <a href="index.php?action=approveLeaveRequest&rid=<?php echo $currentRequest->getID(); ?>&eid=<?php echo $currentRequest->getEmployee()->getID(); ?>">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </a>

                                                <!-- Deny Request -->
                                                <a href="index.php?action=denyRequest&rid=<?php echo $currentRequest->getID(); ?>">
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }

                            else {
                                echo 'ERROR: Unhandled requestType: ';
                                echo $currentRequest->getRequestType();
                                echo '<br><br>';
                            }
                        }
                    }
                    else {
                        echo 'No requests found!<br>';
                    }
                    ?>

                </div>
            </div>
        </div>


        <script type="text/javascript" src="../../js/script.js"></script>
</body>
</html>