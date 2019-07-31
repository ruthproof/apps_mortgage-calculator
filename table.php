<!--
**table.php
* Main page for mortage-calculator app

-->
<table>
  <div class="form">
      <form id="form" class="form" action="" onsubmit="return false;" method="post">
        <tr>
        <th></th>
        <th></th>
        <th></th>
        <th class="table-header"></th>
        </tr>
          <tr>
            <td>
              <label for="purchasePrice">Purchase Price ($)</label>
            </td>
            <td>
                <input id="purchasePrice" type="number" step="1000" name="purchasePrice" class="field right number" placeholder="What's the purchase price?" value="200000"/>
            </td>
          </tr>
          <tr>
            <td>
              <label for="percentage">Down Payment (%)</label>
            </td>
            <td>
              <input min="0" max="100" id="percentage" name="percentage" type="number" step="1"  class="field right" value="20"/>
            </td>
            <td class="label">Amount</td>
            <td class="output"><span name="downPayment" class="field number right" id="downPayment" name="downPayment" class="field right"></span/></td>
          </tr>
            <tr>
              <td>
                <label for="interestRate">Interest Rate (%)</label>
              </td>
              <td>
                <input min="0" max="100" id="interestRate" name="interestRate"  type="number" step=".01" class="field right" value="5"/>
              </td>
              <td class="label">
                Mortgage Amount
              </td>
              <td class="output"><span name="mortgageAmount" class="field number right" id="mortgageAmount"  type="number" step=".01" name="mortgageAmount" class="field right"></span>
              </td>
            </tr>
            <tr>
              <td>
                <label for="period">Period (years)</label>
              </td>
              <td>
                <input type="number" min="0" max="40" id="period" name="period"  type="number" step="5" class="field right" value="15"/>
              </td>
              <td class="label">
                Total Cost
              </td>
              <td class="output">
                <span id="totalCost" name="totalCost" class="field right number"></span>
              </td>
            </tr>
            <tr>

            </tr>
            <tr>
              <td></td>
              <td></td>
              <td class="label">Monthly Payment</td>
              <td class="output">
                <span id="monthlyPayment" name="monthlyPayment" class="field right numbers"></span>
              </td>
            </tr>
            <tr>
              <td>
                <input type="submit" name="Calculate" id="submit" class="button"/>
              </td>
              <td>
                <button name="clear" id="clear" class="button">Reset</button>
              </td>
            </tr>
      </form>
  </div>
</table>
