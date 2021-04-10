<?php 
$dropactive = "membership";
$active = "managevisitor";
include 'layout/headside.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top:40px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">MANAGE VISITORS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Membership</a></li>
              <li class="breadcrumb-item active">Manage Visitors</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                
            <div class="card">
<!--
              <div class="card-header">
                <h3 class="card-title">Registered Members Table</h3>
              </div>
-->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NUMBER</th>
                    <th>FULL NAME</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Ernest Mensah</td>
                    <td> 2330207892496</td>
                    <td> Tema Com 2</td>
                    <td>X</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Kwame Quansah</td>
                    <td> 2330541524233</td>
                    <td> Tema Com 6</td>
                    <td>X</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Vivian Happer</td>
                    <td> 2330207842455</td>
                    <td> Tema Com 5</td>
                    <td>X</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
          </div>
      </div>
    </section>
  </div>

<?php
include 'layout/footer.php';
?>