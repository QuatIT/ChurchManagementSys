<?php
include 'layout/head.php';


if(isset($_POST['fetch'])){

    $start= filter_input(INPUT_POST,'start',FILTER_SANITIZE_STRING);
    $to= filter_input(INPUT_POST,'to',FILTER_SANITIZE_STRING);
    $fetch= filter_input(INPUT_POST,'fetch',FILTER_SANITIZE_STRING);



$users = select("SELECT count(*) as cmember FROM membership_tb WHERE full_name !='' ");
foreach($users as $mem_row){}
$count_mem =  $mem_row['cmember']; //total number of users

$min = select("SELECT count(*) as cministry FROM ministry_tb ");
foreach($min as $min_row){}
$count_min =  $min_row['cministry']; //total number of users

$grp = select("SELECT count(*) as cgroup FROM g_ministry_tb ");
foreach($grp as $grp_row){}
$count_grp =  $grp_row['cgroup']; //total number of users

$tith_e = select("SELECT count(*) as tit_he FROM membership_tb");
foreach($tith_e as $tith_es){}
    $count_tithe = $tith_es['tit_he'];//total number of tithe paid

$pled_ge = select("SELECT count(*) as pled_ges FROM pledge_tb WHERE payment_date=CURDATE()-INTERVAL 1 DAY");
foreach($pled_ge as $pled_ges){}
$count_pledge = $pled_ges['pled_ges'];//total number of pledges






    $percentile=100;
$service_att = select("SELECT count(*) as service_count FROM mem_attendance WHERE status ='present' && date_reg BETWEEN '".$start."' AND '".$to."' ");
foreach($service_att as $service_atts){
$att_number = $service_atts['service_count'];
}
$service_cal = ($att_number)/($count_mem)*($percentile);

// echo "<script>alert('{$service_cal}')</script>";

$ministry_att = select("SELECT count(*) as ministry_count FROM min_grp_attend WHERE status ='present' && date_reg BETWEEN '".$start."' AND '".$to."' && group_id LIKE 'MINS%' ");
foreach($ministry_att as $ministry_atts){
$min_number = $ministry_atts['ministry_count'];
}
$ministry_cal = ($min_number)/($count_min)*($percentile);




$group_att = select("SELECT count(*) as group_count FROM min_grp_attend WHERE status='present' && date_reg BETWEEN '".$start."' AND '".$to."' && group_id LIKE 'G-MIN%' ");
foreach($group_att as $group_atts){
$grp_number = $group_atts['group_count'];
}
$group_cal = ($grp_number)/($count_grp)*($percentile);




   $tithe_paid = select("SELECT count(*) as tithe_count FROM tithe WHERE tithe_date BETWEEN '".$start."' AND '".$to."' ");
foreach($tithe_paid as $tithe_paidx){
$tithe_number = $tithe_paidx['tithe_count'];
}
$tithe_cal = ($tithe_number)/($count_tithe)*($percentile);



$pledge = select("SELECT count(*) as pledge_count FROM pledge_tb WHERE  payment_date BETWEEN '".$start."' AND '".$to."' && pledge_status='Fulfilled' ");
foreach($pledge as $pledges){
$pledge_number = $pledges['pledge_count'];
}
$pledge_cal = ($pledge_number)/($count_pledge)*($percentile);

}




//GET DATA FOR SERVICE ATTENDANCE TAB

//service1
$fet_men = select("SELECT * FROM attendance_tb WHERE WEEKOFYEAR(attend_date) = WEEKOFYEAR(NOW())-1 && ministry_id='service1' ");
foreach($fet_men as $fet_menx){
    $men_data = $fet_menx['men'];
    $women_data = $fet_menx['women'];
    $children_data = $fet_menx['children'];
    }

    // service2
    $fet_ser = select("SELECT * FROM attendance_tb WHERE WEEKOFYEAR(attend_date) = WEEKOFYEAR(NOW())-1 && ministry_id='service2' ");
