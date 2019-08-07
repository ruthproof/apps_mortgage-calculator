<!--
**form.php
* Form Table for mortgage-calculator app
-->
  <form id="form" class="form" onsubmit="return false;" method="post">
    <table id="calcTable">

      <tr><!--row 01-->
        <th class="button-column"></th>
        <th class="table-header"></th>
      </tr>

      <tr><!--row 02-->
        <td>
          <label for="purchasePrice">Purchase Price ($)</label>
        </td>
        <td>
            <button class="decrement">-</button>
            <input id="purchasePrice" type="number" step="1000" class="field right number" placeholder="What's the purchase price?" value="400000"/>
          <button id="purchasePriceIncrement" class="increment">+</button>
        </td>
      </tr>

      <tr><!--row 03-->
        <td>
          <label for="percentage">Down Payment (%)</label>
        </td>
        <td>
          <button class="decrement">-</button>
          <input min="0" max="100" id="percentage" type="number" step="1"  class="field right" value="20"/>
          <button class="increment">+</button>
        </td>
      </tr>

      <tr><!--row 04-->
        <td>
          <label for="interestRate">Interest Rate (%)</label>
        </td>
        <td>
          <button class="decrement">-</button>
          <input min="0" max="100" id="interestRate" name="interestRate"  type="number" step=".01" class="field right" value="5"/>
          <button class="increment">+</button>
        </td>
      </tr>

      <tr><!--row 05-->
        <td>
          <label for="period">Period (years)</label>
        </td>
        <td>
          <button class="decrement">-</button>
          <input type="number" min="0" max="40" id="period" step="5" class="field right" value="15"/>
          <button class="increment">+</button>
        </td>
      </tr>

      <tr><!--row 06-->
        <td>
          <button name="clear" id="clear" class="button">Reset</button>
        </td>
        <td>
          <input type="submit" id="submit" class="button"/>
        </td>
      </tr>

      <tr><!--row 07-->
        <td class="label">Down Payment</td>
        <td class="output"><span class="field number right" id="downPayment"></span></td>
      </tr>

      <tr><!--row 08-->
        <td class="label">
          Loan
        </td>
        <td class="output"><span class="field number right" id="mortgageAmount"></span>
        </td>
      </tr>

      <tr><!--row 09-->
        <td class="label">
          Mortgage
        </td>
        <td class="output">
          <span id="totalCost" class="field right number"></span>
        </td>
      </tr>

      <tr><!--row 10-->
        <td class="label">Monthly Payment</td>
        <td class="output">
          <span id="monthlyPayment" class="field right numbers"></span>
        </td>
      </tr>

    </table>
  </form>
