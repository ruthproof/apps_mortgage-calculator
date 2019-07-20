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
  <div class="form">
      <form id="form" class="form" action="" onsubmit="return false;" method="post">
        <fieldset>
          <legend>Terms</legend>
            <fieldset>
              <legend>Down-Payment</legend>

                <div class="block">
                  <label for="purchasePrice">Purchase Price ($)</label>
                  <input type="number" id="purchasePrice" name="purchasePrice" class="field" placeholder="What's the purchase price?" value="200000"/>
                </div>
                <div class="block">
                  <label for="percentage">Down Payment</label>
                  <input type="number"  min="0" max="100" id="percentage" name="percentage" class="field" value="20"/>
                </div>
                <div class="block">
                  <label for="downPayment">Amount</label>
                  <input name="downPayment" class="field" id="downPayment" name="downPayment" class="field"/>
                </div>
            </fieldset>
            <fieldset>
              <legend>Mortgage Details</legend>
                <div class="block">
                  <label for="mortgageAmount">Mortgage Amount</label>
                  <input name="mortgageAmount" class="field" id="mortgageAmount" name="mortgageAmount" class="field"/>
                </div>
                <div class="block">
                  <label for="interestRate">Interest Rate</label>
                  <input type="number"  min="0" max="100" id="interestRate" name="interestRate" class="field" value="5"/>
                </div>
                <div class="block">
                  <label for="period">Period (years)</label>
                  <input type="number"  min="0" max="30" id="period" name="period" class="field" value="30"/>
                </div>
                <div class="block">
                  <label for="totalCost">Total Cost</label>
                  <input id="totalCost" name="totalCost" class="field"/>
                </div>
                <div class="block">
                  <label for="monthlyPayment">Monthly Payment</label>
                  <input id="monthlyPayment" name="monthlyPayment" class="field"/>
                </div>
            </fieldset>

            <input type="submit" name="Calculate" id="submit"/>
            <button name="clear" id="clear">Reset</button>
        </fieldset>
      </form>
  </div>
</body>
<script>

$(document).ready(function(){
  $( "#clear" ).click(function(){
    $( '#form' ).trigger("reset");
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

    });
});//end of jquery

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
