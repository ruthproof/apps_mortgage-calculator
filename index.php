<!--
**index.php
* Main page for mortage-calculator app

-->

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles.css">
<meta charset="UTF-8">
<title>Mortgage Calculator</title>
</head>
<body>
  <h3>Mortgage Calculator</h3>

  <?php include('table.php'); ?>
</body>
<script>

$(document).ready(function(){
  $( "#clear" ).click(function(){
    $( '#form' ).trigger("reset");
    $( "#downPayment" ).removeAttr('value');
  });

  $( "#submit" ).click(function(){
      let downPayment = getDownPayment();
      $("#downPayment").attr('value', downPayment);
      $("#mortgageAmount").attr('value', mortgageDifference());
      // from https://www.issackelly.com/blog/2009/01/11/Simple_JQuery_Mortgage_Calculato
      // $("#mortgageCalc").click(function(){
      var L,P,n,c,dp;
      L = parseInt($("#purchasePrice").val());
      n = parseInt($("#period").val()) * 12;
      c = parseFloat($("#interestRate").val())/1200;
      dp = 1 - parseFloat($("#percentage").val())/100;
      L = L * dp;
      P = (L*(c*Math.pow(1+c,n)))/(Math.pow(1+c,n)-1);
      if(!isNaN(P))
      {
      $("#monthlyPayment").val(P.toFixed(2));
      }
      else
      {
      alert('There was an error');
      $("#monthlyPayment").val('There was an error');
      }

      $( "#totalCost" ).val(returnTotalCost(c,L,n).toFixed(2));

      // var x = $('#monthlyPayment').val();
      // $('#monthlyPayment').val(addCommas(x));
    });
});//end of jquery

  // function addCommas(x) {
  //   var parts = x.toString().split(".");
  //   parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  //   return parts.join(".");
  // }

  function returnTotalCost(r, P, N){
    let total = 0;
    // let r = r;
    // let P = P;
    // let N = N;
    total = ((r * P) / (1-Math.pow((1+r),-N)))*N
    return total;
  }

  function mortgageDifference(){
    return getpurchasePrice() - getDownPayment()
  }

  function getDownPayment()
  {
      //Here we get the down-payment by calling our function
      //Each function returns a number so by calling them we add the values they return together
      let downPayment = getpurchasePrice() * getPercentage();
      return downPayment;
      //display the result
  }

  function getpurchasePrice()
  {
      var theForm = document.forms["form"];
      var quantity = theForm.elements["purchasePrice"];
      var price =0;
      //If the textbox is not blank
      if(quantity.value!="")
      {
          price = parseInt(quantity.value);
      }
      // $(".numbers").each(function() {
      //     $(this).format({format:"#,###", locale:"us"});
      // });
  return price;
  }



  function getPercentage()
  {
      var theForm = document.forms["form"];
      var quantity = theForm.elements["percentage"];
      var percentage =0;
      //If the textbox is not blank
      if(quantity.value!="")
      {
          percentage = parseInt(quantity.value) * .01; //percent to decimal
      }
  return percentage;
  }

</script>
</html>
