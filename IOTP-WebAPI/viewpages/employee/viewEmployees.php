<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../../css/progress.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <title>Employees</title>
</head>
<body>
<!---menu header (logo, profile)-->
<nav class="sidebar">
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

            <ul class="">

                <!-- To Dashboard -->
                <li class="menu-links">
                    <a href="index.php?action=openDashboard">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <!-- Already Here -->
                <li class="nav-link">
                    <a href="#" class="active">
                        <i class='bx bx-bar-chart-alt-2 icon'></i>
                        <span class="text nav-text">Employees</span>
                    </a>
                </li>

                <!-- Open Requests -->
                <li class="nav-link">
                    <a href="index.php?action=openRequests">
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

<!---page EMPLOYEE BODY-->
<section class="home" style="overflow-x: hidden;">
    <div class="container">
        <section class="main"> <!---<< ini yg buat graphics-->
            <div class="top" style="height: 480px;">
                <div class="title">
                    <div class="text"> </div>
                    <div class="date">
                        <input type="date">
                    </div>
                </div>
                <!---cards in employee page-->
                <div class="users" style="margin-top: 0.6rem;">
                    <div class= container>
                        <ul class="cards">
                            <!---attendees of the month-->
                            <li class="card-a">
                                <div class= "body">
                                    <div class="card-emp" style="margin-left: 1.8rem; width: 284px;">
                                        <div class="content">
                                            <h3 style="font-size:x-large; margin-top: 1rem; margin-left: 3.7rem">Attendees of the</h3>
                                            <h3 style="font-size:x-large; margin-top: -0.2rem; margin-left: 11rem">Month</h3>


                                            <?php
                                            $number = 1;
                                            foreach($mostActive as $currentEmployee) {
                                                ?>
                                                <div class="one">
                                                    <div class ="number">
                                                        <h3> <?php echo $number ?>. </h3>
                                                    </div>
                                                    <div class="img">
                                                        <img src="<?php echo $currentEmployee->getImagePath(); ?>" alt="">
                                                    </div>
                                                    <div class="info">
                                                        <div class="name"><?php echo $currentEmployee->getName(); ?></div>
                                                        <div class="dept"><?php echo $currentEmployee->getDepartment(); ?></div>

                                                        <div class="progress" style="height: 12%; margin-top: 0.2rem;">
                                                            <?php
                                                            $ontimeCount = $currentEmployee->getOntimeCount();
                                                            $lateCount = $currentEmployee->getLateCount();
                                                            $absentCount = $currentEmployee->getAbsentCount();

                                                            $sumCount = $ontimeCount + $lateCount + $absentCount;
                                                            ?>
                                                            <!-- Ontime -->
                                                            <div class="progress-bar progress-bar-striped active" role="progressbar" style="width:<?php echo ($ontimeCount/$sumCount*100); ?>%; background-color: #BECDE0;"></div>
                                                            <!-- Late -->
                                                            <div class="progress-bar progress-bar-striped active" role="progressbar" style="width:<?php echo ($lateCount/$sumCount*100); ?>%; background-color: #BA494B;"></div>
                                                            <!-- Absent -->
                                                            <div class="progress-bar progress-bar-striped active" role="progressbar" style="width:<?php echo ($absentCount/$sumCount*100); ?>%; background-color: #CCCED0;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                ++$number;
                                            }
                                            ?>


                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!---least active attendees of the month-->
                            <li class="card-b">
                                <div class= body>
                                    <div class="card-emp" style="width: 321px;">
                                        <div class="content">
                                            <h3 style="font-size:x-large; margin-top: 1rem; margin-left: 1.4rem">Least Active Attendees</h3>
                                            <h3 style="font-size:x-large; margin-top: -0.2rem; margin-left: 9.2rem">of the Month</h3>

                                            <?php
                                            $number = 1;
                                            foreach($leastActive as $currentEmployee) {
                                                ?>
                                                <div class="one">
                                                    <div class ="number">
                                                        <h3> <?php echo $number ?>. </h3>
                                                    </div>
                                                    <div class="img">
                                                        <img src="<?php echo $currentEmployee->getImagePath(); ?>" alt="">
                                                    </div>
                                                    <div class="info">
                                                        <div class="name"><?php echo $currentEmployee->getName(); ?></div>
                                                        <div class="dept"><?php echo $currentEmployee->getDepartment(); ?></div>
                                                        <div class="progress" style="height: 12%; margin-top: 0.2rem;">
                                                            <?php
                                                            $ontimeCount = $currentEmployee->getOntimeCount();
                                                            $lateCount = $currentEmployee->getLateCount();
                                                            $absentCount = $currentEmployee->getAbsentCount();

                                                            $sumCount = $ontimeCount + $lateCount + $absentCount;
                                                            ?>
                                                            <!-- Ontime -->
                                                            <div class="progress-bar progress-bar-striped active" role="progressbar" style="width:<?php echo ($ontimeCount/$sumCount*100); ?>%; background-color: #BECDE0;"></div>
                                                            <!-- Late -->
                                                            <div class="progress-bar progress-bar-striped active" role="progressbar" style="width:<?php echo ($lateCount/$sumCount*100); ?>%; background-color: #BA494B;"></div>
                                                            <!-- Absent -->
                                                            <div class="progress-bar progress-bar-striped active" role="progressbar" style="width:<?php echo ($absentCount/$sumCount*100); ?>%; background-color: #CCCED0;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                ++$number;
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!---weekly chart-->
                            <li class="card-c">
                                <div class= "body">
                                    <div class="card-emp" style="height: 270px; width: 340px">
                                        <div class="content">
                                            <h3 style="font-size:x-large; margin-top: 1rem; margin-left: 6.6rem">Employee Weekly</h3>
                                            <h3 style="font-size:x-large; margin-top: -0.2rem; margin-left: 6.2rem;">Attendance Chart</h3>
                                            <!---LINE chart goes HERE-->
                                            <div class="line-chart" id="line-chart"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="circle" style="background-color: #BECDE0; margin-left: 27%;"></div>
                                <h4 class="legend">Present</h4>
                                <div class="circle" style="background-color: #BA494B;"></div>
                                <h4 class="legend">Late</h4>
                                <div class="circle" style="background-color: #CCCED0;"></div>
                                <h4 class="legend">On leave</h4>
                            </li>

                            <!---messages-->
                            <li class="card-d">
                                <div class= "body">
                                    <div class="card-emp" style="width: 221px; height: 400px;">
                                        <div class="content">
                                            <h3 style="font-size:x-large; text-align: center; margin-top: 1rem; margin-bottom: 1.2rem;">Messages</h3>
                                            <div class="two">
                                                <div class="img">
                                                    <img src="../../assets/pp/generic-male-4.png" alt="">
                                                </div>
                                                <div class="msg">
                                                    <div class="name">Jae Kool</div>
                                                    <div class="time">3 minutes ago</div>
                                                </div>
                                            </div>

                                            <div class="two">
                                                <div class="img">
                                                    <img src="../../assets/pp/generic-male-7.png" alt="">
                                                </div>
                                                <div class="msg">
                                                    <div class="name">Mark Mi</div>
                                                    <div class="time">12 minutes ago</div>
                                                </div>
                                            </div>

                                            <div class="two">
                                                <div class="img">
                                                    <img src="../../assets/pp/generic-male-8.png" alt="">
                                                </div>
                                                <div class="msg">
                                                    <div class="name">Mi Na</div>
                                                    <div class="time">49 minutes ago</div>
                                                </div>
                                            </div>

                                            <div class="two">
                                                <div class="img">
                                                    <img src="../../assets/pp/generic-male-10.png" alt="">
                                                </div>
                                                <div class="msg">
                                                    <div class="name">Taek Lho</div>
                                                    <div class="time">7 hours ago</div>
                                                </div>
                                            </div>

                                            <div class="button" style="display: inline-block; margin-right: 1.7rem;">
                                                <button class="details">Show all</button>
                                            </div>

                                            <div class="img-msg" style="">
                                                <img src="../../assets/images/msgnotip.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <h1 class="title">employees list.</h1>
                    </div>
                </div>

                <!---employee table-->
                <section class="attendance">
                    <div class="attendance-list">
                        <table class="table" id="table">
                            <thead>
                            <tr>
                                <th colspan="2">Employee Name</th>
                                <th class="th-dept">Department</th>
                                <th class="th-late">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Activity</th>
                                <th class="th-leave">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Leave Quota</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            foreach ($employees as $currentEmployee) {
                                ?>
                                <!-- EMPLOYEE -->
                                <tr class="active">
                                    <td>
                                        <img class="pic-beta" src="<?php echo $currentEmployee->getImagePath(); ?>" alt="">
                                    </td>

                                    <td>
                                        <a href="<?php echo 'index.php?action=openDetails&employeeID='; echo $currentEmployee->getID(); ?>">
                                            <ul class="employee-name">
                                                <li>
                                                    <h3 class="whee"> <?php echo $currentEmployee->getName(); ?> </h3>
                                                    <h4 class="whoo"><?php echo $currentEmployee->getID(); ?></h4>
                                                </li>
                                            </ul>
                                        </a>
                                    </td>
                                    <td>
                                        <h3 class="wheee"> <?php echo $currentEmployee->getDepartment(); ?> </h3>
                                        <h4 class="whooo"><?php echo $currentEmployee->getRole(); ?></h4>
                                    </td>

                                    <!-- LATE CIRCLE CHART -->
                                    <td>
                                        <div class="pie animate" style="--p:<?php echo $currentEmployee->getActivityPercentage(); ?>"> <?php echo $currentEmployee->getActivityPercentage(); ?>%</div>
                                    </td>

                                    <!-- ONLEAVE CIRCLE CHART -->
                                    <td>
                                        <div class="pie animate" style="--p:<?php echo ($currentEmployee->getLeaveQuota() / 5 * 100) ?>"> <?php echo $currentEmployee->getLeaveQuota(); ?>/5</div>
                                    </td>

                                    <!-- STATUS -->
                                    <td>
                                        <?php
                                        if ($currentEmployee->getStatus() == "Active") {
                                            echo '<h3 class="status" style="background-color: #86AE89;">Active</h3>';
                                        } else if ($currentEmployee->getStatus() == "On Leave") {
                                            echo '<h3 class="status" style="background-color: #BA494B;">On Leave</h3>';
                                        }
                                        ?>
                                    </td>

                                    <!-- ICON BUTTONS -->
                                    <td>
                                        <span class="iconify" data-icon="majesticons:mail" style="color: #3A3355; width: 160%; height: 160%;"></span>
                                    </td>
                                    <td>
                                        <span class="iconify" data-icon="ant-design:message-filled" style="color: #3A3355; width: 140%; height: 140%;"></span>
                                    </td>
                                    <td></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </section>
        </section>
    </div>
</section>
<script type="text/javascript" src="../../js/script.js"></script>
<script type="text/javascript" src="../../js/emp-charts.js"></script>
</body>
</html>