foreach($fet_ser as $fet_ser2){
    $men_data2 = $fet_ser2['men'];
    $women_data2 = $fet_ser2['women'];
    $children_data2 = $fet_ser2['children'];
    }


       //all
    $fet_all = select("SELECT * FROM attendance_tb WHERE WEEKOFYEAR(attend_date) = WEEKOFYEAR(NOW())-1 && ministry_id='all' ");
foreach($fet_all as $fet_allx){
    $men_data3 = $fet_allx['men'];
    $women_data3 = $fet_allx['women'];
    $children_data3 = $fet_allx['children'];
    }

        //event
    $fet_event = select("SELECT * FROM attendance_tb WHERE WEEKOFYEAR(attend_date) = WEEKOFYEAR(NOW())-1 && ministry_id='event' ");
foreach($fet_event as $fet_events){
    $men_data4 = $fet_events['men'];
    $women_data4 = $fet_events['women'];
    $children_data4 = $fet_events['children'];
    }







    //GET DATA FOR GROUP ATTENDANCE TAB

//all group members
    $member_all = select ("SELECT COUNT(*) as all_members FROM g_assign_member");
    foreach($member_all as $member_allx){
        $mem_allx = $member_allx['all_members'];
    }

    $member_att= select("SELECT COUNT(*) as memb_att  FROM min_grp_attend WHERE group_id LIKE 'G-MINS%' && WEEKOFYEAR(date_reg) = WEEKOFYEAR(NOW())-1 && status='present' ");
    foreach($member_att as $member_attx){
        $mem_attx = $member_attx['memb_att'];
    }

 $member_absent = ($mem_allx) - ($mem_attx);

 //GET DATA FOR MINISTRY ATTENDANCE

 //pull for males
$min_male = select("SELECT COUNT(*) as ministry_attendx FROM min_grp_attend WHERE group_id LIKE 'MINS%' && gender='male' && WEEKOFYEAR(date_reg)=WEEKOFYEAR(NOW())-1 && status='present' ");
foreach($min_male as $min_males){
    $male_data = $min_males['ministry_attendx'];
}

//pull for females
$min_female = select("SELECT COUNT(*) as ministry_attex FROM min_grp_attend WHERE group_id LIKE 'MINS%' && gender='female' && WEEKOFYEAR(date_reg)=WEEKOFYEAR(NOW())-1 && status='present' ");
foreach($min_female as $min_females){
    $female_data = $min_females['ministry_attex'];
}




//GET DATA FOR TITHE TAB
$tithe_all = select("SELECT COUNT(*) as titheAll FROM membership_tb ");
foreach($tithe_all as $tithe_allx){
    $cal_tithe = $tithe_allx['titheAll'];
}

 $titheSort = select("SELECT COUNT(*) as tithe_sort FROM tithe WHERE WEEKOFYEAR(tithe_date) = WEEKOFYEAR(NOW())-1; ");
 foreach($titheSort as $tithe_sortx){
    $tithe_paid = $tithe_sortx['tithe_sort'];
 }

 $tithe_diff = ($cal_tithe) - ($tithe_paid);



 //PLEDGE TAB
//fulfilled pledges
 $pledge_redeem = select("SELECT COUNT(*) as pledge_sum FROM pledge_tb WHERE pledge_status = 'Fulfilled' && WEEKOFYEAR(payment_date)=WEEKOFYEAR(NOW())-1 ");

 foreach($pledge_redeem as $pledge_redeems){
    $pledge_stats = $pledge_redeems['pledge_sum'];
 }

 //unfulfilled pledges

  $pledge_not = select("SELECT COUNT(*) as pledge_notz FROM pledge_tb WHERE pledge_status = 'Pledged' && WEEKOFYEAR(payment_date)=WEEKOFYEAR(NOW())-1  ");

 foreach($pledge_not as $pledge_notx){
    $pledge_unapp = $pledge_notx['pledge_notz'];
 }



 // echo "<script>alert('{$tithe_diff}')</script>";


