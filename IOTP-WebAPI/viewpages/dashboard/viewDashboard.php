<?php
//require_once("viewpages/dashboard/localized_js/monthlyAttendanceChart.php");
?>

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

    <title>Dashboard</title>
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

            <!-- TODO -->
            <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Search...">
            </li>

            <ul class="menu-links">
                <li class="nav-link">
                    <a href="#" class="active"> <!-- We're already here... -->
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

<!---page BODY-->
<section class="home">
    <div class="top">
        <div class="title">
            <div class="text">attendance.</div>
            <div class="date">

                <form action="index.php" id="dateSelection">
                    <input type="date" name="selectedDate">
                    <div class="button">
                        <button class="submit">submit</button>
                    </div>

                    <!-- Hidden Values -->
                    <input type="hidden" name="action" value="sortByDate">
                </form>

            </div>
        </div>

        <!---main info-->
        <div class="insight">
            <div class="all">
                <h1 class="num"><?php echo $attendanceStats[0]; ?></h1>
                <h3 class="desc">Employees</h3>
            </div>

            <div class="middle">
                <h1> | </h1>
            </div>

            <div class="ontime">
                <h1 class="num"><?php echo $attendanceStats[1]; ?></h1>
                <h3 class="desc">On time</h3>
            </div>

            <div class="middle">
                <h1> | </h1>
            </div>

            <div class="late">
                <h1 class="num"><?php echo $attendanceStats[2]; ?></h1>
                <h3 class="desc">Late</h3>
            </div>

            <div class="middle">
                <h1> | </h1>
            </div>

            <div class="absent">
                <h1 class="num"><?php echo $attendanceStats[3]; ?></h1>
                <h3 class="desc">Absent</h3>
            </div>
        </div>

        <a href="index.php?action=openEmployees">
            <div class="more">
                See more >
            </div>
        </a>


        <!---slider-->
        <div class=container>
            <ul id="slides" class="slider">

                <!-- Employee Sliders Foreach -->
                <?php
                foreach ($employees as $currentEmployee) {
                    ?>
                    <li class="employee-a">
                        <div class=body>
                            <div class="card">
                                <div class="content">

                                    <!-- Placeholder Image, for now! -->
                                    <div class="img">
                                        <img src="<?php echo $currentEmployee->getImagePath(); ?>" alt="">
                                    </div>

                                    <div class="details">
                                        <div class="name"><?php echo $currentEmployee->getName(); ?></div>
                                        <div class="job"><?php echo $currentEmployee->getRole(); ?></div>
                                    </div>

                                    <!-- Attendance Statistics -->
                                    <!-- Currently only placeholder values. Not possible to calc yet! -->
                                    <div class="media-icons">
                                        <!-- ABSENT -->
                                        <div class="absent">
                                            <h3 class="num"><?php echo $currentEmployee->getAbsentCount(); ?></h3>
                                            <h5 class="desc">absent</h5>
                                        </div>

                                        <!-- LATE -->
                                        <div class="late">
                                            <h3 class="num"><?php echo $currentEmployee->getLateCount(); ?></h3>
                                            <h5 class="desc">late</h5>
                                        </div>

                                        <!-- ONTIME -->
                                        <div class="ontime">
                                            <h3 class="num"><?php echo $currentEmployee->getOntimeCount(); ?></h3>
                                            <h5 class="desc">ontime</h5>
                                        </div>
                                    </div>

                                    <a href="<?php echo 'index.php?action=openEmployeeDetails&employeeID=';
                                    echo $currentEmployee->getID(); ?>">
                                        <div class="button">
                                            <button class="details">Employee Details</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>

    <!---attendance overview + recent attendees -->
    <div class="graph">
        <div class="gtop">
            <!-- Title -->
            <h2 class="title">attendance <br> overview.</h2>

            <!-- Year Selector Dropdown -->
            <!-- No functionality for now... -->
            <div class="dropdown">
                <input type="text" class="box" placeholder="2021" readonly>
                <div class="option">
                    <div onclick="show('2017')" class="fill">2017</div>
                    <div onclick="show('2018')" class="fill">2018</div>
                    <div onclick="show('2019')" class="fill">2019</div>
                    <div onclick="show('2020')" class="fill">2020</div>
                    <div onclick="show('2021')" class="fill">2021</div>
                    <div onclick="show('2022')" class="fill">2022</div>
                </div>
            </div>
        </div>

        <!-- This is probably the chart -->
        <div class="gfill">
            <div class="bar">
                <div id="bars">
                </div>
            </div>
        </div>
    </div>

    <!---todolist + attendance per department-->
    <div class="bottom">
        <div class="todo">
            <div class="titles">
                <h2 class="title2">recent attendees.</h2>
                <h2 class="title">attendance <br> per department</h2>
            </div>

            <!---todo box-->
            <div class="boxes">
                <div class="attendees">
                    <div class="employee">

                        <!-- RECENT ATTENDEES -->
                        <?php
                        foreach ($attendees as $currentAttendance) {
                            ?>
                            <div class="one">
                                <div class="img">
                                    <!-- Placeholder Image -->
                                    <img src="<?php echo $currentAttendance->getEmployee()->getImagePath(); ?>" alt=""
                                         width="35" height="35">
                                </div>

                                <div class="info">
                                    <div class="name"><?php echo $currentAttendance->getEmployee()->getName(); ?></div>
                                    <div class="time">
                                        <?php echo $currentAttendance->getEmployee()->getRole(); ?>
                                        |
                                        <?php echo $currentAttendance->getLastAttendance(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                        <!-- See More -->
                        <a href="index.php?action=openEmployees">
                            <div class="more"> Load More</div>
                        </a>
                    </div>
                </div>

                <!---attendance per department-->
                <div class="department">
                    <div class="dbox">
                        <!---dept 1 card-->
                        <div class="pro-bar">
                            <div class="percent-area">
                                <div class="date-tag">
                                    <span class="dept">Dept</span>
                                    <span class="num"><?php echo $departments[0]->getID(); ?></span>
                                </div>
                            </div>

                            <div class="fancy-chart">
                                <span class="chart-title"><?php echo $departments[0]->getName(); ?></span>
                                <div class="chart">
                                    <div class=attend> Attendance</div>
                                    <span class="percent-count"><?php echo $departments[0]->getAttendancePercentage(); ?></span>
                                </div>
                            </div>

                            <div class="middle">
                                <h1> | </h1>
                            </div>

                            <div class="start-time">
                                <div class="grp">
                                    <span class="title">Work Start</span>
                                    <span class="time"><?php echo $departments[0]->getWSTC(); ?></span>
                                </div>
                            </div>

                            <div class="finish-time">
                                <div class="grp">
                                    <span class="title">Work End</span>
                                    <span class="time"><?php echo $departments[0]->getWETC(); ?></span>
                                </div>
                            </div>
                        </div>

                        <!---dept 2 card-->
                        <div class="pro-bar" style="background-color: #C0CCDA;">
                            <div class="percent-area">
                                <div class="date-tag">
                                    <span class="dept">Dept</span>
                                    <span class="num"><?php echo $departments[1]->getID(); ?></span>
                                </div>
                            </div>

                            <div class="fancy-chart">
                                <span class="chart-title"><?php echo $departments[1]->getName(); ?></span>
                                <div class="chart">
                                    <div class=attend> Attendance</div>
                                    <span class="percent-count"><?php echo $departments[1]->getAttendancePercentage(); ?></span>
                                </div>
                            </div>

                            <div class="middle">
                                <h1> | </h1>
                            </div>

                            <div class="start-time">
                                <div class="grp">
                                    <span class="title">Work Start</span>
                                    <span class="time"><?php echo $departments[1]->getWSTC(); ?></span>
                                </div>
                            </div>

                            <div class="finish-time">
                                <div class="grp">
                                    <span class="title">Work End</span>
                                    <span class="time"><?php echo $departments[1]->getWETC(); ?></span>
                                </div>
                            </div>
                        </div>

                        <!---dept 3 card-->
                        <div class="pro-bar" style="background-color: #9D9CD1;">
                            <div class="percent-area">
                                <div class="date-tag">
                                    <span class="dept">Dept</span>
                                    <span class="num"><?php echo $departments[2]->getID(); ?></span>
                                </div>
                            </div>

                            <div class="fancy-chart">
                                <span class="chart-title"><?php echo $departments[2]->getName(); ?></span>
                                <div class="chart">
                                    <div class=attend> Attendance</div>
                                    <span class="percent-count"><?php echo $departments[2]->getAttendancePercentage(); ?></span>
                                </div>
                            </div>

                            <div class="middle">
                                <h1> | </h1>
                            </div>

                            <div class="start-time">
                                <div class="grp">
                                    <span class="title">Work Start</span>
                                    <span class="time"><?php echo $departments[2]->getWSTC(); ?></span>
                                </div>
                            </div>

                            <div class="finish-time">
                                <div class="grp">
                                    <span class="title">Work End</span>
                                    <span class="time"><?php echo $departments[2]->getWETC(); ?></span>
                                </div>
                            </div>
                        </div>

                        <!---dept 4 card-->
                        <div class="pro-bar" style="background-color: #C6B8A4;">
                            <div class="percent-area">
                                <div class="date-tag">
                                    <span class="dept">Dept</span>
                                    <span class="num"><?php echo $departments[3]->getID(); ?></span>
                                </div>
                            </div>

                            <div class="fancy-chart">
                                <span class="chart-title"><?php echo $departments[3]->getName(); ?></span>
                                <div class="chart">
                                    <div class=attend> Attendance</div>
                                    <span class="percent-count"><?php echo $departments[3]->getAttendancePercentage(); ?></span>
                                </div>
                            </div>

                            <div class="middle">
                                <h1> | </h1>
                            </div>

                            <div class="start-time">
                                <div class="grp">
                                    <span class="title">Work Start</span>
                                    <span class="time"><?php echo $departments[3]->getWSTC(); ?></span>
                                </div>
                            </div>

                            <div class="finish-time">
                                <div class="grp">
                                    <span class="title">Work End</span>
                                    <span class="time"><?php echo $departments[3]->getWETC(); ?></span>
                                </div>
                            </div>
                        </div>

                        <!---dept 5 card-->
                        <div class="pro-bar" style="background-color: #F0BE82;">
                            <div class="percent-area">
                                <div class="date-tag">
                                    <span class="dept">Dept</span>
                                    <span class="num"><?php echo $departments[4]->getID(); ?></span>
                                </div>
                            </div>

                            <div class="fancy-chart">
                                <span class="chart-title"><?php echo $departments[4]->getName(); ?></span>
                                <div class="chart">
                                    <div class=attend> Attendance</div>
                                    <span class="percent-count"><?php echo $departments[4]->getAttendancePercentage(); ?></span>
                                </div>
                            </div>

                            <div class="middle">
                                <h1> | </h1>
                            </div>

                            <div class="start-time">
                                <div class="grp">
                                    <span class="title">Work Start</span>
                                    <span class="time"><?php echo $departments[4]->getWSTC(); ?></span>
                                </div>
                            </div>

                            <div class="finish-time">
                                <div class="grp">
                                    <span class="title">Work End</span>
                                    <span class="time"><?php echo $departments[4]->getWETC(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="../../js/script.js"></script>
</body>
</html>
