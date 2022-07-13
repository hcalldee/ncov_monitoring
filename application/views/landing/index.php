<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/8/84/Coronavirus_Disease_Mitigation_Acceleration_Task_Force.jpg" type="image/ico"> -->
    <link rel="icon" href="https://cdn.pixabay.com/photo/2012/04/11/11/55/letter-n-27733_1280.png" type="image/ico">
    <!-- Title -->
    <title><?= $judul ?></title>

    <!-- Favicon -->
    <!-- <link rel="icon" href="<?= base_url('assets/vendor/fancy/'); ?> img/core-img/favicon.ico"> -->

    <!-- Core Stylesheet -->
    <link href="<?= base_url('assets/vendor/fancy/'); ?>style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="<?= base_url('assets/vendor/fancy/'); ?>css/responsive/responsive.css" rel="stylesheet">

</head>


<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="loader">
            <span class="inner1"></span>
            <span class="inner2"></span>
            <span class="inner3"></span>
        </div>
    </div>

    <!-- Search Form Area -->
    <div class="fancy-search-form d-flex align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Close Btn -->
                    <div class="search-close-btn" id="closeBtn">
                        <i class="ti-close" aria-hidden="true"></i>
                    </div>
                    <!-- Form -->
                    <form action="#" method="get">
                        <input type="search" name="fancySearch" id="search" placeholder="| Enter Your Search...">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg align-items-center">
                        <a class="navbar-brand" href="index.html">Ncov Monitoring</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fancyNav" aria-controls="fancyNav" aria-expanded="false" aria-label="Toggle navigation"><span class="ti-menu"></span></button>
                        <div class="collapse navbar-collapse" id="fancyNav">
                            <ul class="navbar-nav ml-auto">
                                <!-- <li class="nav-item active">
                                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="index.html">Home</a>
                                        <a class="dropdown-item" href="static-page.html">Static Page</a>
                                        <a class="dropdown-item" href="contact.html">Contact</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Work</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="static-page.html">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Shop</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('index.php/auth') ?>">Login</a>
                                </li>
                            </ul>
                            <!-- Search & Shop Btn Area -->
                            <!-- <div class="fancy-search-and-shop-area">
                                <a id="search-btn" href="#"><i class="icon_search" aria-hidden="true"></i></a>
                                <a id="shop-btn" href="#"><i class="icon_bag_alt" aria-hidden="true"></i></a>
                            </div> -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Hero Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url(assets/img/jumbotron/rs.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <!-- Video Overview -->

                        <h2>Memonitoring Pasien COVID-19</h2>
                        <!-- <a href="#" class="btn fancy-btn fancy-active">About Us</a> -->
                        <a href="<?= base_url('index.php/auth') ?>" class="btn fancy-btn">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Hero Area End ***** -->

    <!-- ***** Top Feature Area Start ***** -->
    <!-- <div class="fancy-top-features-area bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fancy-top-features-content">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-4">
                                <div class="single-top-feature">
                                    <h5><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Reliability</h5>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="single-top-feature">
                                    <h5><i class="fa fa-clock-o" aria-hidden="true"></i> Expertise</h5>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="single-top-feature">
                                    <h5><i class="fa fa-diamond" aria-hidden="true"></i> Quality</h5>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- ***** Top Feature Area End ***** -->

    <!-- ***** Skills Area Start ***** -->
    <section class="fancy-skills-area section-padding-10 mt-4">
        <!-- Side Thumb -->
        <div class="skills-side-thumb">
            <!-- <img src="assets/vendor/fancy/img/bg-img/skills.png" alt=""> -->
        </div>
        <!-- Skills Content -->
        <div class="container">
            <div class="row">
                <div class="card"></div>
                <div class="col-md-12 ml-auto">
                    <!-- <div class="section-heading">
                        <h2>Grafik Data Pasien</h2>
                        <p>We stay on top of our industry by being experts in yours. We measure our success by the results we drive for our clients.</p>
                    </div> -->
                    <div class="row">
                        <div class="col-12">
                            <!-- <div class="fancy-features-content shadow mb-5"> -->
                            <div class="row no-gutters">
                                <h2>Grafik Data Pasien</h2>
                                <div class="col-md-12 ">
                                    <p>Berikut adalah grafik data pasien yang sedang kami monitoring</p>
                                    <div class="single-top-feature rounded">
                                        <canvas id="myBarChart" style="display: block; width: 667px; height: 320px;" width="667" height="320" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ***** Skills Area End ***** -->

    <!-- ***** Service Area Start ***** -->
    <section class="fancy-services-area bg-img bg-overlay section-padding-100-70" style="background-image: url(assets/img/jumbotron/rs.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading heading-white text-center">
                        <h2>Our Services</h2>
                        <p>Membantu Tenaga Medis untuk melakukan pengelolaan dan monitoring data pasien corona secara berkala</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Service -->
                <div class="col-12 col-md-4">
                    <div class="single-service-area text-center wow fadeInUp" data-wow-delay="0.5s">
                        <i class="ti-user"></i>
                        <h5>Dokter</h5>
                        <p>Dapat Membuat Resep Untuk Pasien, dan memantau perkembangan kesehatan pasien.</p>
                    </div>
                </div>
                <!-- Single Service -->
                <div class="col-12 col-md-4">
                    <div class="single-service-area text-center wow fadeInUp" data-wow-delay="1s">
                        <i class="ti-desktop"></i>
                        <h5>Perawat</h5>
                        <p>Melakukan penyimpanan data pasien secara berkala, membantu dokter dalam memantau pasien secara tidak langsung.</p>
                    </div>
                </div>
                <!-- Single Service -->
                <div class="col-12 col-md-4">
                    <div class="single-service-area text-center wow fadeInUp" data-wow-delay="1.5s">
                        <i class="ti-announcement"></i>
                        <h5>Supervisor</h5>
                        <p>Sebagai Pengelola Penjadwalan Monitoring Pasien, membuat jadwal tindakan untuk para perawat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Service Area End ***** -->


    <!-- footer -->
    <footer class="sticky-footer fancy-bg-dark p-5">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span style="color: #36715c">PEMWEBLAN <?= date('Y'); ?></span>
            </div>
        </div>
    </footer>

    <!-- ***** Footer Area Start ***** -->
    <!-- <footer class="fancy-footer-area fancy-bg-dark">
        <div class="footer-content section-padding-80-50">
            <div class="container">
                <div class="row">
                    <span>Copyright &copy; PEMWEBLAN <?= date('Y'); ?></span>
                </div>
            </div>
        </div> -->
    <!-- Footer Copywrite -->
    <!-- </footer> -->
    <!-- ***** Footer Area End ***** -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?= base_url('assets/vendor/fancy/'); ?>js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?= base_url('assets/vendor/fancy/'); ?>js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="<?= base_url('assets/vendor/fancy/'); ?>js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?= base_url('assets/vendor/fancy/'); ?>js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="<?= base_url('assets/vendor/fancy/'); ?>js/active.js"></script>
    <script src="<?= base_url('assets/vendor/chart.js/'); ?>Chart.js"></script>
    <script>
        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Bar Chart Example
        // var label = [];
        // var value = [];
        // for (var i in data) {
        //     label.push(data[i].year);
        //     value.push(data[i].number of data);
        // }
        var ctx = document.getElementById("myBarChart");

        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Total Pasien", "Pasien Dalam Pengawasan", "Orang Dalam Pemantauan", "Pasien Positif"],
                datasets: [{
                    label: "Jumlah : ",
                    backgroundColor: "#201840",
                    hoverBackgroundColor: "#0e0536",
                    borderColor: "#4e73df",
                    data: [<?= $total ?>, <?= $pdp ?>, <?= $odp ?>, <?= $positif ?>],
                }],
            },

            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                title: {
                    display: false,
                    text: 'Grafik Data Pasien'
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 150,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: <?= $total ?>,
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            // borderDash: [2],
                            // zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return number_format(tooltipItem.yLabel) + ' Orang';
                        }
                    }
                },
            }
        });

        // var ctx = document.getElementById("myBarChart");

        // var myBarChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //         labels: ["Total Pasien", "Pasien Dalam Pengawasan", "Orang Dalam Pemantauan", "Pasien Positif"],
        //         datasets: [{
        //             label: "Revenue",
        //             backgroundColor: "#4e73df",
        //             hoverBackgroundColor: "#2e59d9",
        //             borderColor: "#4e73df",
        //             data: [],
        //         }],
        //     },
        //     options: {
        //         maintainAspectRatio: false,
        //         layout: {
        //             padding: {
        //                 left: 10,
        //                 right: 25,
        //                 top: 25,
        //                 bottom: 0
        //             }
        //         },
        //         scales: {
        //             xAxes: [{
        //                 time: {
        //                     unit: 'month'
        //                 },
        //                 gridLines: {
        //                     display: false,
        //                     drawBorder: false
        //                 },
        //                 ticks: {
        //                     maxTicksLimit: 6
        //                 },
        //                 maxBarThickness: 25,
        //             }],
        //             yAxes: [{
        //                 ticks: {
        //                     min: 0,
        //                     max: 15000,
        //                     maxTicksLimit: 5,
        //                     padding: 10,
        //                     // Include a dollar sign in the ticks
        //                     callback: function(value, index, values) {
        //                         return number_format(value);
        //                     }
        //                 },
        //                 gridLines: {
        //                     color: "rgb(234, 236, 244)",
        //                     zeroLineColor: "rgb(234, 236, 244)",
        //                     drawBorder: false,
        //                     borderDash: [2],
        //                     zeroLineBorderDash: [2]
        //                 }
        //             }],
        //         },
        //         legend: {
        //             display: false
        //         },
        //         tooltips: {
        //             titleMarginBottom: 10,
        //             titleFontColor: '#6e707e',
        //             titleFontSize: 14,
        //             backgroundColor: "rgb(255,255,255)",
        //             bodyFontColor: "#858796",
        //             borderColor: '#dddfeb',
        //             borderWidth: 1,
        //             xPadding: 15,
        //             yPadding: 15,
        //             displayColors: false,
        //             caretPadding: 10,
        //             callbacks: {
        //                 label: function(tooltipItem, chart) {
        //                     var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
        //                     return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        //                 }
        //             }
        //         },
        //     }
        // });
    </script>
</body>