//$cat = mysqli_query($con,"SELECT count(*) as c_cat FROM category");
//$cat_row = mysqli_fetch_array($cat);
//$count_cat = $cat_row['c_cat'];
//
//$lock_sql = mysqli_query($con,"SELECT count(*) as c_lock FROM user_login WHERE status='1' ");
//$lock_row = mysqli_fetch_array($lock_sql);
//$count_lock = $lock_row['c_lock'];
//
//$unlock_sql = mysqli_query($con,"SELECT count(*) as c_unlock FROM user_login WHERE status='0' ");
//$unlock_row = mysqli_fetch_array($unlock_sql);
//$count_unlock = $unlock_row['c_unlock'];

$dataPoints = array(
	array("label"=>"No. of Members", "y"=>@$count_mem),
	array("label"=>"No. of Minitries", "y"=>@$count_min),
	array("label"=>"No. of Other Groups", "y"=>@$count_grp),
//	array("label"=>"No. of Locked Users", "y"=>$count_lock),
//	array("label"=>"No. of Unlocked Users", "y"=>$count_unlock)
//	array("label"=>"Edge", "y"=>4.29),
//	array("label"=>"Others", "y"=>4.59)
)


?>

<!--
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:auto; padding:30px;background-color:#fff;">
-->


<!--<div id="chartContainer" style="height: 370px; width: 100%;z-index:99999;"></div>-->


<!-- <div class="container-fluid">
    <div class="row col-md-8"> -->



    <!--     </div>
    </div> -->

<!-- Tab links -->
<style>
/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 19px;
    font-weight:bolder;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}

</style>

<style>
#container {
  max-width: 800px;
  height: 400px;
  margin: 1em auto;
}

body {
    font-family: Arial, Verdana, sans-serif;
}
</style>

<style>
#containera {
    max-width: 800px;
    height: 115px;
    margin: 1em auto;
}
#containerb, #containerc {
    max-width: 800px;
    height: 85px;
    margin: 1em auto;
}
.hc-cat-title {
  font-size: 13px;
  font-weight: bold;
}




</style>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/histogram-bellcurve.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/bullet.js"></script>



<div class="col-md-8">
<div class="tab" style="border:none;">
  <button class="tablinks" onclick="activity(event, 'tab1')">Service Attendance</button>
  <button class="tablinks" onclick="activity(event, 'tab2')">Group Attendance</button>
  <button class="tablinks" onclick="activity(event, 'tab3')">Ministry Attendance</button>
    <button class="tablinks" onclick="activity(event, 'tab4')">Tithes</button>
      <button class="tablinks" onclick="activity(event, 'tab5')">Pledge</button>
      <button class="tablinks" onclick="activity(event, 'tab6')">Tabulated Search</button>
</div>

<div id="tab1" class="tabcontent" style="display:block;">

 <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>

<div id="tab2" class="tabcontent">
  <div id="container2"></div>

</div>

<div id="tab3" class="tabcontent">
<div id="container3" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
</div>

<div id="tab4" class="tabcontent">

    <div id="containera"></div>
<div id="containerb"></div>
<div id="containerc"></div>

</div>

<div id="tab5" class="tabcontent" >
<div id="container5" style="height: 400px;" ></div>

</div>

<div id="tab6" class="tabcontent"  >
    <div class="container">
        <div class='form-group'>
        <form action="" method="POST">

                <div class='row'>
                    <div class="col">
               <label>Start</label>
               <input type='date' name='start'  id='start'class="form-control"></div>


