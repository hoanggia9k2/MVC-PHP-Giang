<!DOCTYPE html>
<html>
<head>
  <title>Hiển thị danh sách nhân viên</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootrap/3.3.7/css/bootstrap.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootrap/3.3.7/js/bootstrap.js"></script>
  <style type="text/css">
    .wrapper{
      width: 650px;
      margin: 0 auto;
    }
    .page-header h2{
      margin-top: 0;
    }
    .table tr td:last-child a{
      margin-right: 10px;
    }
    a {margin-bottom: 10px;}
  </style>
  <script type="text/javascript">
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</head>
<body>
  <div class="wapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="page-header clearfix">
            <h2 class="pull-left">Danh sách nhân viên</h2>
            <a href="?controller=tv&action=add" class="btn btn-success pull-right">Thêm nhân viên</a>
          </div>
          <table class='table table-bordered table-striped'>
            <thead>
              <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Ghi chú</th>
                <th>Thông tin</th>
              </tr>
            </thread>
    			<?php
    			$db->connect();
          $abc = $db->getAllData();
    			?>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>