<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Status Awareness System</title>
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
        <link href="css/site.css" rel="stylesheet" type="text/css" />
        <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="scripts/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/customstyle3.css">
        <style>
            hr {
                display: block;
                margin-top: 0.5em;
                margin-bottom: 0.5em;
                margin-left: 12px;
                margin-right: auto;
                border-style: inset;
                border-width: 2px;
                border-color: #000;
            }
        </style>
        <script type="text/javascript">

            $(window).load(function () {
                $(".se-pre-con").fadeOut("slow");
                callUnsolved();
            });

            $(".demo1").css("height", "820px");

            $.ajax({
                url: "performancetest_total.php",
                type: "POST",
                data: ''
            })
                    .success(function (result) {

                        var obj = jQuery.parseJSON(result);
                        if (obj != '')
                        {
                            $('#unsolvednumber').html(obj["slow"]);
                            $('#unsolved').css("background-color", "#c00000");
                        }
                    });

            $.ajax({
                url: "performancetest_total.php",
                type: "POST",
                data: ''
            })
                    .success(function (result) {

                        var obj = jQuery.parseJSON(result);
                        if (obj != '')
                        {

                            $('#closednumber').html(obj["medium"]);

                            $('#closed').css("background-color", "#ffc000");


                        }

                    });

            $.ajax({
                url: "performancetest_total.php",
                type: "POST",
                data: ''
            })
                    .success(function (result) {

                        var obj = jQuery.parseJSON(result);
                        if (obj != '')
                        {

                            $('#totalnumber').html(obj["fast"]);

                            $('#total').css("background-color", "#00b050");


                        }

                    });

            var auto_refresh = setInterval(
                    function ()
                    {

                        $.ajax({
                            url: "helpticketitem_unsolved.php",
                            type: "POST",
                            data: ''
                        })
                                .success(function (result) {
                                    //alert("Success!");
                                    var obj = jQuery.parseJSON(result);
                                    if (obj != '')
                                    {

                                        $.each(obj, function (key, val) {

                                            //$('#errortopic').html(val["name"]);	
                                            $('#slownumber').html(val["count"]);


                                            $('#slowcount').css("background-color", "#c00000");

                                        });
                                    }

                                });

                        $.ajax({
                            url: "helpticketitem_closed.php",
                            type: "POST",
                            data: ''
                        })
                                .success(function (result) {

                                    var obj = jQuery.parseJSON(result);
                                    if (obj != '')
                                    {

                                        $('#closednumber').html(obj["count"]);

                                        $('#closed').css("background-color", "#ffc000");

                                    }

                                });

                        $.ajax({
                            url: "helpticketitem_total.php",
                            type: "POST",
                            data: ''
                        })
                                .success(function (result) {

                                    var obj = jQuery.parseJSON(result);
                                    if (obj != '')
                                    {

                                        $('#totalnumber').html(obj["count"]);

                                        $('#total').css("background-color", "#00b050");


                                    }

                                });

                    }, 36000);


            window.onload = function () {
                var dataPoints1 = [];
                var dataPoints2 = [];
                var dataPoints3 = [];

                var dataPoints4 = [];
                var dataPoints5 = [];
                var dataPoints6 = [];

                var totalPageSpeed = 0;
                var totalRestSpeed = 0;
                var totalRef = 0;

                var averagePageSpeed = 0;
                var averageRestSpeed = 0;
                var averageRef = 0;

                var totalPageSpeedx = 0;
                var totalRestSpeedx = 0;
                var totalRefx = 0;

                var averagePageSpeedx = 0;
                var averageRestSpeedx = 0;
                var averageRefx = 0;

                var chart1 = new CanvasJS.Chart("chart1", {
                    dataPointMaxWidth: 50,
                    zoomEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "",
                        fontSize: 30
                    },
                    toolTip: {
                        shared: true
                    },
                    theme: "theme2",
                    legend: {
                        fontFamily: "Open Sans",
                        verticalAlign: "top",
                        horizontalAlign: "center",
                        fontSize: 14,
                        fontWeight: "bold",
                        fontColor: "dimGrey"
                    },
                    axisX: {
                        titleFontFamily: "Open Sans",
                        labelFontFamily: "Open Sans",
                        gridColor: "Silver",
                        tickColor: "silver"


                    },
                    axisY: {
                        titleFontFamily: "Open Sans",
                        labelFontFamily: "Open Sans",
                        prefix: '',
                        includeZero: false,
                        lineThickness: 2,
                        gridThickness: 0,
                    },
                    data: [{
                            // dataSeries1
                            type: "column",
                            showInLegend: true,
                            lineThickness: 4,
                            legendMarkerColor: "#8064A1",
                            color: "#8064A1",
                            //color: "#47bbb3",
                            name: "PAGE SPEED",
                            dataPoints: dataPoints1
                        },
                        {
                            // dataSeries2
                            type: "line",
                            showInLegend: true,
                            lineThickness: 4,
                            markerType: "no marker",
                            // markerSize: 12, 
                            // markerColor: "#E9887D",
                            // markerBorderColor: "#e72711",
                            // markerBorderThickness: 2,
                            color: "#c00000",
                            name: "Slow",
                            dataPoints: dataPoints2
                        },
                        {
                            // dataSeries3
                            type: "line",
                            showInLegend: true,
                            lineThickness: 4,
                            markerType: "no marker",
                            color: "#00B050",
                            name: "Fast",
                            dataPoints: dataPoints3
                        }],
                    legend:{
                        cursor: "pointer",
                        fontFamily: "Open Sans",
                        fontSize: 18,
                        fontWeight: "bold",
                        itemclick: function (e) {
                            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                                e.dataSeries.visible = false;
                            } else {
                                e.dataSeries.visible = true;
                            }
                            chart1.render();
                        }
                    }
                });
                $.ajax({
                    url: "pagespeed.php",
                    type: "POST",
                    data: ''
                })
                        .success(function (result) {
                            dataPoints1 = [];
                            dataPoints2 = [];
                            dataPoints3 = [];

                            var obj = jQuery.parseJSON(result);
                            //var sortobj = sortByKey(obj, "time");
                            var pCount = 0;
                            var rstCount = 0;
                            var refCount = 0;
                            //var obj2 = jQuery.parseJSON(obj.speedPoints);
                            //alert(obj.speedPoints);	
                            //	if(obj2 != '')
                            //	{		

                            $.each(obj.speedPoints, function (key, val) {
                                //  alert('Success2');
                                pCount = pCount + 1;
                                rstCount = rstCount + 1;
                                refCount = refCount + 1;

                                dataPoints1.push({label: val.name, y: val.speed});
                                dataPoints2.push({label: val.name, y: 2000});
                                dataPoints3.push({label: val.name, y: 1000});

                                /*
                                 totalPageSpeed = totalPageSpeed+val.speed;
                                 totalRestSpeed = totalRestSpeed+val.speed;
                                 totalRef = totalRef+val.reference;
                                 */
                            });
                            /*
                             averagePageSpeed = totalPageSpeed/pCount;
                             averageRestSpeed = totalRestSpeed/rstCount;
                             averageRef = totalRef/refCount;	*/
                            //	}



                            chart1.options.data[0].dataPoints = dataPoints1;
                            chart1.options.data[1].dataPoints = dataPoints2;
                            chart1.options.data[2].dataPoints = dataPoints3;
                            chart1.options.axisY.maximum = obj.speedChartConfig.ymax;
                            chart1.options.axisY.minimum = obj.speedChartConfig.ymin;
                            chart1.options.axisX.title = obj.speedChartConfig.xlabel;
                            chart1.options.axisY.title = obj.speedChartConfig.ylabel;
                            //chart1.options.axisX.max = obj.speedChartConfig.ymax;

                            chart1.options.data[0].legendText = "Page Speed";
                            chart1.options.data[1].legendText = "Slow";
                            chart1.options.data[2].legendText = "Fast";


                            chart1.render();
                            $("#totalpagespeed").html(obj.total);
                            $("#slowpagespeed").html(obj.slow);
                            $("#mediumpagespeed").html(obj.medium);
                            $("#fastpagespeed").html(obj.fast);
                            $("#measureddatepagespeed").html(obj.measureddate);
                            $("#measuredtimepagespeed").html(obj.measuredtime);
                            $("#averagepagespeed").html(obj.averagespeed);
                        });
                var updateGraph1 = function () {
                    $.ajax({
                        url: "pagespeed.php",
                        type: "POST",
                        data: ''
                    })
                            .success(function (result) {
                                dataPoints1 = [];
                                dataPoints2 = [];
                                dataPoints3 = [];
                                var obj = jQuery.parseJSON(result);
                                //var sortobj = sortByKey(obj, "time");

                                var totalPageSpeed2 = 0;
                                var totalRestSpeed2 = 0;
                                var totalRef2 = 0;

                                var averagePageSpeed2 = 0;
                                var averageRestSpeed2 = 0;
                                var averageRef2 = 0;

                                var pCount2 = 0;
                                var rstCount2 = 0;
                                var refCount2 = 0;

                                //if(obj != '')
                                //	{					  
                                $.each(obj.speedPoints, function (key, val) {

                                    pCount2 = pCount2 + 1;
                                    rstCount2 = rstCount2 + 1;
                                    refCount2 = refCount2 + 1;

                                    dataPoints1.push({label: val.name, y: val.speed});
                                    dataPoints2.push({label: val.name, y: 2000});
                                    dataPoints3.push({label: val.name, y: 1000});
                                    /*
                                     totalPageSpeed2 = totalPageSpeed2+val.pagespeed;
                                     totalRestSpeed2 = totalRestSpeed2+val.restspeed;
                                     totalRef2 = totalRef2+val.reference;
                                     */
                                });
                                /*
                                 averagePageSpeed2 = totalPageSpeed2/pCount2;
                                 averageRestSpeed2 = totalRestSpeed2/rstCount2;
                                 averageRef2 = totalRef2/refCount2;	
                                 */

                                //	}



                                chart1.options.data[0].dataPoints = dataPoints1;
                                chart1.options.data[1].dataPoints = dataPoints2;
                                chart1.options.data[2].dataPoints = dataPoints3;
                                chart1.options.axisY.maximum = obj.speedChartConfig.ymax;
                                chart1.options.axisY.minimum = obj.speedChartConfig.ymin;
                                chart1.options.axisX.title = obj.speedChartConfig.xlabel;
                                chart1.options.axisY.title = obj.speedChartConfig.ylabel;

                                chart1.options.data[0].legendText = "Page Speed";
                                chart1.options.data[1].legendText = "Slow";
                                chart1.options.data[2].legendText = "Fast";


                                chart1.render();
                                $("#totalpagespeed").html(obj.total);
                                $("#slowpagespeed").html(obj.slow);
                                $("#mediumpagespeed").html(obj.medium);
                                $("#fastpagespeed").html(obj.fast);
                                $("#measureddatepagespeed").html(obj.measureddate);
                                $("#measuredtimepagespeed").html(obj.measuredtime);
                                $("#averagepagespeed").html(obj.averagespeed);
                            });

                };
                setInterval(function () {
                    updateGraph1()
                }, 1000);

                var chart2 = new CanvasJS.Chart("chart2", {
                    dataPointMaxWidth: 50,
                    zoomEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: "",
                        fontSize: 30
                    },
                    toolTip: {
                        shared: true
                    },
                    theme: "theme2",
                    legend: {
                        fontFamily: "Open Sans",
                        verticalAlign: "top",
                        horizontalAlign: "center",
                        fontSize: 14,
                        fontWeight: "bold",
                        fontColor: "dimGrey"
                    },
                    axisX: {
                        titleFontFamily: "Open Sans",
                        labelFontFamily: "Open Sans",
                        gridColor: "Silver",
                        tickColor: "silver"


                    },
                    axisY: {
                        titleFontFamily: "Open Sans",
                        labelFontFamily: "Open Sans",
                        prefix: '',
                        includeZero: false,
                        lineThickness: 2,
                        gridThickness: 0
                    },
                    data: [{
                            // dataSeries1
                            type: "column",
                            showInLegend: true,
                            lineThickness: 4,
                            legendMarkerColor: "#ff8533",
                            color: "#ff8533",
                            //color: "#47bbb3",
                            name: "AVERAGE REST SPEED",
                            dataPoints: dataPoints1
                        },
                        {
                            // dataSeries2
                            type: "line",
                            showInLegend: true,
                            lineThickness: 4,
                            markerType: "no marker",
                            // markerSize: 12, 
                            // markerColor: "#E9887D",
                            // markerBorderColor: "#e72711",
                            // markerBorderThickness: 2,
                            color: "#c00000",
                            name: "Slow",
                            dataPoints: dataPoints2
                        },
                        {
                            // dataSeries3
                            type: "line",
                            showInLegend: true,
                            lineThickness: 4,
                            markerType: "no marker",
                            color: "#00B050",
                            name: "Fast",
                            dataPoints: dataPoints3
                        }],
                    legend:{
                        cursor: "pointer",
                        fontFamily: "Open Sans",
                        fontSize: 18,
                        fontWeight: "bold",
                        itemclick: function (e) {
                            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                                e.dataSeries.visible = false;
                            } else {
                                e.dataSeries.visible = true;
                            }
                            chart2.render();
                        }
                    }
                });
                $.ajax({
                    url: "restspeed.php",
                    type: "POST",
                    data: ''
                })
                        .success(function (result) {
                            dataPoints4 = [];
                            dataPoints5 = [];
                            dataPoints6 = [];

                            var obj = jQuery.parseJSON(result);
                            //var sortobj = sortByKey(obj, "time");
                            var pCount = 0;
                            var rstCount = 0;
                            var refCount = 0;


                            if (obj != '')
                            {
                                $.each(obj.speedPoints, function (key, val) {
                                    pCount = pCount + 1;
                                    rstCount = rstCount + 1;
                                    refCount = refCount + 1;

                                    dataPoints4.push({label: val.name, y: val.speed});
                                    dataPoints5.push({label: val.name, y: 2000});
                                    dataPoints6.push({label: val.name, y: 1000});
                                    /*
                                     totalPageSpeedx = totalPageSpeedx+val.pagespeed;
                                     totalRestSpeedx = totalRestSpeedx+val.restspeed;
                                     totalRefx = totalRefx+val.reference;*/

                                });
                                /*	  averagePageSpeedx = totalPageSpeedx/pCount;
                                 averageRestSpeedx = totalRestSpeedx/rstCount;
                                 averageRefx = totalRefx/refCount;		 		*/
                            }



                            chart2.options.data[0].dataPoints = dataPoints4;
                            chart2.options.data[1].dataPoints = dataPoints5;
                            chart2.options.data[2].dataPoints = dataPoints6;

                            chart2.options.axisY.maximum = obj.speedChartConfig.ymax;
                            chart2.options.axisY.minimum = obj.speedChartConfig.ymin;
                            chart2.options.axisX.title = obj.speedChartConfig.xlabel;
                            chart2.options.axisY.title = obj.speedChartConfig.ylabel;

                            chart2.options.data[0].legendText = "Rest Speed";
                            chart2.options.data[1].legendText = "Slow";
                            chart2.options.data[2].legendText = "Fast";


                            chart2.render();
                            $("#totalrestspeed").html(obj.total);
                            $("#slowrestspeed").html(obj.slow);
                            $("#mediumrestspeed").html(obj.medium);
                            $("#fastrestspeed").html(obj.fast);
                            $("#measureddaterestspeed").html(obj.measureddate);
                            $("#measuredtimerestspeed").html(obj.measuredtime);
                            $("#averagerestspeed").html(obj.averagespeed);
                        });
                var updateGraph2 = function () {
                    $.ajax({
                        url: "restspeed.php",
                        type: "POST",
                        data: ''
                    })
                            .success(function (result) {
                                dataPoints4 = [];
                                dataPoints5 = [];
                                dataPoints6 = [];
                                var obj = jQuery.parseJSON(result);
                                //var sortobj = sortByKey(obj, "time");

                                var totalPageSpeedx2 = 0;
                                var totalRestSpeedx2 = 0;
                                var totalRefx2 = 0;

                                var averagePageSpeedx2 = 0;
                                var averageRestSpeedx2 = 0;
                                var averageRefx2 = 0;

                                var pCount2 = 0;
                                var rstCount2 = 0;
                                var refCount2 = 0;

                                if (obj != '')
                                {
                                    $.each(obj.speedPoints, function (key, val) {

                                        pCount2 = pCount2 + 1;
                                        rstCount2 = rstCount2 + 1;
                                        refCount2 = refCount2 + 1;

                                        dataPoints4.push({label: val.name, y: val.speed});
                                        dataPoints5.push({label: val.name, y: 2000});
                                        dataPoints6.push({label: val.name, y: 1000});
                                        /*
                                         totalPageSpeedx2 = totalPageSpeedx2+val.pagespeed;
                                         totalRestSpeedx2 = totalRestSpeedx2+val.restspeed;
                                         totalRefx2 = totalRefx2+val.reference;*/

                                    });
                                    /*
                                     averagePageSpeedx2 = totalPageSpeedx2/pCount2;
                                     averageRestSpeedx2 = totalRestSpeedx2/rstCount2;
                                     averageRefx2 = totalRefx2/refCount2; */

                                }



                                chart2.options.data[0].dataPoints = dataPoints4;
                                chart2.options.data[1].dataPoints = dataPoints5;
                                chart2.options.data[2].dataPoints = dataPoints6;

                                chart2.options.axisY.maximum = obj.speedChartConfig.ymax;
                                chart2.options.axisY.minimum = obj.speedChartConfig.ymin;
                                chart2.options.axisX.title = obj.speedChartConfig.xlabel;
                                chart2.options.axisY.title = obj.speedChartConfig.ylabel;

                                chart1.options.data[0].legendText = "Rest Speed";
                                chart2.options.data[1].legendText = "Slow";
                                chart2.options.data[2].legendText = "Fast";


                                chart2.render();
                                $("#totalrestspeed").html(obj.total);
                                $("#slowrestspeed").html(obj.slow);
                                $("#mediumrestspeed").html(obj.medium);
                                $("#fastrestspeed").html(obj.fast);
                                $("#measureddaterestspeed").html(obj.measureddate);
                                $("#measuredtimerestspeed").html(obj.measuredtime);
                                $("#averagerestspeed").html(obj.averagespeed);
                            });

                };
                setInterval(function () {
                    updateGraph2()
                }, 1000);

            }
        </script>
        <script type="text/javascript" src="scripts/canvasjs.min.js"></script>
    </head>
    <body>
        <div class="se-pre-con"></div> 

        <?php ?>
        <div class="container-fluid" style="height:100%;">
            <div class="row" style="height:100%;">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12" id="slowcount">
                            <br>
                            <p id="slowtopic">SLOW</p>
                            <br>
                            <p id="slownumber"></p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12" id="mediumcount">
                            <br>
                            <p id="mediumtopic">MEDIUM</p>
                            <br>
                            <p id="mediumnumber"></p>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-12" id="fastcount">
                            <br>
                            <p id="fasttopic">FAST</p>
                            <br>
                            <p id="fastnumber"></p>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-12" id="totalcount">
                            <br>
                            <p id="totaltopic">TOTAL</p>
                            <br>
                            <p id="totalnumber"></p>
                        </div>

                    </div>

                </div>

                <div class="col-md-8" style="height:100%;">
                    <div class="row" style="height:100%;">
                        <div class="col-md-12" id="helpticket">


                            <div id="highlight">
                                <br>
                                <p id="topic2">CRM/HRM Server Performance</p>
                            </div>



                            <div class="panel panel-default">

                                <div class="panel-body">
                                    <div class="row">
                                        <br>
                                        <div id="chartContainer" style="border-top-right-radias: 15px; margin-top: 0px; margin-left: 0px; height: 180px; width: 100%;">
                                            <div class="col-md-12" id="pstopic">
                                                <p id="pagespeedtopic" style="font-family:Open Sans; font-weight: 600; font-size: 16pt;">&emsp;Sugar Page Speed</p><hr>
                                            </div>
                                            <div class="col-md-6" id="info1" style="padding-bottom:20px;">
                                                <table style="width:80%; margin-left:20px;">
                                                    <tr style="padding:15px 20px 15px 15px"><td>Total</td><td style="text-align: right;"><p id="totalpagespeed"></p></td><td style="text-align: right;">Pages</td></tr>
                                                    <tr style="padding:15px 20px 15px 15px"><td>Slow</td><td style="text-align: right;"><p id="slowpagespeed"></p></td><td style="text-align: right;">Pages</td></tr>
                                                    <tr style="padding:15px 20px 15px 15px"><td>Medium</td><td style="text-align: right;"><p id="mediumpagespeed"></p></td><td style="text-align: right;">Pages</td></tr>
                                                    <tr style="padding:15px 20px 15px 15px"><td>Fast</td><td style="text-align: right;"><p id="fastpagespeed"></p></td><td style="text-align: right;">Pages</td></tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6" id="info2">
                                                <table style="width:80%; margin-left:80px; padding-bottom:20px;">
                                                    <tr style="padding:15px 20px 15px 15px"><td>Measured on date</td><td style="text-align: right;"><p id="measureddatepagespeed"></p></td></tr>
                                                    <tr style="padding:15px 20px 15px 15px"><td>Measured time</td><td style="text-align: right;"><p id="measuredtimepagespeed"></p></td></tr>
                                                    <tr style="padding:15px 20px 15px 15px; font-weight:600;"><td>Average Page Speed (ms)</td><td style="text-align: right;"><p id="averagepagespeed"></p></td></tr>
                                                </table>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="col-md-12" id="chart1" style="border-top-right-radias: 15px; margin-left: 15px; height: 420px; width: 100%;">
                                            </div>

                                            <div class="col-md-12" id="rstopic" style="margin-top: 40px;">
                                                <p id="restspeedtopic" style="font-family:Open Sans; font-weight: 600; font-size: 16pt;">&emsp;Sugar Rest Speed</p><hr>
                                            </div>
                                            <div class="col-md-6" id="info3" style="padding-bottom:20px;">
                                                <table style="width:80%; margin-left:20px;">
                                                    <tr style="padding:15px 20px 15px 15px"><td>Total</td><td style="text-align: right;"><p id="totalrestspeed"></p></td><td style="text-align: right;">Pages</td></tr>
                                                    <tr style="padding:15px 20px 15px 15px"><td>Slow</td><td style="text-align: right;"><p id="slowrestspeed"></p></td><td style="text-align: right;">Pages</td></tr>
                                                    <tr style="padding:15px 20px 15px 15px"><td>Medium</td><td style="text-align: right;"><p id="mediumrestspeed"></p></td><td style="text-align: right;">Pages</td></tr>
                                                    <tr style="padding:15px 20px 15px 15px"><td>Fast</td><td style="text-align: right;"><p id="fastrestspeed"></p></td><td style="text-align: right;">Pages</td></tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6" id="info4">
                                                <table style="width:80%; margin-left:80px; padding-bottom:20px;">
                                                    <tr style="padding:15px 20px 15px 15px"><td>Measured on date</td><td style="text-align: right;"><p id="measureddaterestspeed"></p></td></tr>
                                                    <tr style="padding:15px 20px 15px 15px"><td>Measured time</td><td style="text-align: right;"><p id="measuredtimerestspeed"></td></tr>
                                                    <tr style="padding:15px 20px 15px 15px; font-weight:600;"><td>Average Rest Speed (ms)</td><td style="text-align: right;"><p id="averagerestspeed"></p></td></tr>
                                                </table>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="col-md-12" id="chart2" style="border-top-right-radias: 15px; margin-left: 15px; height: 420px; width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer" style="display: none;"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script type="text/javascript">
            var auto_refresh2;
            var auto_refresh3;
            var auto_refresh4;
            //var countunsolved;
            //var countclosed;
            //var count;
            function callUnsolved() {
                //	alert("Call Unsolved Success!");
                var countunsolved = 0;
                $.ajax({
                    url: "helptickets.php",
                    type: "POST",
                    data: ''
                })
                        .success(function (result) {

                            var obj = jQuery.parseJSON(result);
                            if (obj != '')
                            {

                                var count = 1;
                                $(".demo1").empty();
                                $(".demo1").css("height", "820px");

                                $.each(obj, function (key, val) {

                                    var image = count % 7;

                                    var status = val["status"];
                                    var ul;
                                    if (status == "Second Level") {

                                        if (val["type"] == "Recent") {
                                            ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                            ul = ul + "<td><img src='images/Siren.gif' width='20px'></td><td><img id='imgnow' class='objblink' src='images/Recent.png' width='60px'></td>";
                                            ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                            ul = ul + "</tr></table></li>";
                                        } else if (val["type"] == "Preceding") {
                                            ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                            ul = ul + "<td><img src='images/Siren.gif' width='20px'></td><td><img class='swingimage' src='images/" + image + ".png' width='60px'></td>";
                                            ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                            ul = ul + "</tr></table></li>";
                                        }
                                    } else {
                                        if (val["type"] == "Recent") {
                                            ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                            ul = ul + "<td><img src='images/Siren2.gif' width='20px'></td><td><img id='imgnow' class='objblink' src='images/Recent.png' width='60px'></td>";
                                            ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                            ul = ul + "</tr></table></li>";
                                        } else if (val["type"] == "Preceding") {
                                            ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                            ul = ul + "<td><img src='images/Siren2.gif' width='20px'></td><td><img class='swingimage' src='images/" + image + ".png' width='60px'></td>";
                                            ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                            ul = ul + "</tr></table></li>";
                                        }

                                    }
                                    $('.demo1').append(ul);
                                    count = count + 1;
                                });
                            }
                            //countunsolved = count-1;
                        });

                //countunsolved = count-1;

                auto_refresh2 = setInterval(
                        function ()
                        {
                            $.ajax({
                                url: "helptickets.php",
                                type: "POST",
                                data: ''
                            })
                                    .success(function (result) {

                                        var obj = jQuery.parseJSON(result);
                                        if (obj != '')
                                        {

                                            var count = 1;
                                            $(".demo1").empty();
                                            $(".demo1").css("height", "820px");

                                            $.each(obj, function (key, val) {

                                                var image = count % 7;

                                                var status = val["status"];
                                                var ul;
                                                if (status == "Second Level") {

                                                    if (val["type"] == "Recent") {
                                                        ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                                        ul = ul + "<td><img src='images/Siren.gif' width='20px'></td><td><img id='imgnow' class='objblink' src='images/Recent.png' width='60px'></td>";
                                                        ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                                        ul = ul + "</tr></table></li>";
                                                    } else if (val["type"] == "Preceding") {
                                                        ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                                        ul = ul + "<td><img src='images/Siren.gif' width='20px'></td><td><img class='swingimage' src='images/" + image + ".png' width='60px'></td>";
                                                        ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                                        ul = ul + "</tr></table></li>";
                                                    }
                                                } else {
                                                    if (val["type"] == "Recent") {
                                                        ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                                        ul = ul + "<td><img src='images/Siren2.gif' width='20px'></td><td><img id='imgnow' class='objblink' src='images/Recent.png' width='60px'></td>";
                                                        ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                                        ul = ul + "</tr></table></li>";
                                                    } else if (val["type"] == "Preceding") {
                                                        ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                                        ul = ul + "<td><img src='images/Siren2.gif' width='20px'></td><td><img class='swingimage' src='images/" + image + ".png' width='60px'></td>";
                                                        ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                                        ul = ul + "</tr></table></li>";
                                                    }

                                                }
                                                $('.demo1').append(ul);
                                                count = count + 1;
                                                //alert(count);
                                            });
                                        }
                                        //	countunsolved = count-1;
                                        //	alert(count-1);
                                        //	countunsolved = count-1;
                                    });
                            //  alert(countunsolved);
                            //alert(countunsolved);
                            // alert(countunsolved);
                            //var x = countunsolved*2000;
                            //alert(x);
                        }, 27000);
                //callUnsolved()

                //  callUnsolved();

            }
            function callClosed() {
                //	alert("Call Unsolved Success!");
                var countclosed = 0;
                $.ajax({
                    url: "helptickets_closed.php",
                    type: "POST",
                    data: ''
                })
                        .success(function (result) {

                            var obj = jQuery.parseJSON(result);
                            if (obj != '')
                            {

                                var count = 1;
                                $(".demo1").empty();
                                $(".demo1").css("height", "820px");

                                $.each(obj, function (key, val) {

                                    var image = count % 7;

                                    var status = val["status"];
                                    var ul;
                                    if (status == "Second Level") {

                                        if (val["type"] == "Recent") {
                                            ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                            ul = ul + "<td><img src='images/Siren.gif' width='20px'></td><td><img id='imgnow' class='objblink' src='images/Recent.png' width='60px'></td>";
                                            ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                            ul = ul + "</tr></table></li>";
                                        } else if (val["type"] == "Preceding") {
                                            ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                            ul = ul + "<td><img src='images/Siren.gif' width='20px'></td><td><img class='swingimage' src='images/" + image + ".png' width='60px'></td>";
                                            ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                            ul = ul + "</tr></table></li>";
                                        }
                                    } else {
                                        if (val["type"] == "Recent") {
                                            ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                            ul = ul + "<td><img src='images/Siren2.gif' width='20px'></td><td><img id='imgnow' class='objblink' src='images/Recent.png' width='60px'></td>";
                                            ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                            ul = ul + "</tr></table></li>";
                                        } else if (val["type"] == "Preceding") {
                                            ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                            ul = ul + "<td><img src='images/Siren2.gif' width='20px'></td><td><img class='swingimage' src='images/" + image + ".png' width='60px'></td>";
                                            ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                            ul = ul + "</tr></table></li>";
                                        }

                                    }
                                    $('.demo1').append(ul);
                                    count = count + 1;
                                });
                            }
                            //countclosed = count-1;
                        });
                //countclosed = count-1;
                //var countclosed;
                auto_refresh3 = setInterval(
                        function ()
                        {
                            $.ajax({
                                url: "helptickets_closed.php",
                                type: "POST",
                                data: ''
                            })
                                    .success(function (result) {

                                        var obj = jQuery.parseJSON(result);
                                        if (obj != '')
                                        {

                                            var count = 1;
                                            $(".demo1").empty();
                                            $(".demo1").css("height", "820px");

                                            $.each(obj, function (key, val) {

                                                var image = count % 7;

                                                var status = val["status"];
                                                var ul;
                                                if (status == "Second Level") {

                                                    if (val["type"] == "Recent") {
                                                        ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                                        ul = ul + "<td><img src='images/Siren.gif' width='20px'></td><td><img id='imgnow' class='objblink' src='images/Recent.png' width='60px'></td>";
                                                        ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                                        ul = ul + "</tr></table></li>";
                                                    } else if (val["type"] == "Preceding") {
                                                        ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                                        ul = ul + "<td><img src='images/Siren.gif' width='20px'></td><td><img class='swingimage' src='images/" + image + ".png' width='60px'></td>";
                                                        ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                                        ul = ul + "</tr></table></li>";
                                                    }
                                                } else {
                                                    if (val["type"] == "Recent") {
                                                        ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                                        ul = ul + "<td><img src='images/Siren2.gif' width='20px'></td><td><img id='imgnow' class='objblink' src='images/Recent.png' width='60px'></td>";
                                                        ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                                        ul = ul + "</tr></table></li>";
                                                    } else if (val["type"] == "Preceding") {
                                                        ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                                        ul = ul + "<td><img src='images/Siren2.gif' width='20px'></td><td><img class='swingimage' src='images/" + image + ".png' width='60px'></td>";
                                                        ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                                        ul = ul + "</tr></table></li>";
                                                    }

                                                }
                                                $('.demo1').append(ul);
                                                count = count + 1;

                                            });
                                        }

                                        //countclosed = count-1;
                                    });
                            //alert(countclosed);
                        }, 27000);
                //callUnsolved()

                //  callUnsolved();

            }
            function callTotal() {
                //	alert("Call Unsolved Success!");
                var counttotal = 0;
                $.ajax({
                    url: "helptickets_total.php",
                    type: "POST",
                    data: ''
                })
                        .success(function (result) {

                            var obj = jQuery.parseJSON(result);
                            if (obj != '')
                            {

                                var count = 1;
                                $(".demo1").empty();
                                $(".demo1").css("height", "820px");

                                $.each(obj, function (key, val) {

                                    var image = count % 7;

                                    var status = val["status"];
                                    var ul;
                                    if (status == "Second Level") {

                                        if (val["type"] == "Recent") {
                                            ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                            ul = ul + "<td><img src='images/Siren.gif' width='20px'></td><td><img id='imgnow' class='objblink' src='images/Recent.png' width='60px'></td>";
                                            ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                            ul = ul + "</tr></table></li>";
                                        } else if (val["type"] == "Preceding") {
                                            ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                            ul = ul + "<td><img src='images/Siren.gif' width='20px'></td><td><img class='swingimage' src='images/" + image + ".png' width='60px'></td>";
                                            ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                            ul = ul + "</tr></table></li>";
                                        }
                                    } else {
                                        if (val["type"] == "Recent") {
                                            ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                            ul = ul + "<td><img src='images/Siren2.gif' width='20px'></td><td><img id='imgnow' class='objblink' src='images/Recent.png' width='60px'></td>";
                                            ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                            ul = ul + "</tr></table></li>";
                                        } else if (val["type"] == "Preceding") {
                                            ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                            ul = ul + "<td><img src='images/Siren2.gif' width='20px'></td><td><img class='swingimage' src='images/" + image + ".png' width='60px'></td>";
                                            ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                            ul = ul + "</tr></table></li>";
                                        }

                                    }
                                    $('.demo1').append(ul);
                                    count = count + 1;
                                });
                            }
                            //counttotal = count-1;
                        });
                //var counttotal;
                //counttotal = count-1;
                auto_refresh4 = setInterval(
                        function ()
                        {
                            $.ajax({
                                url: "helptickets_total.php",
                                type: "POST",
                                data: ''
                            })
                                    .success(function (result) {

                                        var obj = jQuery.parseJSON(result);
                                        if (obj != '')
                                        {

                                            var count = 1;
                                            $(".demo1").empty();
                                            $(".demo1").css("height", "820px");

                                            $.each(obj, function (key, val) {

                                                var image = count % 7;

                                                var status = val["status"];
                                                var ul;
                                                if (status == "Second Level") {

                                                    if (val["type"] == "Recent") {
                                                        ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                                        ul = ul + "<td><img src='images/Siren.gif' width='20px'></td><td><img id='imgnow' class='objblink' src='images/Recent.png' width='60px'></td>";
                                                        ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                                        ul = ul + "</tr></table></li>";
                                                    } else if (val["type"] == "Preceding") {
                                                        ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                                        ul = ul + "<td><img src='images/Siren.gif' width='20px'></td><td><img class='swingimage' src='images/" + image + ".png' width='60px'></td>";
                                                        ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                                        ul = ul + "</tr></table></li>";
                                                    }
                                                } else {
                                                    if (val["type"] == "Recent") {
                                                        ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                                        ul = ul + "<td><img src='images/Siren2.gif' width='20px'></td><td><img id='imgnow' class='objblink' src='images/Recent.png' width='60px'></td>";
                                                        ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                                        ul = ul + "</tr></table></li>";
                                                    } else if (val["type"] == "Preceding") {
                                                        ul = "<li class='news-item' id='demo1li" + count + "'><table cellpadding='4'><tr>";
                                                        ul = ul + "<td><img src='images/Siren2.gif' width='20px'></td><td><img class='swingimage' src='images/" + image + ".png' width='60px'></td>";
                                                        ul = ul + "<td><b>" + val["key"] + "</b>&nbsp;&nbsp;&nbsp;" + val["createdDate"] + "<br><a href='" + val["link"] + "'>" + val["topic"] + "</a></td><td></td>";
                                                        ul = ul + "</tr></table></li>";
                                                    }

                                                }
                                                $('.demo1').append(ul);
                                                count = count + 1;
                                                //alert(count);
                                            });
                                        }
                                        //alert(count-1);
                                        //counttotal = count-1;
                                    });
                            //alert(counttotal);

                        }, 54000);
                //callUnsolved()

                //  callUnsolved();

            }
            $(function () {
                $(".demo1").bootstrapNews({
                    newsPerPage: 10,
                    autoplay: true,
                    pauseOnHover: true,
                    direction: 'up',
                    newsTickerInterval: 3000,
                    onToDo: function () {

                    }
                });

                $(".demo2").bootstrapNews({
                    newsPerPage: 4,
                    autoplay: true,
                    pauseOnHover: true,
                    direction: 'up',
                    newsTickerInterval: 3000,
                    onToDo: function () {

                    }
                });

                $("#unsolved").on('click', function () {
                    callUnsolved();
                    clearInterval(auto_refresh3);
                    clearInterval(auto_refresh4);
                    //win.location;
                    // return false;
                });
                $("#closed").on('click', function () {
                    callClosed();
                    clearInterval(auto_refresh2);
                    clearInterval(auto_refresh4);
                    //win.location;
                    // return false;
                });
                $("#total").on('click', function () {
                    callTotal();
                    clearInterval(auto_refresh2);
                    clearInterval(auto_refresh3);
                    //win.location;
                    // return false;
                });




                var color1;
                $("#unsolved").hover(function () {
                    color1 = $(this).css("background-color");

                    if (color1 == "rgb(192, 0, 0)") {
                        $('#unsolved').css("background-color", "#990000");
                    } else if (color1 == "rgb(0, 176, 80)") {
                        $('#unsolved').css("background-color", "#008039");
                    } else if (color1 == "rgb(255, 192, 0)") {
                        $('#unsolved').css("background-color", "#e6ac00");
                    } else {
                        $('#unsolved').css("background-color", "#8c8c8c");
                    }



                }, function () {


                    $("#unsolved").css("background-color", color1);
                });



                var color3;
                $("#closed").hover(function () {
                    color3 = $(this).css("background-color");

                    if (color3 == "rgb(192, 0, 0)") {
                        $('#closed').css("background-color", "#990000");
                    } else if (color3 == "rgb(0, 176, 80)") {
                        $('#closed').css("background-color", "#008039");
                    } else if (color3 == "rgb(255, 192, 0)") {
                        $('#closed').css("background-color", "#e6ac00");
                    } else {
                        $('#closed').css("background-color", "#8c8c8c");
                    }



                }, function () {


                    $("#closed").css("background-color", color3);
                });



                var color5;
                $("#total").hover(function () {
                    color5 = $(this).css("background-color");

                    if (color5 == "rgb(192, 0, 0)") {
                        $('#total').css("background-color", "#990000");
                    } else if (color5 == "rgb(0, 176, 80)") {
                        $('#total').css("background-color", "#008039");
                    } else if (color5 == "rgb(255, 192, 0)") {
                        $('#total').css("background-color", "#e6ac00");
                    } else {
                        $('#total').css("background-color", "#8c8c8c");
                    }



                }, function () {


                    $("#total").css("background-color", color5);
                });



            });

        </script>
    </body>
</html>