<div class='col'>
        <label  >End</label>
        <input type='date' name='to' id='to'class="form-control"></div>

         <div class='col'>
            <input type='submit' name='fetch' id='fetch'class="btn btn-primary form-control" value="SEARCH" style="width:100px;font-size:18px;margin-top:30px;">&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="" class="btn btn-primary" style="width:160px;margin-top:29px;" onclick="window.print()"><i class="fa fa-print">&nbsp; PRINT</i></button></div>
     </div><br>


           <!--
              <input type='date' name='to' id='to'> -->
      <!--   </div> -->

 <div class="row col-md-12">
    <table class="table table-borderless">
            <thead class="thead-dark">
                <tr>
                    <th>SERVICE ATTENDANCE</th>
                    <th>MINISTRY ATTENDANCE</th>
                <th>GROUP ATTENDANCE</th>
                <th>DATES</th>
                <th>TITHE</th>
                 <th>PLEDGES</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?php echo @round($service_cal,2).'%';?></td>
                     <td><?php echo @round($ministry_cal,2).'%';?></td>
                    <td><?php echo @round($group_cal,2).'%'; ?></td>
                    <td><?php echo @$start.' to '.@$to; ?></td>
                    <td><?php echo @round($tithe_cal,2).'%'; ?></td>
                    <td><?php echo @round($pledge_cal,2).'%'; ?></td>
                </tr>
            </tbody>



        </table>

    </div>



</form>
</div>
<!-- <div id="container_table" style="min-width: 300px; height: 400px; margin: 0 auto"></div> -->
</div>









        <!-- <div class="col-md-2 bg-primary" style="color:#fff;border:1px solid #fff;margin:2px;" >
        <h3>Total Members </h3>
            <h2><i class="pull-left">(Confirmed)</i><i class="pull-right"><?php #echo count(select("SELECT * FROM membership_tb WHERE member_status ='Yes' ")) ;?></i></h2><br>&nbsp;
        </div>
        <div class="col-md-2 bg-warning"  style="color:#fff;border:1px solid #fff;margin:2px;">
        <h3>Total Members</h3>
            <h2><i class="pull-left">(Not Confirmed)</i><i class="pull-right"><?php #echo count(select("SELECT * FROM membership_tb WHERE member_status ='No' ")) ;?></i></h2><br>&nbsp;
        </div> -->


<!--        ministries-->
<!--         <?php $min_sq# = select("SELECT * FROM ministry_tb"); foreach($min_sq as $min_row){ ?>
        <div class="col-md-2 bg-info"  style="color:#fff;border:1px solid #fff;margin:2px;">
        <h3><?php #echo $min_row['group_name']; ?></h3>
            <h2><i class="pull-left">(Total Members)</i><i class="pull-right"><?php #echo count(select("SELECT * FROM membership_tb WHERE group_name ='".$min_row['group_name']."' ")) ;?></i></h2><br>&nbsp;
        </div>
        <?php #} ?> -->



    </div>
</div>
<!--  <div class="container" style="margin-left:1200px;margin-top:2px; width:100px;">
    <div class="row col-md-4">
    <table class="table table-borderless">
            <thead class="thead-dark">
                <tr>
                <th>GROUP/MINISTRY</th>
                <th>ATTENDANCE</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $fet_group #=select("SELECT * FROM min_grp_attend WHERE date_reg =CURDATE()-1&& count(status) as att_end=present" );
            #foreach($fet_group as $fet_groups){?>
                    <tr>
                    <td><?php# echo $fet_groups['group_name'];?></td>
                    <td> <?php# echo $fet_groups['att_end'];?></td>
                </tr>
            <?php #} ?>
            </tbody>
        </table>


</div>
    </div> -->

<!--
        </div>
        </div>
        </div>
-->

<?php
include 'layout/foot.php';
?>


