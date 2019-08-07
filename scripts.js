//scripts.php
//scripts for mortage-calculator app

//functions

  function addCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
  }

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

  function increment(field){
    switch(field){
      case "purchasePrice":
      //code Block
        break;
      default:
      //code Block
    }




  }

$(document).ready(function(){
  $( "#clear" ).click(function(){
    $( '#form' ).trigger("reset");
    // $( "#downPayment" ).val("");
    $( "#downPayment" ).text("");
    $( "#mortgageAmount" ).text("");
    $( "#totalCost" ).text("");
    $( "#monthlyPayment" ).text("");

  });


    $( "calcTable" ).basictable();

    $("calcTable-breakpoint" ).basictable({
      breakpoint: 768,
    });

  $( "#purchasePriceIncrement" ).click(function(){
    let curentValue = parseInt($("purchasePrice"));
    console.log(currentValue);
    // console.log("test");
    // console.log($("#purchasePrice").val());
      // $('#purchasePriceIncrement').val( function(i, oldval) {
      //     return parseInt( oldval, 10) + 1;


    // if(currentValue){
    //   let newValue = currentValue + 10000;
    // };
    // $( "#purchasePrice ").text(newValue);
  });


  $( "#submit" ).click(function(){
      console.log("test");
      let downPayment = "$" + addCommas(getDownPayment().toFixed());

      $('#downPayment').text(downPayment);

      let mortgageAmount = "$" + addCommas(mortgageDifference().toFixed());
      $("#mortgageAmount").text(mortgageAmount);

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
      $("#monthlyPayment").text("$" + addCommas(P.toFixed(2)));
      }
      else
      {
      alert('There was an error');
      $("#monthlyPayment").text('There was an error');
      }

      let totalCost = "$" + addCommas(returnTotalCost(c,L,n).toFixed(2));
      $("#totalCost").text(totalCost);


      // var x = $('#monthlyPayment').val();
      // $('#monthlyPayment').val(addCommas(x));
    });
});//end of jquery
