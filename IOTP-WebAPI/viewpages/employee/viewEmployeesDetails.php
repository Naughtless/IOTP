<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    <link rel="stylesheet" href="../../css/progress.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../css/style.css"/>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    <title>Employee Details</title>
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
                    <a href="index.php?action=goBack" class="active">
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
            <div class="top">
                <div class="title">
                    <div class="text"></div>
                </div>
                <!---cards in employee info page-->
                <div class="users" style="margin-top: 0.6rem;">
                    <div class="container">
                        <ul class="cards">
                            <!---back button-->
                            <li>
                                <a href="index.php?action=goBack" style="margin-left: 0.9rem;">
                                    <span class="iconify" data-icon="eva:arrow-ios-back-outline"
                                          style="width: 250%; height: 5%; color: #fff; margin-left: 0.5rem;"></span>
                                </a>
                            </li>

                            <!---employee info-->
                            <li class="card-a" style="margin-left: 1.9rem;">
                                <div class="body">
                                    <div class="card-emp"
                                         style="margin-left: 1.8rem; margin-bottom: 1rem; width: 750px; height: 312px;">
                                        <div class="content">
                                            <div class="emp-info">
                                                <ul class="info">
                                                    <li><img src="<?php echo $selectedEmployee->getImagePath(); ?>"
                                                             alt=""
                                                             style="width: 59px; height: 59px"></li>
                                                    <li>
                                                        <!-- Employee Name -->
                                                        <h3 class="whee"
                                                            style="margin-top: 0.9rem; margin-left: 0.7rem;">
                                                            <?php echo $selectedEmployee->getName(); ?>
                                                        </h3>

                                                        <!-- Employee ID -->
                                                        <h4 class="whoo" style="text-align:start; margin-left: 0.7rem">
                                                            <?php echo $selectedEmployee->getID(); ?>
                                                        </h4>
                                                    </li>
                                                    <li>
                                                        <div class="vertical"></div>
                                                    </li>
                                                    <li>
                                                        <!-- Department -->
                                                        <h3 class="whee"
                                                            style="margin-top: 0.9rem; margin-left: 0.7rem;">
                                                            <?php echo $selectedEmployee->getDepartment(); ?>
                                                        </h3>

                                                        <!-- Role -->
                                                        <h4 class="whoo" style="text-align:start; margin-left: 0.7rem">
                                                            <?php echo $selectedEmployee->getRole(); ?>
                                                        </h4>
                                                    </li>
                                                    <li>
                                                        <div class="vertical"></div>
                                                    </li>
                                                    <li>
                                                        <h3 class="whee"
                                                            style="margin-top: 0.9rem; margin-left: 0.7rem;">
                                                            Shift Schedule
                                                        </h3>
                                                        <h4 class="whoo" style="text-align:start; margin-left: 0.7rem">
                                                            <?php echo $selectedEmployee->getShiftStart() ?>
                                                            -
                                                            <?php echo $selectedEmployee->getShiftEnd() ?>
                                                        </h4>
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul class="info-plus">
                                                <li>
                                                    <div class="icon-bg1">
                                                        <span class="iconify" data-icon="akar-icons:clock"
                                                              style="width: 55px; height: 55px; color: #5D5D81;"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h3 class="whee" style="margin-top: 2rem; margin-left: 0.7rem;">
                                                        Shift Timing
                                                    </h3>
                                                    <h4 class="whoo" style="text-align:start; margin-left: 0.7rem">
                                                        <?php echo $selectedEmployee->getShiftStart() ?>
                                                    </h4>
                                                    <h4 class="whoo" style="text-align:start; margin-left: 0.7rem">
                                                        until
                                                    </h4>
                                                    <h4 class="whoo" style="text-align:start; margin-left: 0.7rem">
                                                        <?php echo $selectedEmployee->getShiftEnd() ?>
                                                    </h4>
                                                </li>
                                                <li>
                                                    <ul class="log-bg" id="login">
                                                        <li>
                                                            <div class="icon-bg2">
                                                                <span class="iconify" data-icon="lucide:log-in"
                                                                      style="width: 37px; height: 37px; color: #5D5D81;"></span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h3 class="whee"
                                                                style="margin-top: 0.7rem; margin-left: 0.3rem;">
                                                                Logged In
                                                            </h3>
                                                            <h4 class="whoo"
                                                                style="text-align:start; margin-left: 0.3rem">
                                                                <?php echo $lastLogin; ?>
                                                            </h4>
                                                        </li>
                                                    </ul>
                                                    <ul class="log-bg" id="logout">
                                                        <li>
                                                            <div class="icon-bg2">
                                                                <span class="iconify" data-icon="lucide:log-in"
                                                                      style="width: 37px; height: 37px; color: #5D5D81; transform: scaleX(-1);"></span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <h3 class="whee"
                                                                style="margin-top: 0.7rem; margin-left: 0.3rem;">
                                                                Logged Out
                                                            </h3>
                                                            <h4 class="whoo"
                                                                style="text-align:start; margin-left: 0.3rem">
                                                                (no data)
                                                            </h4>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li>
                                                    <!---GAUGE chart goes HERE-->
                                                    <div class="gauge-chart" id="gauge-chart">
                                                        <script>
                                                            let options2 = {
                                                                chart: {
                                                                    fontFamily: 'Red Rose',
                                                                    height: 250,
                                                                    type: "radialBar"
                                                                },

                                                                series: [<?php echo $selectedEmployee->getActivityPercentage(); ?>],
                                                                colors: ["#5D5D81"],

                                                                plotOptions: {
                                                                    radialBar: {
                                                                        offsetY: -10,
                                                                        startAngle: -80,
                                                                        endAngle: 80,
                                                                        track: {
                                                                            background: '#E5E3EE',
                                                                            startAngle: -80,
                                                                            endAngle: 80,
                                                                            dropShadow: {
                                                                                enabled: true,
                                                                                top: 2,
                                                                                left: 0,
                                                                                blur: 4,
                                                                                opacity: 0.15
                                                                            }
                                                                        },

                                                                        dataLabels: {
                                                                            showOn: "always",
                                                                            name: {
                                                                                offsetY: -20,
                                                                                show: true,
                                                                                color: "#888",
                                                                                fontSize: "15px",
                                                                            },
                                                                            value: {
                                                                                color: "#5D5D81",
                                                                                fontSize: "20px",
                                                                                offsetX: 10,
                                                                                offsetY: -15,
                                                                                show: true

                                                                            }
                                                                        }
                                                                    }
                                                                },
                                                                fill: {
                                                                    type: "gradient",
                                                                    gradient: {
                                                                        shade: "dark",
                                                                        type: "vertical",
                                                                        gradientToColors: ["#ACA5C8"],
                                                                        stops: [0, 100]
                                                                    }
                                                                },

                                                                stroke: {
                                                                    lineCap: "round",
                                                                },
                                                                labels: ["Active"]
                                                            };

                                                            let chart2 = new ApexCharts(document.querySelector("#gauge-chart"), options2);
                                                            chart2.render();
                                                        </script>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!---weekly percentage-->
                                <div class="body">
                                    <div class="card-emp"
                                         style="margin-left: 1.8rem; margin-bottom: 1rem; width: 750px; height: 466px;">
                                        <div class="content" style="margin-left: 59px; margin-top: 2.5rem">
                                            <ul class="chart-info">
                                                <li>
                                                    <h3 class="whee" style="font-size: x-large; color:#5D5D81"> Weekly
                                                        Attendance </h3>
                                                    <h3 class="whee"
                                                        style="font-size: x-large; color:#5D5D81; margin-top: 0.4rem;">
                                                        Percentage </h3>
                                                </li>
                                                <li>
                                                    <div class="dropdown" style="">
                                                        <input type="text" class="box" placeholder="June" readonly>
                                                        <div class="option">
                                                            <div onclick="show('January')" class="fill">January</div>
                                                            <div onclick="show('February')" class="fill">February</div>
                                                            <div onclick="show('March')" class="fill">March</div>
                                                            <div onclick="show('April')" class="fill">April</div>
                                                            <div onclick="show('June')" class="fill">June</div>
                                                            <div onclick="show('July')" class="fill">July</div>
                                                            <div onclick="show('August')" class="fill">August</div>
                                                            <div onclick="show('September')" class="fill">September
                                                            </div>
                                                            <div onclick="show('October')" class="fill">October</div>
                                                            <div onclick="show('November')" class="fill">November</div>
                                                            <div onclick="show('December')" class="fill">December</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="bar">
                                                <div id="bars-emp"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button-emp">
                                        <button class="details">Download Chart</button>
                                    </div>
                                </div>
                            </li>

                            <!---calendar-->
                            <li class="card-b">
                                <div class="body">
                                    <div class="card-emp"
                                         style="margin-left: 1.rem; margin-right: 3rem; margin-bottom: 1rem; width: fit-content; height: 1060px;">
                                        <div class="content">
                                            <ul class="calendar-title">
                                                <li>
                                                    <div class="date-preview">
                                                        <h3 class="whee" style="font-weight: 100; color:#fff"> JUN </h3>
                                                        <h3 class="whee" style="color:#fff">32</h3>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="date-caption" style="margin-top: 2.5rem; ">
                                                        <h3 class="whee" style=""> Calendar </h3>
                                                        <h3 class="whee" style="font-weight: 100; font-size: medium;">
                                                            Upcoming schedules</h3>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="cal-bg">
                                                <section class="calendar">
                                                    <h1 style="font-family: 'Red Rose';">June 2022</h1>
                                                    <form action="#">
                                                        <label class="weekday">Mo</label>
                                                        <label class="weekday">Tu</label>
                                                        <label class="weekday">We</label>
                                                        <label class="weekday">Th</label>
                                                        <label class="weekday">Fr</label>
                                                        <label class="weekday">Sa</label>
                                                        <label class="weekday">Su</label>
                                                        <label class="day invalid" data-day="0">
                                                            <input class="appointment" date-day="-4"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>-4</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day invalid" data-day="1">
                                                            <input class="appointment" date-day="-3"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>-3</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day invalid" data-day="2">
                                                            <input class="appointment" date-day="-2"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>-2</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day invalid" data-day="3">
                                                            <input class="appointment" date-day="-1"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>-1</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day invalid" data-day="4">
                                                            <input class="appointment" date-day="0"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>0</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="5">
                                                            <input class="appointment" date-day="1"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>1</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="6">
                                                            <input class="appointment" date-day="2"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>2</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="7">
                                                            <input class="appointment" date-day="3"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>3</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="8">
                                                            <input class="appointment" date-day="4"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>4</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="9">
                                                            <input class="appointment" date-day="5"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>5</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="10">
                                                            <input class="appointment" date-day="6"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>6</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="11">
                                                            <input class="appointment" date-day="7"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>7</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="12">
                                                            <input class="appointment" date-day="8"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>8</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="13">
                                                            <input class="appointment" date-day="9"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>9</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="14">
                                                            <input class="appointment" date-day="10"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>10</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="15">
                                                            <input class="appointment" date-day="11"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>11</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="16">
                                                            <input class="appointment" date-day="12"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>12</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="17">
                                                            <input class="appointment" date-day="13"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>13</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="18">
                                                            <input class="appointment" date-day="14"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>14</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="19">
                                                            <input class="appointment" date-day="15"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>15</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="20">
                                                            <input class="appointment" date-day="16"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>16</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="21">
                                                            <input class="appointment" date-day="17"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>17</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="22">
                                                            <input class="appointment" date-day="18"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>18</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="23">
                                                            <input class="appointment" date-day="19"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>19</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="24">
                                                            <input class="appointment" date-day="20"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>20</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="25">
                                                            <input class="appointment" date-day="21"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>21</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="26">
                                                            <input class="appointment" date-day="22"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>22</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="27">
                                                            <input class="appointment" date-day="23"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>23</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="28">
                                                            <input class="appointment" date-day="24"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>24</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="29">
                                                            <input class="appointment" date-day="25"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>25</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="30">
                                                            <input class="appointment" date-day="26"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>26</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="31">
                                                            <input class="appointment" date-day="27"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>27</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="32">
                                                            <input class="appointment" date-day="28"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>28</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="33">
                                                            <input class="appointment" date-day="29"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>29</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="34">
                                                            <input class="appointment" date-day="30"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>30</span>
                                                            <em></em>
                                                        </label>
                                                        <label class="day" data-day="35">
                                                            <input class="appointment" date-day="31"
                                                                   placeholder="What would you like to do?"
                                                                   required="true" type="text">
                                                            <span>31</span>
                                                            <em></em>
                                                        </label>
                                                        <div class="clearfix"></div>
                                                    </form>
                                                </section>
                                            </div>
                                            <div class="calendar-legends">
                                                <div class="circle"
                                                     style="background-color: #ACA5C8; margin-left: 48%;"></div>
                                                <h4 class="legend">Late</h4>
                                                <div class="circle" style="background-color: #F0BE82;"></div>
                                                <h4 class="legend">Leave</h4>
                                            </div>
                                            <div class="requests-list" style="">
                                                <!---leave late req-->
                                                <h3 class="whee" style="">Leave/Late Requests</h3>
                                                <ul class="req-boxes">
                                                    <li>
                                                        <div class="req-box">
                                                            <h3 class="whoo">10</h3>
                                                            <h3 class="whoo" style="background-color: #F0BE82;">12</h3>
                                                            <h3 class="whoo">17</h3>
                                                            <h3 class="whoo" style="background-color: #F0BE82;">18</h3>
                                                            <h3 class="whoo">21</h3>
                                                            <h3 class="whoo">25</h3>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="req-box">
                                                            <h3 class="whoo" style="background-color: #F0BE82;">28</h3>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <!---pending req-->
                                                <h3 class="whee" style="margin-top: 0.9rem;">Pending/Cancelled
                                                    Requests</h3>
                                                <ul class="req-boxes">
                                                    <li>
                                                        <div class="req-box">
                                                            <h3 class="whoo">27</h3>
                                                            <h3 class="whoo">30</h3>
                                                            <h3 class="whoo" style="background-color: #BA494B;">03</h3>
                                                            <h3 class="whoo" style="background-color: #BA494B;">08</h3>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!---meetings-->
                                            <div class="meetings">
                                                <h3 class="whee" style="margin-top: 1.3rem; margin-left: 2.5rem;">
                                                    Meetings</h3>
                                                <div class="emp-info">
                                                    <ul class="info">
                                                        <li><img src="../../assets/pp/generic-male-9.png" alt=""
                                                                 style="width: 45px; height: 45px"></li>
                                                        <li>
                                                            <h3 class="whee"
                                                                style="width: fit-content; margin-left: 0.5rem; font-size: large; margin-top: 3px;">
                                                                Dello H. </h3>
                                                            <h4 class="whoo"
                                                                style="width: fit-content; margin-left: 0.5rem; font-size: 100;">
                                                                Topic: UI UX</h4>
                                                        </li>
                                                        <li>
                                                            <div class="vertical-line"></div>
                                                        </li>
                                                        <li>
                                                            <h4 class="whoo"
                                                                style="width: fit-content; margin-top: 5px; margin-left: 1.3rem; font-size: small; background-color: #E5E3EE; border-radius: 50px; padding: 2px; padding-left: 10px; padding-right: 10px;">
                                                                10-10-2022 </h4>
                                                            <h4 class="whoo"
                                                                style="width: fit-content; margin-left: 0.5rem; font-size: 300; font-weight: bold;">
                                                                09.00-10.00 AM</h4>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="emp-info" style="margin-top: 0.4rem;">
                                                    <ul class="info">
                                                        <li><img src="../../assets/pp/generic-male-9.png" alt=""
                                                                 style="width: 45px; height: 45px"></li>
                                                        <li>
                                                            <h3 class="whee"
                                                                style="width: fit-content; margin-left: 0.5rem; font-size: large; margin-top: 3px;">
                                                                Dello H. </h3>
                                                            <h4 class="whoo"
                                                                style="width: fit-content; margin-left: 0.5rem; font-size: 100;">
                                                                Topic: UI UX</h4>
                                                        </li>
                                                        <li>
                                                            <div class="vertical-line"></div>
                                                        </li>
                                                        <li>
                                                            <h4 class="whoo"
                                                                style="width: fit-content; margin-top: 5px; margin-left: 1.3rem; font-size: small; background-color: #E5E3EE; border-radius: 50px; padding: 2px; padding-left: 10px; padding-right: 10px;">
                                                                10-10-2022 </h4>
                                                            <h4 class="whoo"
                                                                style="width: fit-content; margin-left: 0.5rem; font-size: 300; font-weight: bold;">
                                                                09.00-10.00 AM</h4>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <img class="down" src="../../assets/images/down.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
        </section>
    </div>
</section>
<script type="text/javascript" src="../../js/script.js"></script>
<script type="text/javascript" src="../../js/emp-bar-chart.js"></script>
<script type="text/javascript" src="../../js/emp-charts.js"></script>
</body>
</html>