<script>
function activity(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>


<script>
    //tab1
Highcharts.chart('container1', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Rohi Church Service Attendance chart'
  },
  xAxis: {
    categories: ['1st Service', '2nd Service', 'Full Service', 'Events']
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Total Service Attendance Score'
    },
    stackLabels: {
      enabled: true,
      style: {
        fontWeight: 'bold',
        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
      }
    }
  },
  legend: {
    align: 'right',
    x: -30,
    verticalAlign: 'top',
    y: 25,
    floating: true,
    backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
    borderColor: '#CCC',
    borderWidth: 1,
    shadow: false
  },
  tooltip: {
    headerFormat: '<b>{point.x}</b><br/>',
    pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
  },
  plotOptions: {
    column: {
      stacking: 'normal',
      dataLabels: {
        enabled: true,
        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
      }
    }
  },


  series: [{
    name: 'Men',
    data: [<?php echo $men_data; ?>,<?php echo $men_data2; ?>,<?php echo $men_data3; ?>,<?php echo $men_data4; ?>]
    // data2: [<?php #echo $men_data2; ?>]
  }, {
    name: 'Women',
    data: [<?php echo $women_data; ?>,<?php echo $women_data2;?>,<?php echo $women_data3;?>,<?php echo $men_data4; ?>]
    // data2: [<?php #echo $women_data2;  ?>]
  }, {
    name: 'Children',
    data: [<?php echo $children_data; ?>,<?php echo $children_data2; ?>,<?php echo $children_data3; ?>,<?php echo $men_data4; ?>]
     // data2: [<?php #echo $children_data2; ?>]
  }]
});
</script>


<script>
        // Radialize the colors tab2
Highcharts.setOptions({
  colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
      radialGradient: {
        cx: 0.5,
        cy: 0.3,
        r: 0.7
      },
      stops: [
        [0, color],
        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
      ]
    };
  })
});

// Build the chart
Highcharts.chart('container2', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Rohi Church Group Attendance'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        },
        connectorColor: 'silver'
      }
    }
  },
  series: [{
    name: 'Share',
    data: [
      { name: 'Present Members', y: <?php echo $mem_attx; ?> },
      { name: 'Absent Members', y: <?php echo $member_absent; ?>}
      // { name: 'Firefox', y: 10.85 },
      // { name: 'Edge', y: 4.67 },
      // { name: 'Safari', y: 4.18 },
      // { name: 'Other', y: 7.05 }
    ]
  }]
});

    </script>


    <script>

//tab3
// Data gathered from http://populationpyramid.net/germany/2015/

// Age categories
var categories = [
    '0-4', '5-9', '10-14', '15-19',
    '20-24', '25-29', '30-34', '35-39', '40-44',
    '45-49', '50-54', '55-59', '60-64', '65-69',
    '70-74', '75-79', '80-84', '85-89', '90-94',
    '95-99', '100 + '
];

Highcharts.chart('container3', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Rohi Ministry Attendance'
    },
    subtitle: {
        // text: 'Source: <a href="http://populationpyramid.net/germany/2018/">Population Pyramids of the World from 1950 to 2100</a>'
    },
    xAxis: [{
        categories: categories,
        reversed: false,
        labels: {
            step: 1
        }
    }, { // mirror axis on right side
        opposite: true,
        reversed: false,
        categories: categories,
        linkedTo: 0,
        labels: {
            step: 1
        }
    }],
    yAxis: {
        title: {
            text: null
        },
        labels: {
            formatter: function () {
                return Math.abs(this.value) + '%';
            }
        }
    },

    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },

    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + ', age ' + this.point.category + '</b><br/>' +
                'Population: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
        }
    },

    series: [{
        name: 'Male',
        data: [<?php echo $male_data;?>]
    }, {
        name: 'Female',
        data: [<?php echo $male_data;?>]
    }]
});

    </script>

    <script>
//tab4
// let ndate = new Date();

        Highcharts.setOptions({
    chart: {
        inverted: true,
        marginLeft: 135,
        type: 'bullet'
    },
    title: {
        text: null
    },
    legend: {
        enabled: false
    },
    yAxis: {
        gridLineWidth: 0
    },
    plotOptions: {
        series: {
            pointPadding: 0.25,
            borderWidth: 0,
            color: '#000',
            targetOptions: {
                width: '200%'
            }
        }
    },
    credits: {
        enabled: false
    },
    exporting: {
        enabled: false
    }
});

