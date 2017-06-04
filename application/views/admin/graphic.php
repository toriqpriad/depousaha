<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?= $title_page ?></title>    
        <?php $this->load->view('admin/static/files'); ?>    
        <script src="<?= BACKEND_STATIC_FILES ?>plugins/chartjs/canvasjs.min.js"></script>
        <!--<script src="../../../../../../properti_ci/assets/statics/backend/plugins/" type="text/javascript"></script>-->
    </head>

    <?php
    $this->load->view('admin/include/function');
    $this->load->view('admin/include/modal');
    $this->load->view('admin/include/top_menu');
    $this->load->view('admin/include/sidebar_menu');
    ?>
    <section class="content">
        <div class="container-fluid">            
            <!-- Widgets -->
            <div class="row clearfix ">                
                <div id="chartContainer" ></div>                
            </div>

        </div>
        <!-- #END# Widgets -->
        <!-- CPU Usage -->

    </section>
    <!-- Jquery Core Js -->
    <script type="text/javascript">
        $(document).ready(function () {            
            $(function () {
                function getFixedDate(date_input) {
                    var d = new Date(date_input);
                    var curr_date = d.getDate();
                    var curr_month = d.getMonth() + 1; //Months are zero based
                    var curr_year = d.getFullYear();
                    var h = d.getHours();
                    if (h < 10) {
                        var h = '0' + h;
                    }
                    var m = d.getMinutes();
                    if (m < 10) {
                        var m = '0' + m;
                    }
                    var fixed_date = curr_date + "-" + curr_month + "-" + curr_year + " " + h + ":" + m;
                    return fixed_date;
                }

                function getElementData(input) {
                    var array = [];
                    $.each(input, function (i, val) {
                        var fixed_date = getFixedDate(val[0]);
                        array.push({"label": fixed_date, 'y': val[1]})
                    });
                    return array;
                }

                $.getJSON("<?php echo BASE_URL . 'admin/data_graphic'; ?>", function (obj) {


                    var suhu = getElementData(obj['suhu']);
                    var lembab = getElementData(obj['lembab']);
                    var cahaya = getElementData(obj['cahaya']);
                    var chart = new CanvasJS.Chart("chartContainer", {
                        theme: "theme2",
                        zoomEnabled: true,
                        animationEnabled: true,
                        title: {
                            text: "Arduino Sensor Graphic"
                        },
                        toolTip: {
                            content: "{name}: {y}"
                        },
                        axisX: {
                            labelFontSize: 13,
                        },
                        data: [
                            {
                                type: "spline",
                                showInLegend: true,
                                markerType: "circle",
                                legendText: "Temparature",
                                name: "Temparature",
                                dataPoints: suhu,
                            }, {
                                type: "spline",
                                showInLegend: true,
                                markerType: "circle",
                                legendText: "Humidity",
                                name: "Humidity",
                                dataPoints: lembab,
                            },
                            {
                                type: "spline",
                                showInLegend: true,
                                markerType: "circle",
                                legendText: "Light",
                                name: "Light",
                                dataPoints: cahaya,
                            },
                        ]
                    });
                    var updateChart = function () {
                        $.getJSON("<?php echo BASE_URL . 'admin/data_graphic'; ?>", function (obj) {
                            var suhu = getElementData(obj['suhu']);
                            var lembab = getElementData(obj['lembab']);
                            var cahaya = getElementData(obj['cahaya']);
                            chart.options.data[0].dataPoints = suhu;
                            chart.options.data[1].dataPoints = lembab;
                            chart.options.data[2].dataPoints = cahaya;
                            chart.render();
                        });
                    };

                    chart.render();
                    setInterval(function () {
                        updateChart();
                    }, 1000);
                });


            });
        })
    </script>
    <?php $this->load->view('admin/include/footer_menu'); ?>

</html>