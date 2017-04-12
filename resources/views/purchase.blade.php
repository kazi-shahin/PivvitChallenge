<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Example - example-forms-simple-production</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="//code.angularjs.org/snapshot/angular.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
  
  <style type="text/css">
      .margin-top-40{
        margin-top: 40px;
      }
      .margin-top-15{
        margin-top: 15px;
      }
      .margin-bottom-30{
        margin-bottom: 30px;
      }
      #create-form {
          padding: 15px;
          border: 1px solid #dedede;
      }
  </style>
  
</head>
<body ng-app="formExample">
    <div class="container margin-top-40">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div ng-controller="ExampleController" id="create-form">
                    <h3 class="text-center margin-bottom-30">Create Purchase</h3>
                    <form id="purchase_form" class="form-horizontal">
			<input type="hidden" name="app_token" value="1234567"/>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Offer</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="offeringID" id="offeringID" required ng-model="offer" placeholder="Select Offer" ng-change="changeValue()">
                                    <?php foreach($offers as $offer){ ?>
                                        <option value="<?php echo $offer->id."#".$offer->price ?>" selected> <?php echo $offer->title ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Customer</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="customerName" id="customerName" ng-model="customerName" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Quantity</label>
                            <div class="col-sm-10">
                              <input type="number" min="0" class="form-control" name="quantity" id="quantity" ng-model="quantity" ng-change="changeValue()" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Total</label>
                            <div class="col-sm-10">
                              <input class="form-control" id="" ng-model="total" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-12 text-center">
                            <button type="button" class="btn btn-success"  ng-click="submit_form()" >Save</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>

<script>
  angular.module('formExample', [])
    .controller('ExampleController', function($scope, $http) {
      //$scope.quantity = 0;
      $scope.changeValue = function(){
        var offer_value = $scope.offer.split("#");

        if($scope.offer.length > 0){
          $scope.total = offer_value[1] * $scope.quantity;
        }
        
      }

        $scope.submit_form = function()
        {
            var url = '{{url('POST/purchase')}}';
            var data = $('#purchase_form').serialize();

            var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
                }
            }
                $http.post(url, data, config)
                        .success(function (data, status, headers, config) {
                            alert(data);
                            if(data.status==200){
                                $('#purchase_form')[0].reset();
                                alert('Successfully saved');
                                window.location.href='{{url('/')}}';
                            }
                            else{
                                alert(data.reason);
                            }
                        })
                        .error(function (data, status, header, config) {
                            console.log(data);
                        });

        }

    });
</script>

</body>
</html>
