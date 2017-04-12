<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Example - example-forms-simple-production</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="//code.angularjs.org/snapshot/angular.min.js"></script>
  
  <style type="text/css">
      .margin-top-40{
        margin-top: 40px;
      }
      .margin-top-15{
        margin-top: 15px;
      }
  </style>
  
</head>
<body ng-app="formExample">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 margin-top-15">
              <div class="creat-form">
              <h3 class="text-center">List of purchases</h3>
              <div class="table-responsive">          
                <table class="table table-bordered table-stripped">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Purchase ID</th>
                      <th>Offer Title</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                   $count = 1;
                   foreach($purchases as $purchase){?>
                    <tr>
                      <td>{{$count}}</td>
                      <td>{{$purchase->id}}</td>
                      <td>{{$purchase->customerName}}</td>
                      <td>{{$purchase->quantity}}</td>
                      <td></td>
                      <td></td>
                    </tr>
                  <?php $count++; } ?>
                  </tbody>
                </table>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>