Highcharts.chart('containera', {
    chart: {
        marginTop: 40
    },
    title: {
        // let dt = new Date();
        // text:'2017 YTD'
        text:'Rohi Church Tithe Chart'
    },
    xAxis: {
        // categories: ['<span class="hc-cat-title">Revenue</span><br/>U.S. $ (1,000s)']
        categories: ['<span class="hc-cat-title">Not Paid Tithe</span>']
    },
    yAxis: {
        plotBands: [{
            from: 0,
            to: 150,
            color: '#666'
        }, {
            from: 150,
            to: 225,
            color: '#999'
        }, {
            from: 225,
            to: 9e9,
            color: '#bbb'
        }],
        title: null
    },
    series: [{
        data: [{
            y: <?php echo  $tithe_diff; ?>,
            target: 250
        }]
    }],
    tooltip: {
        pointFormat: '<b>{point.y}</b> (with target at {point.target})'
    }
});

Highcharts.chart('containerb', {
    xAxis: {
        categories: ['<span class="hc-cat-title">Paid Tithe</span>']
    },
    yAxis: {
        plotBands: [{
            from: 0,
            to: 150,
            color: '#666'
        }, {
            from: 20,
            to: 25,
            color: '#999'
        }, {
            from: 25,
            to: 100,
            color: '#bbb'
        }],
        labels: {
            format: '{value}%'
        },
        title: null
    },
    series: [{
        data: [{
            y: <?php echo $tithe_paid; ?>,
            target: 27
        }]
    }],
    tooltip: {
        pointFormat: '<b>{point.y}</b> (with target at {point.target})'
    }
});


// Highcharts.chart('containerc', {
//     xAxis: {
//         categories: ['<span class="hc-cat-title">Overall</span>']
//     },
//     yAxis: {
//         plotBands: [{
//             from: 0,
//             to: 1400,
//             color: '#666'
//         }, {
//             from: 1400,
//             to: 2000,
//             color: '#999'
//         }, {
//             from: 2000,
//             to: 9e9,
//             color: '#bbb'
//         }],
//         labels: {
//             format: '{value}'
//         },
//         title: null
//     },
//     series: [{
//         data: [{
//             y: 1650,
//             target: 2100
//         }]
//     }],
//     tooltip: {
//         pointFormat: '<b>{point.y}</b> (with target at {point.target})'
//     },
//     credits: {
//         enabled: true
//     }
// });

  </script>


<script>


Highcharts.chart('container5', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Rohi Church Pledge Chart'
    },
    subtitle: {
        // text: '3D donut in Highcharts'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Score',
        data: [
            // ['Pledges', 60],
            // ['Kiwi', 3],
            // ['Mixed nuts', 1],
            // ['Oranges', 6],
            ['Redeemed Pledges', <?php echo $pledge_stats;?>],
            // ['Pears', 4],
            // ['Clementines', 4],
            // ['Reddish (bag)', 1],
            ['Non Redeemed', <?php echo $pledge_unapp;?>]
        ]
    }]
});
</script>


<script>


Highcharts.chart('container_table', {
    chart: {
        type: 'column'
    },
    title: {
        // text: 'World\'s largest cities per 2017'
    },
    subtitle: {
        // text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
    }
    ,
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '14px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 5,
        max:100,
        title: {
            text: 'Percentage (%)'
        }
    },
    legend: {
        enabled: true
    },
    tooltip: {
        // pointFormat: 'Population in 2017: <b>{point.y:.1f} millions</b>'
    },
    series: [{
        name: 'Rohi Church Performance Report As At <?php echo date('d-m-Y');?>',
        data: [
            ['Service Attendance', <?php echo $service_cal;?>],
            ['Ministry Attendance',<?php echo $ministry_cal;?> ],
            ['Group Attendance', <?php echo $group_cal;?> ],
            ['Tithe', <?php echo $tithe_cal;?>],
            ['Pledges',<?php echo $pledge_cal;?> ],

       ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: 'purple',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '14px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
    </script>



<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>


