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
  <table>
    <div class="form">
        <form id="form" class="form" action="" onsubmit="return false;" method="post">
                  <tr>
                    <td>
                        <label for="purchasePrice">Purchase Price ($)</label>
                    </td>
                    <td>
                        <input id="purchasePrice" type="number" step=".01" name="purchasePrice" class="field right" placeholder="What's the purchase price?" value="200000"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for="percentage">Down Payment</label>
                    </td>
                    <td>
                      <input min="0" max="100" id="percentage" name="percentage" type="number" step=".01"  class="field right" value="20"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for="downPayment">Amount</label>
                    </td>
                    <td>
                      <input name="downPayment" class="field" id="downPayment"  type="number" step=".01" name="downPayment" class="field right"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for="mortgageAmount">Mortgage Amount</label>
                    </td>
                    <td>
                      <input name="mortgageAmount" class="field" id="mortgageAmount"  type="number" step=".01" name="mortgageAmount" class="field right"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for="interestRate">Interest Rate</label>
                    </td>
                    <td>
                      <input min="0" max="100" id="interestRate" name="interestRate"  type="number" step=".01" class="field right" value="5"/>
                    </td>
                  <tr>
                    <td>
                      <label for="period">Period (years)</label>
                    </td>
                    <td>
                      <input type="number" min="0" max="30" id="period" name="period"  type="number" step=".01" class="field right" value="30"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for="totalCost">Total Cost</label>
                    </td>
                    <td>
                      <input id="totalCost"  type="number" step=".01" name="totalCost" class="field right"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for="monthlyPayment">Monthly Payment</label>
                    </td>
                    <td>
                      <input id="monthlyPayment" type="number" step=".01"  name="monthlyPayment" class="field right"/>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <input type="submit" name="Calculate" id="submit"/>
                    </td>
                    <td>
                      <button name="clear" id="clear">Reset</button>
                    </td>
                  </tr>
          </table>
        </form>
    </div>
  </table>
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
