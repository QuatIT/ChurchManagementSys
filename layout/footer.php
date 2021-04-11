  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer text-xs">
    Copyright &copy; 2020 <a href="https://quatitsolutions.com" target="_blank"><b>QUAT I.T SOLUTIONS</b></a>.
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      V2

    </div>
  </footer>
</div>
<!-- REQUIRED SCRIPTS -->



<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="plugins/flot-old/jquery.flot.pie.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.js"></script>
<script>
//  $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data        = [],
        totalPoints = 100

    function getRandomData() {

      if (data.length > 0) {
        data = data.slice(1)
      }

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [
        {
          data: getRandomData(),
        }
      ],
      {
        grid: {
          borderColor: '#f3f3f3',
          borderWidth: 1,
          tickColor: '#f3f3f3'
        },
        series: {
          color: '#3c8dbc',
          lines: {
            lineWidth: 2,
            show: true,
            fill: true,
          },
        },
        yaxis: {
          min: 0,
          max: 100,
          show: true
        },
        xaxis: {
          show: true
        }
      }
    )

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on') {
        setTimeout(update, updateInterval)
      }
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */


    /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data

    var sin = [],
        cos = []
    for (var i = 0; i < 14; i += 0.5) {
      sin.push([i, Math.sin(i)])
      cos.push([i, Math.cos(i)])
    }
    var line_data1 = {
      data : sin,
      color: '#3c8dbc'
    }
    var line_data2 = {
      data : cos,
      color: '#00c0ef'
    }
    $.plot('#line-chart', [line_data1, line_data2], {
      grid  : {
        hoverable  : true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0,
        lines     : {
          show: true
        },
        points    : {
          show: true
        }
      },
      lines : {
        fill : false,
        color: ['#3c8dbc', '#f56954']
      },
      yaxis : {
        show: true
      },
      xaxis : {
        show: true
      }
    })
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: 'absolute',
      display : 'none',
      opacity : 0.8
    }).appendTo('body')
    $('#line-chart').bind('plothover', function (event, pos, item) {

      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2)

        $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
          .css({
            top : item.pageY + 5,
            left: item.pageX + 5
          })
          .fadeIn(200)
      } else {
        $('#line-chart-tooltip').hide()
      }

    })
    /* END LINE CHART */

    /*
     * FULL WIDTH STATIC AREA CHART
     * -----------------
     */
    var areaData = [[2, 88.0], [3, 93.3], [4, 102.0], [5, 108.5], [6, 115.7], [7, 115.6],
      [8, 124.6], [9, 130.3], [10, 134.3], [11, 141.4], [12, 146.5], [13, 151.7], [14, 159.9],
      [15, 165.4], [16, 167.8], [17, 168.7], [18, 169.5], [19, 168.0]]
    $.plot('#area-chart', [areaData], {
      grid  : {
        borderWidth: 0
      },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color     : '#00c0ef',
        lines : {
          fill: true //Converts the line chart to area chart
        },
      },
      yaxis : {
        show: false
      },
      xaxis : {
        show: false
      }
    })

    /* END AREA CHART */

    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [[1,"<?php echo @$jantotal;?>"], [2,"<?php echo @$febtotal;?>"], [3,"<?php echo @$jantotal3;?>"], [4,"<?php echo @$jantotal4;?>"], [5,"<?php echo @$jantotal5;?>"], [6,"<?php echo @$jantotal6;?>"], [7,"<?php echo @$jantotal7;?>"], [8,"<?php echo @$jantotal8;?>"], [9,"<?php echo @$jantotal9;?>"], [10,<?php echo @$jantotal10; ?>], [11,"<?php echo @$jantotal11;?>"], [12,"<?php echo @$jantotal12;?>"]],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
//        borderColor: '#f3f3f3',
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
//      colors: ['#3c8dbc'],
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June'], [7,'July'], [8,'August'], [9,'September'], [10,'October'], [11,'November'], [12,'December']]
      }
    })
    /* END BAR CHART */

    /*
     * CURRENT ATTENDANCE BAR CHART
     * ---------
     */

    var bar_data = {
      data : [[1,"<?php echo @$men;?>"], [2,"<?php echo @$women;?>"], [3,"<?php echo @$children;?>"], [4,"<?php echo @$youth;?>"], [5,"<?php echo @$nolimit;?>"]],
      bars: { show: true }
    }
    $.plot('#current-attendance-bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
//        borderColor: '#f3f3f3',
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
//      colors: ['#3c8dbc'],
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'Men'], [2,'Women'], [3,'Children'], [4,'Youth'], [5,'NoLimit']]
      }
    })
    /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
      {
        label: 'Tithe',
        data : 30,
        color: '#3c8dbc'
      },
      {
        label: 'Pledges',
        data : 20,
        color: '#b70000'
      },
      {
        label: 'Offering',
        data : 50,
        color: '#e0c704'
      }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */

//  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>
<script>
//  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

//  })
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "dom": "Bfrtip",
      "buttons": [
        "excel","pdf","copy","print"
      ], 
      "responsive": true,
      "autoWidth": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "pageLength": 5,
      "lengthMenu": [ [5, 10, 25, 50, 75, -1], [5, 10, 25, 50, 75, "All"] ],
        "order": [[ 0, 'desc' ]]
    });
      
    $("#example11").DataTable({
      "dom": "Bfrtip",
      "buttons": [
        "excel","pdf","copy","print"
      ], 
      "responsive": true,
      "autoWidth": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "pageLength": 5,
      "lengthMenu": [ [5, 10, 25, 50, 75, -1], [5, 10, 25, 50, 75, "All"] ],
        "order": [[ 0, 'desc' ]]
    });
      
    $("#example3").DataTable({
      "dom": "Bfrtip",
      "buttons": [
        "excel","pdf","copy","print"
      ], 
      "responsive": true,
      "autoWidth": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "pageLength": 5,
      "lengthMenu": [ [5, 10, 25, 50, 75, -1], [5, 10, 25, 50, 75, "All"] ],
        "order": [[ 0, 'desc' ]]
    });
      
    $("#transrep").DataTable({
      "dom": "Bfrtip",
      "buttons": [
        "excel","pdf","copy","print"
      ], 
      "responsive": true,
      "autoWidth": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "pageLength": 15,
      "lengthMenu": [ [15, 25, 50, 75, -1], [15, 25, 50, 75, "All"] ],
        "order": [[ 0, 'desc' ]]
    });
      
    $("#attrep").DataTable({
      "dom": "Bfrtip",
      "buttons": [
        "excel","pdf","copy","print"
      ], 
      "responsive": true,
      "autoWidth": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "pageLength": 15,
      "lengthMenu": [ [15, 25, 50, 75, -1], [15, 25, 50, 75, "All"] ],
        "order": [[ 0, 'asc' ]]
    });
      
    $('#example2').DataTable({
      "dom": "Bfrtip",
      "buttons": [
        "excel","pdf","copy","print"
      ], 
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    "pageLength": 5,
    });
  });
</script>
</body>
</html>